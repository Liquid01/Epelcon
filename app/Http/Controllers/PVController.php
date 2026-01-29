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

    public function member_get_pvs()
    {
        $user = auth()->user();
        $user_rewards = user_reward::where('membership_id', $user->membership_id)->first();

        $left_index = $user->left_index;
        $right_index = $user->right_index;

        // Preload all users with rewards into memory for caching
        $allUsers = User::with('rewards')->get()->keyBy('username');

        // LEFT SIDE
        $left = 0;
        if ($left_index) {
//            echo "_____________LEFT:::: <br> $left_index --- first --- PVS";
            $left = $this->get_index_pvs([$left_index], $user, $allUsers);

//            echo "<br> <br> &&&&&&&&&&&&&&  LEFT TOTAL::::::::::::::::" . "     $left";
        }

        // RIGHT SIDE
        $right = 0;
        if ($right_index) {
//            echo "<br> <br>". "____________RIGHT:::: <br> $left_index --- first --- PVS";
            $right = $this->get_index_pvs([$right_index], $user, $allUsers);

//            echo "<br> <br> &&&&&&&&&&&&&& RIGHT TOTAL::::::::::::::::" . "     $right";
        }

        // Own points
        $points = $user_rewards ? $user_rewards->points : 0;

        // Total PVs
        $total_pvs = $left + $right + $points;

        // Save or update PV record
        $pvs = PV::where('user_id', $user->id)->first();
        if (!$pvs) {
            $pvs = $this->create_member_pvs($user, $left, $right);
        } else {
            $pvs->left = $left;
            $pvs->right = $right;
            $pvs->save();
        }

        return response()->json([
            "left" => $left,
            "right" => $right,
            "total_pvs" => $total_pvs,
            "points" => $points,
        ]);
    }

    /**
     * Recursive PV calculation based on sponsorship chain.
     * Always traverse down to 12 generations, even if node not in chain.
     */
    private function get_index_pvs(array $indexes, User $rootUser, $allUsers, $generation = 1, $dtotal = 0)
    {
        if ($generation > 12) {
            return 0;
        }

        $total = $dtotal;
        $next_dls = [];
//echo "<br> <br>  _____________________________________ <br> <br>";
//        echo " ************* GENERATION ' .$generation . '*******************";
//        echo "<br> _____________________________________";


        foreach ($indexes as $index) {


            if ($index && isset($allUsers[$index])) {

                $user = $allUsers[$index];
//                echo "<br> <br>";
//                echo "TURN OF :::: $index --- ON::: $rootUser->username ::::SPONSOR: $user->sponsor ";
                // Count PVs only if user is in sponsorship chain
                if ($this->isSponsoredByChain($user, $rootUser, $allUsers)) {
                    $points = $user->rewards ? $user->rewards->points : 0;
                    $total += $points;

//                    echo "USERNAME $user->username --- PVS    $points --- TOTAL  $total PVS";

                }

                // Always traverse their downlines regardless
                $sponsored = $allUsers->filter(function ($u) use ($user) {
                    return strtolower($u->sponsor) === strtolower($user->username);
                })->keys()->toArray();

                $next_dls = array_merge($next_dls, $sponsored);
            }
        }

        if (count($next_dls) > 0) {
            $total += $this->get_index_pvs($next_dls, $rootUser, $allUsers, $generation + 1, $total);
        }

        return $total;
    }

    /**
     * Check if a candidate user is ultimately sponsored by the root user.
     */
    private function isSponsoredByChain(User $candidate, User $root, $allUsers)
    {
        $current = $candidate;
//        echo "<br> ************** CHECKING ' .$candidate->username . '******************* <br>";

        while ($current && $current->sponsor) {
//            echo 'the while is there <br> <br>';
            if (strtolower($current->sponsor) === strtolower($root->username)) {
//                echo "<br> ************** FOUND INSIDE ' .$candidate->username . '******************* <br>";

                return true;
            }
            $current = $allUsers[$current->sponsor] ?? null;
        }





        return false;


    }

    private function create_member_pvs(User $user, $left, $right)
    {
        $pvs = new PV([
            'user_id' => $user->id,
            'left' => $left,
            'right' => $right,
        ]);
        $pvs->save();
        return $pvs;
    }
}
