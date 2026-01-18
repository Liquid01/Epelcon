<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\user_reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class WalletController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wallets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_fund_wallet()
    {
        return view('wallets.fund');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_load_wallet(Request $request)
    {
//        dd($request);
        $request->validate([
           'username' => 'string|required|exists:users,username',
           'amount' => 'integer|required',
        ]);
        $amount = $request->amount;
        $user = User::where('username', $request->username)->first();



        if ($user)
        {
            $reward = user_reward::where('membership_id', $user->membership_id)->first();
            try {
//                $reward->cash += $request->amount;
//                $reward->save();

                $transaction_c = new TransactionController();

                $transaction = $transaction_c->credit_cash($user, $amount, 'CREDIT', 'STOCKIST_WALLET_FUNDING', );

            }catch (Exception $exception)
            {
                return redirect()->back()->with('failed', 'Could Not Add Funds to Wallet, contact Admin');
            }
        }

        return redirect()->back()->with('success', 'Account Funded with '.$request->amount. ' Successfully');
    }

    public function admin_load_stockist(Request $request)
    {
//        dd($request);
        $request->validate([
           'username' => 'string|required|exists:users,username',
           'amount' => 'integer|required',
        ]);
        $amount = $request->amount;
        $user = User::where('username', $request->username)->first();
        if ($user)
        {
            $reward = user_reward::where('membership_id', $user->membership_id)->first();
            try {
//                $reward->cash += $request->amount;
//                $reward->save();
//dd($user);
                $transaction_c = new TransactionController();
                $transaction = $transaction_c->credit_stockist($user, $amount, 'CREDIT', 'STOCKIST_WALLET_FUNDING', );

            }catch (Exception $exception)
            {
                return redirect()->back()->with('failed', 'Could Not Add Funds to Wallet, contact Admin');
            }
        }

        return redirect()->back()->with('success', 'Account Funded with '.$request->amount. ' Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
