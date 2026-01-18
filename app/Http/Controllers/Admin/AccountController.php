<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\user_reward;
use Illuminate\Http\Request;

class AccountController extends Controller
{
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

    public function credit_member(User $user, $amount)
    {
        $rewards = $user->rewards;

        $rewards->cash += $amount;

        $rewards->save();


        $tr_c = new TransactionController();

        $tr_c->log_transaction('CREDIT', $amount, 'Wallet Funding', $user);

        return 0;
    }


}
