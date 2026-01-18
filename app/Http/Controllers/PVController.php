<?php

namespace App\Http\Controllers;

use App\PV;
use App\User;
use App\user_reward;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class PVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $sub_total = 0;
    private $generation = 0;
    private $generation2 = 0;

    private $total = 0;
    private $total2 = 0;

// public function member_get_pvs()
// {
//
// }

    public function member_get_pvs()
    {
        $user = app('current_user');
        $user_rewards = user_reward::where('membership_id', $user->membership_id)->first();

        $this->total = 0;
        $this->sub_total = 0;
        $total_pvs = 0;

//        user first downlines
        $left_index = $user->left_index;
        $right_index = $user->right_index;


        if ($left_index != null) {
            $this->total = 0;
            $this->total2 = 0;
            $this->generation = 0;
            $left_pvs = $this->get_index_pvs([$left_index]);

            $left = $left_pvs[0];
            $left_extra = $left_pvs[1];


//            echo "SUPPOSED LEFT PV = : ". $left_pvs[0] .' <br>';
//            echo "Addition LEFT PV = : ". $left_pvs[1] .' <br>';
//            echo "ALL LEFT PV = : ". int($left_pvs[0]) + int($left_pvs[1]) .' <br>';
//echo "**********************************************************************<br>".
//    "***************************************************************************<hr>";


        } else {
            $left = 0;
            $left_extra = 0;
        }

//        dd($left_index);

        if ($right_index != null) {
            $this->total = 0;
            $this->total2 = 0;
            $this->generation = 0;
            $right_pvs = $this->get_index_pvs([$right_index], $sum = 0);

            $right = $right_pvs[0];
            $right_extra = $right_pvs[1];

//            echo "SUPPOSED RIGHT PV = : ". $right_pvs[0] .' <br>';
//            echo "Addition RIGHT PV = : ". $right_pvs[1] .' <br>';
//            echo "ALL RIGHT PV = : ". int($left_pvs[0]) + int($left_pvs[1]) .' <br>';

        } else {
            $right = 0;
            $right_extra = 0;
        }

        $points = $user_rewards->points;

        $total_pvs += (int)$left;
        $total_pvs += (int)$right;
        $total_pvs += (int)$left_extra;
        $total_pvs += (int)$right_extra;
        $total_pvs += (int)$points;

        $pvs = PV::where('user_id', $user->id)->first();

        if (!isset($pvs))
        {
            $pvs = $this->create_member_pvs($user,  $left, $right, $left_extra, $right_extra);
        }else{

            $pvs->left = $left;
            $pvs->right = $right;
            $pvs->left_extra = $left_extra;
            $pvs->right_extra = $right_extra;
            $pvs->save();

        }



//dd('HI');
//        $user_rewards->left_pvs = (int)$left_pvs;
//        $user_rewards->right_pvs = (int)$right_pvs;
//        $user_rewards->save();


//        $right_pvs = $this->get_index_pvs([$right_index], $sum = 0);
//
//        echo '<br><br>************** LEFT PVS:   '. $left_pvs.'   *******************';
//
//
//        echo '<br><br>**************   RIGHT PVS  '. $right_pvs.'   *******************';


        return response()->json([
            "left" => $left + $left_extra,
            "right" => $right + $right_extra,
            "left_extra" => $left_extra,
            "right_extra" => $right_extra,
            "total_pvs" => $total_pvs,
            "points" => $points,
        ]);
    }

// @params array users (downlines and summation )
    public function get_index_pvs($indexes)
    {
        $next_dls = array();
        if (count($indexes) > 0) {
            if ($this->generation < 15)
            {
                $this->generation++;
                foreach ($indexes as $index) {
                    if ($index != null) {
                        $user = User::where('username', $index)->first();
                        $user_reward = $user->rewards;
//                    $left_pvs = $user_reward->left_pvs;
//                    $right_pvs = $user_reward->right_pvs;


                        $points = $user_reward->points;
                        $this->total += $points;
//                        echo "     NAME: " . $user->username . " and PV = $points" . "<br>";
//                        echo " TOTAL: " . $this->total . "<br>";
//                        echo " GENERATION: " . $this->generation . "<br> <hr>";
                        $next_gen = $this->get_next_pv_dls($user);

                        if ($next_gen != null) {
                            foreach ($next_gen as $d) {
                                if ($d != null) {
//                                dd($d);
                                    array_push($next_dls, $d);
                                }
                            }
                        } //TODO = else
//dd($next_d);

                    }
                }

                if (count($next_dls) > 0) {

                    $this->get_index_pvs($next_dls, $this->total);
                }
            }
            else{
                $this->generation2++;
                foreach ($indexes as $index) {
                    if ($index != null) {
                        $user = User::where('username', $index)->first();
                        $user_reward = $user->rewards;
//                    $left_pvs = $user_reward->left_pvs;
//                    $right_pvs = $user_reward->right_pvs;
                        $points2 = $user_reward->points;

                        $this->total2 += $points2;
//                        echo "     NAME: " . $user->username . " and PV = $points2" . "<br>";
//                        echo " TOTAL: " . $this->total2 . "<br>";
//                        echo " GENERATION: " . $this->generation2 . "<br> <hr>";

                        $next_gen = $this->get_next_pv_dls($user);

                        if ($next_gen != null) {
                            foreach ($next_gen as $d) {
                                if ($d != null) {
//                                dd($d);
                                    array_push($next_dls, $d);
                                }
                            }
                        } //TODO = else
//dd($next_d);

                    }
                }

                if (count($next_dls) > 0) {

                    $this->get_index_pvs($next_dls, $this->total);
                }
            }


        }

        return [$this->total, $this->total2];
    } //ends get_index_pvs


    public function get_next_pv_dls(User $user)
    {
        if ($user) {
            $p1 = $user->left_index;
            $p2 = $user->right_index;
            if ($p1 == null && $p2 == null) {
                return null;
            }

            $dl = ["p1" => $p1, "p2" => $p2];

            return $dl;
        }

        return null;
    }

    public  function create_member_pvs(User $user, $left, $right, $left_extra, $right_extra)
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
