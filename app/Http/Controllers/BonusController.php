<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Matching;
use App\Package;
use App\PV;
use App\Rank;
use App\User;
use App\user_reward;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }


//TEST ROUTE FUNCTIONS END HERE

    public function get_matching_bonus(Request $request)
    {
        //dd('matching');
//return 0;
        $left_pvs = $request->left_pvs;
        $right_pvs = $request->right_pvs;

//        $left_pvs = 4440;
//        $right_pvs = 19340;


        $user = app('current_user');
        if ($user) {
            if ($left_pvs >= 60 && $right_pvs >= 60) {
                $user_package = $user->package;
                $package = Package::where('id', $user_package->id)->first();
                $matching_bonus = 24000 * ($package->matching_bonus / 100);


                $left_multiples = intdiv($left_pvs, 60);
                $right_multiples = intdiv($right_pvs, 60);


                $min_leg = min($left_multiples, $right_multiples);


                $matched = $this->check_matched($min_leg, $user);

                if ($matched != null && $matched > 0) {

                    $new_matching_bonus = $matching_bonus * $matched;
                    $user_bonus = $this->update_matching_bonus($user, $new_matching_bonus, $min_leg, $left_pvs, $right_pvs, $matched);

                    $this_matchings = Matching::where('user_id', $user->id)
                        ->whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->sum('amount');

                    return json_encode([
                        "amount" => number_format($user_bonus->amount, 2),
                        "this_match" => $this_matchings,
                        "matched" => 0
                    ]);
                } elseif ($matched == 0) {
                    $this_matchings = Matching::where('user_id', $user->id)
                        ->whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->sum('amount');

                    $bonus_type_id = config('app.matching_bonus');
                    $user_bonus = Bonus::where('user_id', $user->id)
                        ->where('bonus_type_id', $bonus_type_id)->first();


//dd($user_bonus->amount, $this_matchings);
                    return json_encode([
                        "amount" => number_format($user_bonus->amount, 2),
                        "this_match" => $this_matchings,
//                            "matched" => $user_bonus->paid_match * 60
                        "matched" => 0
                    ]);
                } elseif ($matched == null) {
                    $bonus_type_id = config('app.matching_bonus');
                    $user_bonus = Bonus::where('user_id', $user->id)
                        ->where('bonus_type_id', $bonus_type_id)->first();

                    $this_matchings = Matching::where('user_id', $user->id)
                        ->whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->sum('amount');

                    return json_encode([
                        "amount" => number_format($user_bonus->amount, 2),
                        "this_match" => $this_matchings,
//                            "matched" => $user_bonus->paid_match * 60
                        "matched" => 0
                    ]);
                }


            }

        }

        return json_encode([
            "amount" => number_format(0, 2),
            "this_match" => 0,
            "matched" => 0
        ]);

    }


