<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Transaction;
use App\User;
use App\user_reward;
use App\Withdrawal;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'members']);
    }

    //

    protected function member_deposit()
    {
        return view('members.deposits');
    }

    protected function member_savings_deposit()
    {

        return view('members.savings_deposits');
    }

    protected function member_investment_deposit()
    {
        return view('members.investment_deposits');
    }

    public function get_member_shopping_balance($membership_id)
    {
        $user_reward = user_reward::where('membership_id', $membership_id)->first();

        $shop_balance = $user_reward->shopping;

        return $shop_balance;
    }

    public function get_member_cash_balance($membership_id)
    {
        $user_reward = user_reward::where('membership_id', $membership_id)->first();

        $cash_balance = $user_reward->cash;

        return $cash_balance;
    }


    public function check_member_total_reward($membership_id)
    {
        $user_reward = user_reward::where('membership_id', $membership_id)->first();

        $cash_balance = $user_reward->cash;
        $shop_balance = $user_reward->shopping;
        $total_balance = $cash_balance + $shop_balance;
        return $total_balance;
    }


    public function debit_shop_balance($membership_id, $amount)
    {
        $user_reward = user_reward::where('membership_id', $membership_id)->first();
        $shop_balance = $user_reward->shopping;
        $deduct = $shop_balance - $amount;

        $user_reward->shopping = $deduct;

        $user_reward->save;

        return $deduct;
    }


    public function debit_cash_balance($membership_id, $amount)
    {
        $user_reward = user_reward::where('membership_id', $membership_id)->first();
        $cash_balance = $user_reward->cash;
        $deduct = $cash_balance - $amount;

        $user_reward->cash = $deduct;

        $user_reward->save;

        return $deduct;
    }


    public function debit_matching_bonus(User $user, $amount)
    {
        $bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', config('app.matching_bonus'))->first();

//        dd($bonus);
        if ($bonus != null && $bonus == 2) {
            dd($bonus);
        }

        if ($bonus) {
            $balance = $bonus->amount - $bonus->withdrawn;
            if ($balance < $amount) {
                return redirect()->back()->with('fail', 'INSUFFICIENT BALANCE. Your Balance is = ' . $balance);
            } else {
                $bonus->amount -= $amount;
                $bonus->save();

                $transaction_c = new Transaction();
                $transaction_c->log_transaction(
                    'DEBIT',
                    $amount,
                    'MATCHING_BONUS_WITHDRAWAL',
                    $user->username
                );

                $withdrawal = new WithdrawalController();
                $withdrawal->create_withdraw(auth()->user()->username, 'MATCHING_BONUS', $amount);

                return redirect()->back()->with('success', $amount . ' Has been DEBITED Successfully');
            }
        }

        return $bonus;
    }





    public function debit_member($membership_id, $amount)
    {
        $user_reward = user_reward::where('membership_id', $membership_id)->first();
        $cash_balance = $user_reward->cash;
        $shop_balance = $user_reward->shopping;
        $total_balance = $cash_balance + $shop_balance;

//        debit
        if ($shop_balance < $amount && $cash_balance < $amount && $total_balance < $amount) {
            return false;
        }

        if ($shop_balance <= $amount) {

            if ($shop_balance > 0 || $shop_balance == $amount) {
                $shop_deduct = $shop_balance;
                $shop_balance = 0.00;

                $new_amount = $amount -= $shop_deduct;

                $cash_balance -= $new_amount;
            } elseif ($shop_balance == 0) {
                $cash_balance -= $amount;
            }

        } else {
            $shop_balance -= $amount;
        }

        $user_reward->cash = $cash_balance;
        $user_reward->shopping = $shop_balance;

        $user_reward->save();

//        dd($user_reward);

        return true;
    }

//    TODO: Ensure to send debit request once to reduce database access frequency.

//fund wallet

    public function member_fund_wallet()
    {
        return view('wallets.fund');
    }

    public function member_verify_transaction(Request $request)
    {
        $reference = $request->reference;
        $amount = $request->amount / config('app.dollar_to_naira');
//  dd($amount);
        $sk = config('app.ps_live_sk');

        $auth_token = "Authorization: Bearer " . $sk;
//    dd($auth_token);

        $response = Curl::to('https://api.paystack.co/transaction/verify/' . $reference)
            ->withContentType('application/json')
            ->withHeader($auth_token)
            ->get();

        $data_raw = json_decode($response);


        if ($data_raw) {
            $data = $data_raw->data;
//        dd($data->status);
        }

        if ($data && $data->status == "success") {
            $user_reward = user_reward::where('membership_id', auth()->user()->membership_id)->first();

            $user_reward->shopping += $amount;

            $user_reward->save();

            $transaction_controler = new TransactionController();

            $notification_controller = new NotificationsController();

            $notify = $notification_controller->credit_notification(auth()->user(), $amount, 'CREDIT', 'WALLET FUNDING');
//dd($data);
            $log = $transaction_controler->log_transaction('CREDIT', $amount, 'WALLET_FUNDUING', auth()->user()->username, $data);
            return json_encode(["status" => 'success', "data" => $data]);


        }


//  dd();
    }

    public function credit_pvs(User $user, $quantity)
    {
        $user_reward = user_reward::where('membership_id', $user->membership_id)->first();

        $user_reward->points += $quantity;
        $user_reward->save();

//        dd($quantity);

        $transaction_controller = new TransactionController();

        $transaction_controller->log_transaction('CREDIT', $quantity, 'REPURCHASE_PVS', $user->username, null);
    }


}
