<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Notifications\TransactionNotification;
use App\Setting;
use App\Transaction;
use App\User;
use App\user_reward;
use App\Withdrawal;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'members']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('admin.transactions', compact('transactions'));
    }

    public function member_transactions()
    {
        $settings = Setting::where('item', 'REFERRALS_WITHDRAWALS')->first();

        $transactions = Transaction::where('owner', current_user()->username)->paginate(20);

        return view('members.transactions', compact('transactions', 'settings'));
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
            'amount' => 'integer|required|min:1',
            'recipient' => 'required|string|exists:users,username'
        ]);

        $amount = $request->amount;
        $recipient = User::where('username', $request->recipient)->first();

        $transfering_from = user_reward::where('membership_id', app('current_user')->membership_id)->first();
        $transfering_to = user_reward::where('membership_id', $recipient->membership_id)->first();

        if ($recipient->username == auth()->user()->username) {
            return redirect()->back()->with('fail', 'Wrong transaction recipient; - Self');
        }

        if ($transfering_from != null && $amount >= 1000 && $transfering_from->cash >= $amount) {
            if ($transfering_to != null) {
                $transfering_from->cash -= $request->amount;
                $transfering_to->cash += $request->amount;

                $transfering_from->save();
                $transfering_to->save();

                $transaction = $this->log_transaction("DEBIT_TRANSFER", $request->amount, 'TRANSFER_TO_' . $request->recipient, auth()->user()->username);
                $transaction = $this->log_transaction("CREDIT_TRANSFER", $request->amount, 'TRANSFER_FROM_' . $request->recipient, $request->recipient);

                return redirect()->back()->with('success', "Successfully Transferred NGN" . $request->amount . " to " . $request->recipient);
            }
        }

        return redirect()->back()->with('fail', "Please check details and try again");

    }


    protected function shop_to_cash(Request $request)
    {

        $request->validate([
            'amount' => 'integer|required|min:1000'
        ]);

        $amount = $request->amount;
        if ($amount < 1000) {
            return redirect()->back()->with('fail', "Transaction cannot be less than N1000, please try again later");
        }

        $user_rewards = user_reward::where('membership_id', auth()->user()->membership_id)->first();

        if ($user_rewards != null && $amount >= 1000 && $user_rewards->shopping >= $amount) {
            $user_rewards->shopping -= $request->amount;
            $user_rewards->cash += ($amount - ($amount * 0.15));
            $user_rewards->save();

            $this->log_transaction("DEBIT_TRANSFER", $amount, 'SHOP_TO_CASH', auth()->user()->username);
            $this->log_transaction("CREDIT_TRANSFER", $amount, 'TRANSFER_FROM_SHOP', auth()->user()->username);

            return redirect()->back()->with('success', "Successfully Transferred NGN" . $amount . " to " . "CASH WALLET");
        }

        return redirect()->back()->with('fail', "Please check details and try again");

    }


    protected function member_withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'integer|required|min:1000'
        ]);

        $to_withdraw = user_reward::where('membership_id', auth()->user()->membership_id)->first();
        if ($to_withdraw != null && $to_withdraw->cash >= $request->amount && $request->amount > 1000) {
            $to_withdraw->cash -= $request->amount;
            $to_withdraw->save();
            $withdrawal = new WithdrawalController();
            $withdrawal->create_withdraw(auth()->user()->username, 'CASH', $request->amount);

            $this->log_transaction("DEBIT", $request->amount, 'CASH_WITHDRAWAL_REQUEST', auth()->user()->username);

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


    public function log_transaction($type, $amount, $for, $owner, $data = null)
    {
        if ($data) {
            $ddata = json_encode($data);

            $log = new Transaction([
                'owner' => $owner,
                'type' => $type,
                'for' => $for,
                'amount' => $amount,
                'status' => 1,
                'data' => $ddata,
            ]);
        } else {
            $log = new Transaction([
                'owner' => $owner,
                'type' => $type,
                'for' => $for,
                'amount' => $amount,
                'status' => 1,
//                'data' => $ddata,
            ]);
        }

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

        if ($stage <= 1) {
            $account->shopping += $amount;
            $account->save();
            $this->log_transaction("CREDIT", $amount, $for, $user->username);

        }

        $nc = new NotificationsController();

        $nc->credit_notification($user, $amount, $type, $for);
    }

    public function credit_cash(User $user, $amount, $type, $for, $stage)
    {
        $account = user_reward::where('membership_id', $user->membership_id)->first();

        $account->cash += $amount;
        $account->save();
        $this->log_transaction("CREDIT", $amount, $for, $user->username);

        $nc = new NotificationsController();
        $nc->credit_notification($user, $amount, $type, $for);
    }

}
