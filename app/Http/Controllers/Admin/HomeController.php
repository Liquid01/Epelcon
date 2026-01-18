<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin == 2) {
            return view('support.index');
        }
//        dd('no');
        $rewards = DB::table('user_rewards')
            ->where('membership_id', Auth::user()->membership_id)
            ->first();

        $investment = DB::table('investments')
            ->where('membership_id', Auth::user()->membership_id)
            ->get();
        $summed_investment_amount = $investment->sum('amount');
        $summed_interest_on_investment = $investment->sum('interest');
//        dd($rewards, $investment);
        if (auth()->user()->is_admin == 1) {
            return view('admin.dashboard');
        }


        return redirect()->route('my_profile');
    }

    public function dashboard()
    {
        $data['page_title'] = 'dashboard';
        $rewards = DB::table('user_rewards')
            ->where('membership_id', Auth::user()->membership_id)
            ->first();

        $investment = DB::table('investments')
            ->where('membership_id', Auth::user()->membership_id)
            ->get();
        $summed_investment_amount = $investment->sum('amount');
        $summed_interest_on_investment = $investment->sum('interest');
        $latest_withdrawals = WithdrawalController::where('status', 3)->latest()->paginate(25);
//        dd($rewards, $investment);
        if (auth()->user()->is_admin == 1) {
//            dd($data);
            return view('admin.dashboard', compact('data', 'latest_withdrawals'));
        }

        return view('members.dashboard', compact(
            'rewards',
            'investment',
            'summed_investment_amount',
            'summed_interest_on_investment',
            'data'
        ));
    }

    public function adminDashboard()
    {
//        dd('admin');
        $rewards = DB::table('user_rewards')
            ->where('membership_id', Auth::user()->membership_id)
            ->first();

        $investment = DB::table('investments')
            ->where('membership_id', Auth::user()->membership_id)
            ->get();
        $summed_investment_amount = $investment->sum('amount');
        $summed_interest_on_investment = $investment->sum('interest');
        $latest_withdrawals = Withdrawal::latest()->paginate(1);
//        dd($rewards, $investment);
        return view('admin.dashboard', compact('rewards', 'latest_withdrawals', 'investment', 'summed_investment_amount', 'summed_interest_on_investment'));
    }

    public function getDownlines(Request $request)
    {
        $parents = User::where('parent', Auth::user()->username)->get();
        $downlines = $this->getAllDownlines($parents);
        dd($downlines);
    }

    function getAllDownlines($parents)
    {
        $data = User::where('parent', 'IN', $parents)->get();
//        $data = "SELECT * FROM users WHERE parent_id IN (/*parents*/)";
        $new_parent_ids = array();
        $children = array();
        foreach ($data as $child) {
            $children[$child->username] = array(/**/); // etc

            $new_parent_ids[] = $child->username;
        }
        $children = array_merge($children, $this->getAllDownlines($new_parent_ids));
        return $children;
    }

    public function member_learn()
    {
        return view('learn.index');
    }
}
