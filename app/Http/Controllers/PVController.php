<?php

namespace App\Http\Controllers;

use App\PV;
use App\User;
use App\user_reward;
use Illuminate\Http\Request;

class PVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $generation = 0;
    private $generation2 = 0;
    private $total = 0;
    private $total2 = 0;

    public function member_get_pvs()
    {
        $user = app('current_user');
        $user_rewards = user_reward::where('membership_id', $user->membership_id)->first();

        $left_index = $user->left_index;
        $right_index = $user->right_index;

        // LEFT SIDE
        $this->resetTotals();
        if ($left_index) {
            $left_pvs = $this->get_index_pvs([$left_index], $user);
            $left = $left_pvs[0];
            $left_extra = $left_pvs[1];
        } else {
            $left = 0;
            $left_extra = 0;
        }

        // RIGHT SIDE
        $this->resetTotals();
        if ($right_index) {
            $right_pvs = $this->get_index_pvs([$right_index], $user);
            $right = $right_pvs[0];
            $right_extra = $right_pvs[1];
        } else {
            $right = 0;
            $right_extra = 0;
        }

        $points = $user_rewards ? $user_rewards->points : 0;
        $total_pvs = $left + $right + $left_extra + $right_extra + $points;

        $pvs = PV::where('user_id', $user->id)->first();
        if (!$pvs) {
            $pvs = $this->create_member_pvs($user, $left, $right, $left_extra, $right_extra);
        } else {
            $pvs->left = $left;
            $pvs->right = $right;
            $pvs->left_extra = $left_extra;
            $pvs->right_extra = $right_extra;
            $pvs->save();
        }

        return response()->json([
            "left" => $left + $left_extra,
            "right" => $right + $right_extra,
            "left_extra" => $left_extra,
            "right_extra" => $right_extra,
            "total_pvs" => $total_pvs,
            "points" => $points,
        ]);
    }

    // Recursive PV calculation based on sponsorship chain
    public function get_index_pvs($indexes, User $rootUser)
    {
        $next_dls = [];
        if (count($indexes) > 0) {
            if ($this->generation < 15) {
                $this->generation++;
                foreach ($indexes as $index) {
                    if ($index) {
                        $user = User::where('username', $index)->first();

                        // Only count if user is in sponsorship chain
                        if ($user && $this->isSponsoredByChain($user, $rootUser)) {
                            $user_reward = $user->rewards;
                            $points = $user_reward ? $user_reward->points : 0;
                            $this->total += $points;

                            $sponsored = User::where('sponsor', $user->username)->pluck('username')->toArray();
                            $next_dls = array_merge($next_dls, $sponsored);
                        }
                    }
                }
                if (count($next_dls) > 0) {
                    $this->get_index_pvs($next_dls, $rootUser);
                }
            } else {
                $this->generation2++;
                foreach ($indexes as $index) {
                    if ($index) {
                        $user = User::where('username', $index)->first();
                        if ($user && $this->isSponsoredByChain($user, $rootUser)) {
                            $user_reward = $user->rewards;
                            $points2 = $user_reward ? $user_reward->points : 0;
                            $this->total2 += $points2;

                            $sponsored = User::where('sponsor', $user->username)->pluck('username')->toArray();
                            $next_dls = array_merge($next_dls, $sponsored);
                        }
                    }
                }
                if (count($next_dls) > 0) {
                    $this->get_index_pvs($next_dls, $rootUser);
                }
            }
        }
        return [$this->total, $this->total2];
    }

    private function isSponsoredByChain(User $candidate, User $root)
    {
        $current = $candidate;
        while ($current && $current->sponsor) {
            if ($current->sponsor === $root->username) {
                return true;
            }
            $current = User::where('username', $current->sponsor)->first();
        }
        return false;
    }

    private function resetTotals()
    {
        $this->total = 0;
        $this->total2 = 0;
        $this->generation = 0;
        $this->generation2 = 0;
    }

    public function create_member_pvs(User $user, $left, $right, $left_extra, $right_extra)
    {
        $pvs = new PV([
            'user_id' => $user->id,
            'left' => $left,
            'right' => $right,
            'left_extra' => $left_extra,
            'right_extra' => $right_extra,
        ]);
        $pvs->save();
        return $pvs;
    }
}
