<?php

namespace App\Http\Controllers;

use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['members', 'auth']);
    }

    public function index()
    {
        $withdrawals = Withdrawal::all();

        return view('admin.withdrawals', compact('withdrawals'));

    }

    public function create_withdraw($by, $type, $value)
    {
        $withdrawals = new Withdrawal([
            'by'=> $by,
            'type'=> $type,
            'value'=>$value
        ]);

        $withdrawals->save();

        return;

    }

    public function member_withdrawals()
    {
        $withdrawals = Withdrawal::where('by', 'user')->latest()->get()->take(10);

        return view('members.withdrawals', compact('withdrawals'));

    }

    public function approve_withdrawal($id)
    {
        $to_approve = Withdrawal::where('id', $id)->first();

        $to_approve->status = 1;
        $to_approve->approved_by = auth()->user()->username;
        $to_approve->collected_date = now();

        $to_approve->save();



        return redirect()->back()->with('success', 'Withdrawal Approved');

    }

}
