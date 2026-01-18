<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $all_withdrawals = Withdrawal::all();
        $withdrawals = Withdrawal::where('status', 3)->latest()->paginate(20);
        $banks = Bank::all();
        $data = ['paid'=>0];

//        $users = User::all();
        return view('admin.withdrawals', compact('withdrawals', 'data', 'all_withdrawals', 'banks'));
    }

    public function paid_withdrawals()
    {
        $all_withdrawals = Withdrawal::all();
        $withdrawals = Withdrawal::where('status', 3)->latest()
            ->paginate(20);
        $banks = Bank::all();
        $data = ['paid'=>1];
//        $users = User::all();
        return view('admin.withdrawals', compact('withdrawals', 'all_withdrawals', 'data', 'banks'));
    }

    public function create_withdraw($by, $type, $value)
    {
        $withdrawals = new Withdrawal([
            'by' => $by,
            'type' => $type,
            'value' => $value
        ]);

        $withdrawals->save();

        return;

    }

    public function member_withdrawals()
    {
        $withdrawals = Withdrawal::where('by', auth()->user()->username)->latest()->get()->take(10);


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

    public function search_withdrawals(Request $request)
    {
        $request->validate([
            'search_term' => 'string|required'
        ]);

        $search_term = $request->search_term;

        $all_withdrawals = Withdrawal::all();

        $withdrawals = Withdrawal::where('by', 'LIKE', "%$search_term%")->paginate(12);
//        dd($withdrawals);

        if ($withdrawals->count() > 0)
        {
            return view('admin.withdrawals', compact('withdrawals', 'all_withdrawals'));
        }else{
            return redirect()->back()->with('fail', 'NoMatch Found');
        }

    }

}
