<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Matching;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
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
//        $time = now();
//
//        echo $time;
//        sleep(120);
//echo $time; '<br>';
//echo now();
//        dd($time);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin == 2){
            return view('support.index');
        }
//        dd('no');
        $rewards = DB::table('user_rewards')
            ->where('membership_id', Auth::user()->membership_id)
            ->first();

        $investment = DB::table('investments')
            ->where('membership_id', Auth::user()->membership_id)
            ->get();
//        $summed_investment_amount = $investment->sum('amount');
//        $summed_interest_on_investment = $investment->sum('interest');
//        dd($rewards, $investment);
        if (auth()->user()->is_admin == 1){
            return view('admin.dashboard');
        }


        return redirect()->route('my_profile');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $data['page_title'] = 'dashboard';
        $rewards = DB::table('user_rewards')
            ->where('membership_id', Auth::user()->membership_id)
            ->first();
        $user_withdrawals = Withdrawal::where('by', $user->username)
            ->where('status', 1)->get();

//        check if the user has bonus account, get it or create a new one
          $matching_bonus = Bonus::where('user_id', $user->id)
              ->where('bonus_type_id', config('app.matching_bonus'))->first();

          $matchings = Matching::where('user_id', $user->id)
              ->whereYear('created_at', Carbon::now()->year)
              ->whereMonth('created_at', Carbon::now()->month)
              ->sum('amount');

          $todays_matchings = Matching::where('created_at', Carbon::today())->get();
//          dd($todays_matchings);


//        ->whereMonth('created_at', Carbon::now()->month)->get();
//          dd($matchings);
            if (!$matching_bonus)
            {
//                dd('hi');
                $bonus = new Bonus([
                    'user_id' => $user->id,
                    'bonus_type_id' => config('app.matching_bonus'),
                    'amount' => 0.00,
                ]);

                $bonus->save();
            }

            $this_withdrawal = Withdrawal::where('by', $user->username)
                ->where('status', 0)->where('type', 'MATCHING_BONUS')
                ->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();

//        dd($rewards, $investment);
        if ($user->is_admin == 1){

          $withdrawals = Withdrawal::where('status', 3)->latest()->get();
            $latest_withdrawals = $withdrawals->take(12);
            return view('admin.dashboard', compact('data', 'latest_withdrawals', 'withdrawals'));
        }

//        dd($matching_bonus);

        return view('members.dashboard', compact('rewards', 'this_withdrawal', 'matchings', 'matching_bonus', 'user_withdrawals', 'data'));
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
//        dd($rewards, $investment);
//        dd('hi');
        $latest_withdrawals = WithdrawalController::latest()->pick(15);
        return view('admin.dashboard', compact('rewards', 'investment', 'summed_investment_amount', 'summed_interest_on_investment'));
    }

    public function getDownlines(Request $request)
    {
        $parents = User::where('parent', Auth::user()->username)->get();
        $downlines = $this->getAllDownlines($parents);
        dd($downlines);
    }

    function getAllDownlines($parents) {
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
