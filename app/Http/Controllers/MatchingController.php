<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Matching;
use App\PV;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatchingController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    public function all_matchings()
    {
        $user = app('current_user');


        $pv_details_c = new PVDetailsController();

        $pv_details_c->member_get_pvs();
        $pvs = PV::where('user_id', $user->id)->first();
//        dd($pv_details);
        $bonus_type_id = config('app.matching_bonus');
//        $user = app('current_user');

        $user_bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', $bonus_type_id)->first();
        $bonus_c = new BonusController();
        $previous_package = $bonus_c->get_previous_package($user);
        $current_package = $user->package->name;

//        dd($pv_details);

        $startDate = Carbon::createFromFormat('d/m/Y', '05/08/2023');

        $endDate = Carbon::now();


        $matchings = Matching::where('user_id', app('current_user')->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $data = [$previous_package, $current_package];

        return view('bonuses.matching', compact('user_bonus', 'data', 'matchings','pvs'));
    }

    public function member_matchings_within()
    {
        $user = app('current_user');


        $pv_details_c = new PVDetailsController();

        $pv_details_c->member_get_pvs();
        $pvs = PV::where('user_id', $user->id)->first();
//        dd($pv_details);
        $bonus_type_id = config('app.matching_bonus');
//        $user = app('current_user');

        $user_bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', $bonus_type_id)->first();
        $bonus_c = new BonusController();
        $previous_package = $bonus_c->get_previous_package($user);
        $current_package = $user->package->name;

//        dd($pv_details);

        $startDate = Carbon::createFromFormat('d/m/Y', '01/09/2023');

        $endDate = Carbon::createFromFormat('d/m/y', '31/09/23');


        $all_matchings = Matching::where('user_id', app('current_user')->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $matchings = [];

        foreach ($all_matchings as $matching) {
            if ($matching->left <= $pvs->left  && $matching->right <= $pvs->right) {
//                dd('in');
                array_push($matchings, $matching);
            }

        }
//        dd($matchings_within);

        $data = [$previous_package, $current_package];

        return view('bonuses.matching', compact('user_bonus', 'data', 'matchings','pvs'));
    }

    public function member_matchings_outside()
    {
        $user = app('current_user');

        $pv_details_c = new PVDetailsController();

        $pv_details_c->member_get_pvs();
        $pvs = PV::where('user_id', $user->id)->first();
        $bonus_type_id = config('app.matching_bonus');

        $user_bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', $bonus_type_id)->first();
        $bonus_c = new BonusController();
        $previous_package = $bonus_c->get_previous_package($user);
        $current_package = $user->package->name;

        $startDate = Carbon::createFromFormat('d/m/Y', '01/09/2023');

        $endDate = Carbon::createFromFormat('d/m/y', '31/09/23');


        $all_matchings = Matching::where('user_id', app('current_user')->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

//        dd($all_matchings);

        $matchings = [];

        foreach ($all_matchings as $matching) {
            if ($matching->left > $pvs->left  && $matching->right > $pvs->right) {
                array_push($matchings, $matching);
            }

        }

        $data = [$previous_package, $current_package];

        return view('bonuses.matching', compact('user_bonus', 'data', 'matchings','pvs'));
    }


    public function previous_matchings_within()
    {
        $user = app('current_user');


        $pv_details_c = new PVDetailsController();

        $pv_details_c->member_get_pvs();
        $pvs = PV::where('user_id', $user->id)->first();
//        dd($pv_details);
        $bonus_type_id = config('app.matching_bonus');
//        $user = app('current_user');

        $user_bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', $bonus_type_id)->first();
        $bonus_c = new BonusController();
        $previous_package = $bonus_c->get_previous_package($user);
        $current_package = $user->package->name;

//        dd($pv_details);

        $startDate = Carbon::createFromFormat('d/m/Y', '05/08/2023');

        $endDate = Carbon::now()->subMonth();


        $all_matchings = Matching::where('user_id', app('current_user')->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $matchings = [];

        foreach ($all_matchings as $matching) {
            if ($matching->left <= $pvs->left  && $matching->right <= $pvs->right) {
//                dd('in');
                array_push($matchings, $matching);
            }

        }
//        dd($matchings_within);

        $data = [$previous_package, $current_package];

        return view('bonuses.previous_matching', compact('user_bonus', 'data', 'matchings','pvs'));
    }

    public function previous_matchings_outside()
    {
        $user = app('current_user');

        $pv_details_c = new PVDetailsController();

        $pv_details_c->member_get_pvs();
        $pvs = PV::where('user_id', $user->id)->first();
        $bonus_type_id = config('app.matching_bonus');

        $user_bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', $bonus_type_id)->first();
        $bonus_c = new BonusController();
        $previous_package = $bonus_c->get_previous_package($user);
        $current_package = $user->package->name;

        $startDate = Carbon::createFromFormat('d/m/Y', '05/08/2023');
        $endDate = Carbon::now()->subMonth();


        $all_matchings = Matching::where('user_id', app('current_user')->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $matchings = [];

        foreach ($all_matchings as $matching) {
            if ($matching->left > $pvs->left  && $matching->right > $pvs->right) {
                array_push($matchings, $matching);
            }

        }
        dd($matchings);

        $data = [$previous_package, $current_package];

        return view('bonuses.previous_matching', compact('user_bonus', 'data', 'matchings','pvs'));
    }

    public function log_matched($left_pvs, $right_pvs, $matched, $amount)
    {
        $user = app('current_user');
        $matching = Matching::where('user_id', $user->id)
            ->where('package_id', $user->package_id)
            ->where('matched', $matched)
            ->where('amount', $amount)->first();
        if (!$matching) {
            $matching = new Matching([
                'user_id' => $user->id,
                'left_pvs' => $left_pvs,
                'right_pvs' => $right_pvs,
                'matched' => $matched,
                'package_id' => $user->package_id,
                'amount' => $amount,
            ]);

            $matching->save();

            $transaction_c = new TransactionController();

            $transaction_c->log_transaction('CREDIT', $amount, 'MATCHING_BONUS', $user->username);

            return true;
        }
        return false;

    }

}
