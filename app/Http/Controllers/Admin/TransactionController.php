<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\TransactionNotification;
use App\Transaction;
use App\User;
use App\user_reward;
use App\Withdrawal;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->get()->take(1);

        return view('admin.transactions', compact('transactions'));
    }

    public function member_transactions()
    {
        $transactions = Transaction::where('owner', auth()->user()->username)->latest()->get()->take(1);

        return view('members.transactions', compact('transactions'));
    }

    protected function cash_to_investment(Request $request)
    {
        return redirect()->back()->with('fail', "Transaction not successful, please try again later");
    }

    protected function from_cash_to_shop(Request $request)
    {
        return redirect()->back()->with('fail', "Transaction not successful, please try again later");
    }

    protected function investment_to_cash(Request $request)
    {
        return redirect()->back()->with('fail', "Transaction not successful, CHECK YOUR INTEREST BALANCE and try again");
    }

    protected function cash_to_another_account(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:1',
            'recipient' => 'required|string|exists:users,username'
        ]);

        $transfering_from = user_reward::where('membership_id', auth()->user()->membership_id)->first();
        $transfering_to = user_reward::where('membership_id', $request->recipient)->first();

        if ($transfering_from != null && $transfering_from->cash >= $request->amount) {
            if ($transfering_to != null) {
                $transfering_from->cash -= $request->amount;
                $transfering_to->cash += $request->amount;

                $transfering_from->save();
                $transfering_to->save();

                $transaction = $this->log_transaction("DEBIT_TRANSFER", $request->amount, 'TRANSFER_TO_' . $request->recipient, auth()->user()->username);
                $transaction = $this->log_transaction("CREDIT_TRANSFER", $request->amount, 'TRANSFER_FROM_' . $request->recipient, $request->recipient);

                return redirect()->back()->with('success', "Transaction was successful, Transferred $" . $request->amount . " to " . $request->recipient);
            }
        }

        return redirect()->back()->with('fail', "Transaction not successful, please check your balance and try again later");

    }


    protected function member_withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:1'
        ]);

        $to_withdraw = user_reward::where('membership_id', auth()->user()->membership_id)->first();

        if ($to_withdraw != null && $to_withdraw->cash >= $request->amount) {

            $to_withdraw->cash -= $request->amount;
            $to_withdraw->save();

            $withdrawal = new WithdrawalController();
            $withdrawal->create_withdraw(auth()->user()->username, 'CASH', $request->amount);

            $transaction = $this->log_transaction("DEBIT", $request->amount, 'CASH_WITHDRAWAL_REQUEST', auth()->user()->username);

            return redirect()->back()->with('success', "Request for NGN" . $request->amount . " has been queued Successful, It will be Attended to shortly");

        }
        return redirect()->back()->with('fail', "Transaction not successful, please CHECK CASH BALANCE and try again later");

    }

    protected function member_deposit()
    {
        return view('transactions.deposit');
    }

    protected function save_member_deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:1'
        ]);

        $to_withdraw = user_reward::where('membership_id', auth()->user()->membership_id)->first();

        if ($to_withdraw != null && $to_withdraw->cash >= $request->amount) {

            $to_withdraw->cash -= $request->amount;
            $to_withdraw->save();

            $withdrawal = new WithdrawalController();
            $withdrawal->create_withdraw(auth()->user()->username, 'CASH', $request->amount);

            $transaction = $this->log_transaction("DEBIT", $request->amount, 'CASH_WITHDRAWAL_REQUEST', auth()->user()->username);

            return redirect()->back()->with('success', "Request for NGN" . $request->amount . " has been queued Successful, It will be Attended to shortly");

        }
        return redirect()->back()->with('fail', "Transaction not successful, please CHECK CASH BALANCE and try again later");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function log_transaction($type, $amount, $for, $owner)
    {
        $log = new Transaction([
            'owner' => $owner,
            'type' => $type,
            'for' => $for,
            'amount' => $amount,
            'status' => 1,
        ]);

        $log->save();

//        dd($log);

        return;
    }

    public function credit_account(User $user, $amount, $type, $for, $stage)
    {
        $account = user_reward::where('membership_id', $user->membership_id)->first();

        if ($stage > 1) {
            $account->shopping += $amount / 2;
            $account->cash += $amount / 2;
            $account->save();
            $this->log_transaction("CREDIT", $amount, $for, $user->username);
        }

        if ($stage == 0 || $stage = 1) {
            $account->shopping += $amount;
            $account->save();
            $this->log_transaction("CREDIT", $amount, $for, $user->username);

        }

        $nc = new NotificationsController();

        $nc->credit_notification($user, $amount, $type, $for);

//        dd($account);

        //@TODO Log the transaction and notify the user


        return;
    }

    public function credit_cash(User $user, $amount, $type, $for)
    {
        $account = user_reward::where('membership_id', $user->membership_id)->first();

        $account->cash += $amount;
        $account->save();
        $this->log_transaction("CREDIT", $amount, $for, $user->username);

        $nc = new NotificationsController();
        $nc->credit_notification($user, $amount, $type, $for);
    }
    public function credit_stockist(User $user, $amount, $type, $for)
    {
        $account = user_reward::where('membership_id', $user->membership_id)->first();
        $account->stockist += $amount;
        $account->save();
        $this->log_transaction("CREDIT", $amount, $for, $user->username);

        $nc = new NotificationsController();
        $nc->credit_notification($user, $amount, $type, $for);
    }

    public function debit_account($user, $amount, $type, $for)
    {
        $account = user_reward::where('membership_id', $user->membership_id)->first();

        return;
    }


    public function transaction_summary()
    {
        $users = User::where('username', "!=",  'root')->get();
        $transactions = Transaction::all();
        return view('transactions.summary', compact('users', 'transactions'));
    }
}
