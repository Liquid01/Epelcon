<?php

namespace App\Http\Controllers;

use App\user_reward;
use Illuminate\Http\Request;
use App\User;

class DownlineController extends Controller
{

    public function __controller()
    {
        $this->middleware(['auth', 'member']);
        $this->downline_count = 0;
        $this->total_pvs = 0;
        $this->sub_total = 0;
        
        // sleep(600);
    }

    //
    private $downline_count = 0;
    private $total_pvs = 0;
    private $sub_total = 0;


    public function get_downline_count()
    {

        $user = app('current_user');
//        dd($user);
        $username = $user->username;
        $this->downline_count = 0;
        $count = $this->dl_count([$user->left_index, $user->right_index], $count = 0);
//        return $count;
        return response()->json(["count" => $count]);
    }

    public function dl_count($downlines, $count)
    {
        $next_dls = array();

        if (count($downlines) > 0) {

            foreach ($downlines as $downline) {
                if ($downline != null) {

                    $this->downline_count++;

//                    echo "NAME:  " . $downline . " <br>  COUNT: " . $this->downline_count . "<hr>";

                    $next_d = $this->get_next_dls($downline);

//                    echo $next_dls['p1'];
//                    echo $next_dls['p2'];
//                    dd($next_d);

                    foreach ($next_d as $d) {
                        if ($d != null) {
//                            echo $d;
//                            $this->downline_count++;
//                            $count++;
                            array_push($next_dls, $d);

                        }

//                        dd($next_d);
                    }
//                    dd($next_dls);

                }
            }
            $this->dl_count($next_dls, $count);


        }


//       echo $count;

        return $this->downline_count;
    }

    public function get_next_dls($username)
    {
        $user = User::where('username', $username)->first();

//        if ($user == null)
//        {
//            dd($username);
//        }

        if ($user) {
            $p1 = $user->left_index;
            $p2 = $user->right_index;
            $dl = ["p1" => $p1, "p2" => $p2];

            return $dl;
        }

        return null;
    }

    public function get_pvs(User $user)
    {
        $this->total = 0;
        $this->sub_total = 0;
        $total_pvs = 0;

//        user first downlines
        $left_index = $user->left_index;
        $right_index = $user->right_index;

//        user reward record
        $user_rewards = user_reward::where('membership_id', $user->membership_id)->first();
//        dd($left_pvs);

        if ($left_index != null)
        {
            $this->total = 0;
            $left_pvs = $this->get_index_pvs([$left_index], $sum = 0);
//            echo "LEFT PV = : ". $left_pvs .' <br>';

        }else{
            $left_pvs = 0;
        }

        if ($right_index != null)
        {
            $this->total = 0;
            $right_pvs = $this->get_index_pvs([$right_index], $sum = 0);
//            echo "RIGHT PV = : ". $right_pvs .' <br>';

        }else{
            $right_pvs = 0;
        }

        $points = $user_rewards->points;
        $total_pvs += (int) $left_pvs;
        $total_pvs += (int) $right_pvs;
        $total_pvs += (int) $points;






//        $right_pvs = $this->get_index_pvs([$right_index], $sum = 0);
//
//        echo '<br><br>************** LEFT PVS:   '. $left_pvs.'   *******************';
//
//
//        echo '<br><br>**************   RIGHT PVS  '. $right_pvs.'   *******************';


        return response()->json(["left_pvs" => $left_pvs, "right_pvs" => $right_pvs, "total_pvs" => $total_pvs, "points" => $points]);
    }

    private $total = 0;
// @params array users (downlines and summation )
    public function get_index_pvs($indexes, $sum)
    {

//        dd($indexes);


        $next_dls = array();

        if (count($indexes) > 0) {
            foreach ($indexes as $index) {
                if ($index != null) {
                    $user = User::where('username', $index)->first();


                    $user_reward = $user->rewards;
                    $left_pvs = $user_reward->left_pvs;
                    $right_pvs = $user_reward->right_pvs;

                    $points = $user_reward->points;
                    $sub_total = $left_pvs + $right_pvs + $points;

                    $this->total += $sub_total;


//                    echo "     NAME: " . $user->username . " and PV = $sub_total" . "<br>";
//                    echo " TOTAL: " .$this->total ."<br> <hr>";

//                    echo "LEFT: " .$left_pvs. '********* <br>';
//                    echo "RIGHT: " .$right_pvs. '********* <br>';
//                    echo "POINTS: " .$points. '********* <br>';
//                    echo "TOTAL: " .$sub_total. '********* <br> <hr>';
//                    echo "TOTALd: " .$this->total. '********* <br> <hr>';

                    $next_d = $this->get_next_pv_dls($user);
//dd($next_d);
                    foreach ($next_d as $d) {
                        if ($d != null) {
                            array_push($next_dls, $d);
                        }
                    }
                }
            }

            if (count($next_dls) > 0){

                $this->get_index_pvs($next_dls, $this->total);
            }

        }


        return $this->total ;

    } //ends get_index_pvs


    public function get_next_pv_dls(User $user)
    {


        if ($user) {
            $p1 = $user->left_index;
            $p2 = $user->right_index;
            $dl = ["p1" => $p1, "p2" => $p2];

            return $dl;
        }

        return null;
    }
}