//    check if there is a difference in the current match and the last
    public function check_matched($to_match, User $user)
    {

        $bonus_type_id = config('app.matching_bonus');
//        $user = app('current_user');

        $user_bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', $bonus_type_id)->first();

        if ($user_bonus) {
            $last_matched = $user_bonus->last_matched;
            if ($to_match == $last_matched) {
                return 0;
            } elseif ($to_match > $last_matched) {

                $matched = $to_match - $last_matched;
//                echo 'THIS NEW MATCH  = ' . $matched . '<br>';
                return $matched;
            } elseif ($to_match < $last_matched) {
                $user_bonus->last_matched = $to_match;
                $user_bonus->save();
                return null;
            }

        }

        return null;
    }


    private function update_matching_bonus(User $user, $new_matching_bonus, $min_leg, $left_pvs, $right_pvs, $matched)
    {
        $bonus_type_id = config('app.matching_bonus');

        $user_bonus = Bonus::where('user_id', $user->id)
            ->where('bonus_type_id', $bonus_type_id)->first();

        if ($user_bonus) {
            $new_user_bonus = $user_bonus->amount + $new_matching_bonus;
            $user_bonus->amount = $new_user_bonus;
            $user_bonus->last_matched = $min_leg;
            $user_bonus->save();

            $matching_controller = new MatchingController();

            $matching_controller->log_matched($left_pvs, $right_pvs, $matched, $new_matching_bonus);

            $transaction_c = new TransactionController();
            $transaction_c->log_transaction(
                'CREDIT',
                $new_matching_bonus,
                'MATCHING_BONUS',
                $user->username,
            );

            return $user_bonus;

        } else {
//            dd('no');
            $bonus = $this->create_member_bonus($user, $bonus_type_id, $new_matching_bonus);

            return $bonus;
        }


    }


    public function get_previous_package(User $user)
    {
        $membership_id = $user->membership_id;

        if (str_starts_with($membership_id, 'TE')) {
//            echo 'MEMBERSHIP ID: ' . $membership_id;
            return 1;
        } elseif (str_starts_with($membership_id, 'SU')) {
//            echo 'MEMBERSHIP ID: ' . $membership_id;
            return 2;
        } elseif (str_starts_with($membership_id, 'EM')) {
//            echo 'MEMBERSHIP ID: ' . $membership_id;
            return 3;
        } elseif (str_starts_with($membership_id, 'AC')) {
//            echo 'MEMBERSHIP ID: ' . $membership_id;
            return 4;
        } elseif (str_starts_with($membership_id, 'EG')) {
//            echo 'MEMBERSHIP ID: ' . $membership_id;
            return 5;
        } elseif (str_starts_with($membership_id, 'MS')) {
//            echo 'MEMBERSHIP ID: ' . $membership_id;
            return 6;
        } elseif (str_starts_with($membership_id, 'TE')) {
//            echo 'MEMBERSHIP ID: ' . $membership_id;
            return 6;
        }

        return null;
    }

    public function get_member_rank(Request $request)
    {
//        USer details
        $user = app('current_user');
        if ($user) {

            $old_rank = $user->stage;
            $left_pvs = $request->left_pvs;
            $right_pvs = $request->right_pvs;

            $user_rank_bonus = Bonus::where('user_id', $user->id)
                ->where('bonus_type_id', 2)->first();

            if (!$user_rank_bonus) {
                $user_rank_bonus = new Bonus(
                    [
                        'user_id' => $user->id,
                        'bonus_type_id' => 2,
                    ]
                );

                $user_rank_bonus->save();
            }

            if ($left_pvs >= 700000 && $right_pvs >= 700000) {
                $new_rank = Rank::where('id', 7)->first();

                $user->stage = 7;
                $user->save();

                return json_encode($new_rank);
            }

            if ($left_pvs >= 300000 && $right_pvs >= 300000) {
                $new_rank = Rank::where('id', 6)->first();

                $user->stage = 6;
                $user->save();

                return json_encode($new_rank);
            }

            if ($left_pvs >= 85000 && $right_pvs >= 85000) {
                $new_rank = Rank::where('id', 5)->first();

                $user->stage = 5;
                $user->save();

                return json_encode($new_rank);
            }

            if ($left_pvs >= 30000 && $right_pvs >= 30000) {
                $new_rank = Rank::where('id', 4)->first();

                $user->stage = 4;
                $user->save();

                return json_encode($new_rank);
            }

            if ($left_pvs >= 15000 && $right_pvs >= 15000) {
                $new_rank = Rank::where('id', 3)->first();

                $user->stage = 3;
                $user->save();

                return json_encode($new_rank);
            }

            if ($left_pvs >= 6000 && $right_pvs >= 6000) {
                $new_rank = Rank::where('id', 2)->first();

                $user->stage = 2;
                $user->save();

                return json_encode($new_rank);
            }

            if ($left_pvs >= 3000 && $right_pvs >= 3000) {
                $new_rank = Rank::where('id', 1)->first();

                $user->stage = 1;
                $user->save();

                return json_encode($new_rank);
            }


        }


        return json_encode(['id' => 0, 'name' => 'NIL']);
    }

    public function create_member_bonus(User $user, $bonus_type_id, $matching_bonus)
    {
        $bonus = new Bonus([
            'user_id' => $user->id,
            'bonus_type_id' => $bonus_type_id,
            'amount' => $matching_bonus,
        ]);
        $bonus->save();

        return $bonus;
    }


}
