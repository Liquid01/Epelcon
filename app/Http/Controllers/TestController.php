<?php

namespace App\Http\Controllers;

use App\Matrix;
use App\Notifications\TransactionNotification;
use App\Package;
use App\StageMatrix;
use App\User;
use App\user_reward;
use App\Withdrawal;
use Illuminate\Http\Request;

class TestController extends Controller
{

//    private $next_downlines = array();
    private $seen = null;
    private $downline_count = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function test()
    {
//        //jumps
//        dd( $this->check_jumps(10, 114, 30));

        //minimal difference


        //Odd occurrenceces in an arry
//        $integerNumber = [5,6,7,8,4,3,5,7,3,4,8];
//        $new = array_count_values($integerNumber);
//        while (list($key, $val) = each($new))
//        {
//            echo "$key -> $val <br>";
//        }
//        $pre = -1;
//        $space = -1; // means there are zero or excatly one '1's
//
//        // PHP_INT_SIZE contains the number of bytes an integer
//        // will consume on your system. The value * 8 is the number of bits.
//        for($loc=0; $loc < PHP_INT_SIZE * 8; $loc++) {
//            if(($integerNumber >> $loc) & 1) {
//                if($pre !== -1) {
//                    $space = max($space, $loc - $pre -1);
//                }
//                $pre = $loc;
//            }
//        }
//
//        echo "$integerNumber " . decbin($integerNumber) . "  ";
//        echo "max gap: {$space}\n";
//        { return max(array_map('strlen', explode('1', decbin($integerNumber)))); }
    }

    function check_jumps($x, $y, $d)
    {
        $distance = $y - $x;
        $number_of_jumps = round($distance / $d);
        return $number_of_jumps;
    }


    public function test_extra_ref($username)
    {
        $user = User::where('username', $username)->first();
//        dd($user);
        $sponsor_matrix = Matrix::where('username', $user->sponsor)->first();
        $sponsor = User::where('username', $user->sponsor)->first();
        $position = $user->position;
//        dd($position);

        if ($position == config('app.left')) {
            if ($sponsor_matrix->p1 == null) {
                $sponsor_matrix->p1 = $user->username;
                $sponsor_matrix->save();
                $this->update_sponsor_stage($user->sponsor, 0, 1);
                $this->update_sponsor_index($sponsor, $user->username, $position);
            } else {
//                    TODO GET NEXT AVAILABLE PARENT/UPLINE

                $parent_details = $this->check_available_parent([$sponsor_matrix->p1], $user);
                $user->parent = $parent_details;
                $user->save();

                dd('left is full');

            }
        } elseif ($position == config('app.right')) {
            if ($sponsor_matrix->p2 == null) {
                $sponsor_matrix->p2 = $user->username;
                $sponsor_matrix->save();
                $this->update_sponsor_stage($user->sponsor, 0, 1);
                $this->update_sponsor_stage($user->sponsor, 0, 1);
                $this->update_sponsor_index($sponsor, $user->username, $position);
            } else {
//                    TODO GET NEXT AVAILABLE PARENT/UPLINE
//
//                dd($sponsor_matrix);
                $next_par = User::where('username', $sponsor_matrix->p2)->first();
                dd($next_par);
                $parent_details = $this->check_available_parent([$next_par->left_index, $next_par->right_index], $user);
//                dd($parent_details[0]->username);
                $user->parent = $parent_details[0]->username;
                $user->save();

            }

        }
//            dd($sponsor_matrix);
//            if ($sponsor_matrix->p1 != null) {
//                $sponsor_matrix->p2 = $user->username;
//                $sponsor_matrix->save();
//                $this->update_sponsor_stage($user->sponsor, 0, 1);
//            } else {
//                $sponsor_matrix->p1 = $user->username;
//                $sponsor_matrix->save();
//                $this->update_sponsor_stage($user->sponsor, 0, 1);
//            }

        return;


    }


    public function check_available_parent(array $parents, User $user)
    {
        $another_gen = [];
        $parents_arr = [];

//        dd($parents);

        if (count($parents) > 1) {
            foreach ($parents as $parent) {
                $parent_details = User::where('username', $parent)->first();
//            dd($parent_details);
                if ($parent_details->left_index == null) {
                    $parent_details->left_index = $user->username;
                    $parent_details->save();
                    array_push($parents_arr, $parent_details);
                    break;
//                return $parents_arr;
                } elseif ($parent_details->right_index == null) {
                    $parent_details->right_index = $user->username;
                    $parent_details->save();
                    array_push($parents_arr, $parent_details);
                    break;

                } else {
//            dd($parent_details);

                    array_push($another_gen, $parent_details->left_index, $parent_details->right_index);

                    continue;
//                return $another_gen;
                }
                $this->check_available_parent($another_gen, $user);
            }
        } else {
            return $parents;
        }

        return $parents_arr;
//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function test_feeder_matrix($username)
    {
//        $em = ["p1"=>30, "p2"=>89];
//        dd($em['p2']);
        $user = User::where('username', $username)->first();
        $current_stage = $user->stage;
        $current_level = $user->level;
        $matrix = Matrix::where('username', $username)->first();


        if ($matrix->p1 == null && $matrix->p2 == null) {
            $current_stage = 0;
            $current_level = 0;
            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();
        }

        if ($matrix->p1 == null && $matrix->p2 != null) {
            $current_stage = 0;
            $current_level = 1;

            $level1 = $this->check_level_2($matrix->p2);
            if ($matrix->p5 == null) {
                if ($level1['p5'] != null) {
                    $matrix->p5 = $level1['p5'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }

            if ($matrix->p6 == null) {
                if ($level1['p6'] != null) {
                    $matrix->p6 = $level1['p6'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }

            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();

        }

        if ($matrix->p1 != null && $matrix->p2 == null) {
            $current_stage = 0;
            $current_level = 1;

            $level1 = $this->check_level_1($matrix->p1);
            if ($matrix->p3 == null) {
                if ($level1['p3'] != null) {
                    $matrix->p3 = $level1['p3'];
                    $matrix->save();
                    $current_level = 1;
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }

            if ($matrix->p4 == null) {
//                dd('hi2');
                if ($level1['p4'] != null) {
                    $matrix->p4 = $level1['p4'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }
            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();
        }

        if ($matrix->p1 != null && $matrix->p2 != null) {

            $current_stage = 0;
            $current_level = 1;

            if ($matrix->p3 != null || $matrix->p4 != null || $matrix->p5 != null || $matrix->p6 != null) {
                $current_level = 2;
            }

            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();

        }

        if ($current_level = 2) {
            if ($matrix->p3 && $matrix->p4 && $matrix->p5 && $matrix->p6 != null) {
                $current_stage = 1;
                $current_level = 0;
            }

            if ($matrix->p3 == null || $matrix->p4 == null || $matrix->p5 == null || $matrix->p6 == null) {
                $current_stage = 0;
                $current_level = 2;
            }

            $level1 = $this->check_level_1($matrix->p1);
            if ($matrix->p3 == null) {
                if ($level1['p3'] != null) {
                    $matrix->p3 = $level1['p3'];
                    $matrix->save();
                    $current_level = 1;
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }

            if ($matrix->p4 == null) {


                if ($level1['p4'] != null) {

                    $matrix->p4 = $level1['p4'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }

            $level2 = $this->check_level_1($matrix->p2);


            if ($matrix->p5 == null) {
                if ($level2['p5'] != null) {
                    $matrix->p5 = $level1['p5'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }

            if ($matrix->p6 == null) {
                if ($level2['p6'] != null) {
                    $matrix->p6 = $level1['p6'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user);
                }
            }

            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();
        }


//dd($matrix, $user);
        return response()->json(["stage" => $current_stage, "level" => $current_level]);

    }


//    public function check_level_1($username)
//    {
//        $matrix = Matrix::where('username', $username)->first();
////        dd($matrix);
//        if ($matrix->p1 != null & $matrix->p2 != null) {
//            return ["p3"=>$matrix->p1, "p4"=>$matrix->p2];
//        }elseif($matrix->p1 != null & $matrix->p2 == null)
//        {
//            return ["p3"=>null, "p4"=>$matrix->p2];
//        }elseif ($matrix->p1 == null & $matrix->p2 != null)
//        {
//            return array(["p3"=>$matrix->p1, "p4"=>null]);
//        }elseif ($matrix->p1 == null & $matrix->p2 == null)
//        {
//            return array(["p3"=>null, "p4"=>null]);
//        }
//
//        return null;
//
//    }
//
//    public function check_level_2($username)
//    {
//        $matrix = Matrix::where('username', $username)->first();
////        dd($matrix);
//        if ($matrix->p1 != null & $matrix->p2 != null) {
//            return ["p5"=>$matrix->p1, "p6"=>$matrix->p2];
//        }elseif($matrix->p1 != null & $matrix->p2 == null)
//        {
//            return ["p5"=>null, "p6"=>$matrix->p2];
//        }elseif ($matrix->p1 == null & $matrix->p2 != null)
//        {
//            return array(["p5"=>$matrix->p1, "p6"=>null]);
//        }elseif ($matrix->p1 == null & $matrix->p2 == null)
//        {
//            return array(["p5"=>null, "p6"=>null]);
//        }
//
//        return null;
//
//    }


    public function credit_account($amount, $user)
    {
//        dd($amount);
        $account = user_reward::where('membership_id', $user->membership_id)->first();

        $account->shopping += $amount;
        $account->save();

//        dd($account);

        return;
    }


    public function test_stage_matrix($username)
    {
        // matrix owner
        $user = User::where('username', $username)->first();
        $stage = $user->stage;
        $level = $user->level;

        if ($stage == 1) {
            $sdb = config('app.stage1_sdb');
        } elseif ($stage == 2) {
            $sdb = config('app.stage2_sdb');
        } elseif ($stage == 3) {
            $sdb = config('app.stage3_sdb');
        } elseif ($stage == 4) {
            $sdb = config('app.stage4_sdb');
        } elseif ($stage == 5) {
            $sdb = config('app.stage5_sdb');
        } elseif ($stage == 6) {
            $sdb = config('app.stage6_sdb');
        } elseif ($stage == 7) {
            $sdb = config('app.stage7_sdb');
        }

        // his Feeder matrix
        $matrix = Matrix::where('username', $username)->first();

        // his current stage matrix
        $stage_matrix = StageMatrix::where('username', $username)
            ->where('stage', $stage)->first();

        // dd($matrix);
        if ($stage_matrix) {
            for ($i = 1; $i <= 14; $i++) {
                $pos = "p" . $i;
                if ($stage_matrix->$pos == null) {

                    // downlines' positions to check
                    switch ($i) {
                        case 1:
                            $p = $matrix->p1;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 2:
                            $p = $matrix->p2;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 3:
                            $p = $matrix->p3;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 4:
                            $p = $matrix->p4;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 5:
                            $p = $matrix->p5;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 6:
                            $p = $matrix->p6;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 7:
                            $p_matrix = Matrix::where('username', $matrix->p3)->first();
                            $p = $p_matrix->p1;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 8:
                            $p_matrix = Matrix::where('username', $matrix->p3)->first();
                            $p = $p_matrix->p2;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 9:
                            $p_matrix = Matrix::where('username', $matrix->p4)->first();
                            $p = $p_matrix->p1;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 10:
                            $p_matrix = Matrix::where('username', $matrix->p4)->first();
                            $p = $p_matrix->p2;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 11:
                            $p_matrix = Matrix::where('username', $matrix->p5)->first();
                            $p = $p_matrix->p1;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 12:
                            $p_matrix = Matrix::where('username', $matrix->p5)->first();
                            $p = $p_matrix->p2;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 13:
                            $p_matrix = Matrix::where('username', $matrix->p6)->first();
                            $p = $p_matrix->p1;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;
                        case 14:
                            $p_matrix = Matrix::where('username', $matrix->p6)->first();
                            $p = $p_matrix->p2;
                            echo "I am " . $p . " and its my Turn <br>";
                            break;

                    }


//                    The person in the position's account
                    $p_account = User::where('username', $p)->first();
//                    dd($p_account);

                    $in_matrix = array();

                    array_push($in_matrix,
                        $stage_matrix->p1,
                        $stage_matrix->p2,
                        $stage_matrix->p3,
                        $stage_matrix->p4,
                        $stage_matrix->p5,
                        $stage_matrix->p6,
                        $stage_matrix->p7,
                        $stage_matrix->p8,
                        $stage_matrix->p9,
                        $stage_matrix->p10,
                        $stage_matrix->p11,
                        $stage_matrix->p12,
                        $stage_matrix->p13,
                        $stage_matrix->p14
                    );


                    if ($p_account != null) {
                        if (in_array($p_account->username, $in_matrix)) {
                            $inside = true;
                        } else {
                            $inside = false;
                        }
//                        if the person is in the User's Stage, put him in the user's matrix if not,
//                        check his own matrix and downlines for same.

                        if ($p_account->stage == $stage && $inside == false) {
                            $stage_matrix->$pos = $p;
                            $stage_matrix->save();
                            $credit = $this->credit_account($sdb, $user);
                        } else {
//                          check persons left and right downlines if they can replace him in the position


                            $next_p = $this->get_next_p($stage, array($p_account->left_index, $p_account->right_index), $in_matrix);
                            if ($next_p != null) {
                                if (in_array($next_p, $in_matrix)) {
                                    continue;
                                } else {
                                    $stage_matrix->$pos = $next_p;
                                    $stage_matrix->save();
                                    $credit = $this->credit_account($sdb, $user);
                                }

                            }
                        }
                    }


                }//end if position == null

            }// end for

        }

        return response()->json(['stage' => $stage, 'level' => $level]);
    }

    public function check_p($p)
    {

        return;
    }


    /**
     * @param $stage
     * @param $downlines
     * @param $in_matrix
     * @return null
     */
    public function get_next_p($stage, $downlines, $in_matrix)
    {
        $next_downlines = [];

        if ($this->seen != null) {
            return $this->seen;
        }
        if (count($downlines) > 0) {
            foreach ($downlines as $downline) {
                if ($downline == null) {
                    continue;
                } else {
                    $dl_account = User::where('username', $downline)->first();
                    if (in_array($dl_account->username, $in_matrix)) {
                        $inside = true;
                        echo $dl_account->username . ' is in the array <br> ';
                    } else {
                        $inside = false;
                        echo $dl_account->username . ' is not in the array ';
                    }

                    if ($dl_account->stage == $stage && $inside == false) {
                        $next_downlines = [];
                        echo $dl_account->username . ' is in stage 1 and not in the array ';
                        $this->seen = $dl_account->username;
                        return $this->seen;
                    } else {
                        echo $dl_account->username . ' is not in stage 1 or in the array ';
                        $left = $dl_account->left_index;
                        $right = $dl_account->right_index;
                        if ($left != null) {
                            array_push($next_downlines, $left);
                        }

                        if ($right != null) {
                            array_push($next_downlines, $right);
                        }
                        continue;
                    }
                }

            }
            echo "*****************************************************************************************";
            echo "next downlines to check are<br>";
            foreach ($next_downlines as $d) {
                echo $d;
            }
            echo "<br> &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&<br>";

            $this->get_next_p($stage, $next_downlines, $in_matrix);
        } else {
            return $this->seen;
        }

        return null;
    }

    public function get_downlines_count($username)
    {


        $count = $this->dl_count([$username]);

        echo $count - 1;


    }

    public function dl_count($downlines)
    {
        $counted = [];

        if (count($downlines) == 0 || $this->downline_count == 100) {
            return $this->downline_count;
        } else {
            foreach ($downlines as $downline) {
                $count = $this->downline_count++;
//                echo "i am ". $downline . " COUNT = ". $count . "  ****************** ";
                array_push($counted, $downline);
            }

            $nextd = $this->get_next_dls($counted);

            if (count($nextd) > 0) {
                $this->dl_count($nextd);
            }
        }

        return $this->downline_count;
    }

    public function get_next_pv_dls(User $user)
    {
//        $user = User::where('username', $username)->first();

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


    public function get_downlines($username)
    {
        $first_downlines = null;

        $user = User::where('username', $username)->first();
        if ($user) {
            $p1 = $user->left_index;
            $p2 = $user->right_index;
            $dl = ["p1" => $p1, "p2" => $p2];


            if ($p1 != null) {
                $dl2 = $this->get_next_dls($p1);

                $p3 = $dl2[0];
                $p4 = $dl2[1];
            } else {
                $p3 = null;
                $p4 = null;
            }

            if ($p2 != null) {
                $dl3 = $this->get_next_dls($p2);
                $p5 = $dl3[0];
                $p6 = $dl3[1];
            } else {
                $p5 = null;
                $p6 = null;
            }

            $downlines = array("p1" => $p1, "p2" => $p2, "p3" => $p3, "p4" => $p4, "p5" => $p5, "p6" => $p6);
        }

        $first_downlines = $downlines;


        return $first_downlines;
    }


    public function test_notification($username)
    {
        $user = app('current_user');
        $this->debit_notification($user, 100, "DEBIT", "TEXTING");

        return "done";
    }


    public function credit_notification(User $user, $amount, $type, $for)
    {
        $intoLines = "your Account has benn credited with NGN" . $amount;
        $outroLines = "The Credit was for " . $for;
        $subject = "ACCOUNT CREDITED";
        $actionText = "View Details";
        $actionUrl = route('dashboard');
        $user->notify(new TransactionNotification($type, $intoLines, $outroLines, $subject, $actionText, $actionUrl));
    }

    public function debit_notification(User $user, $amount, $type, $for)
    {
        $intoLines = "your Account has benn DEBITED with NGN" . $amount;
        $outroLines = "The DEBIT was for " . $for;
        $subject = "ACCOUNT DEBITED";
        $actionText = "View Details";
        $actionUrl = route('dashboard');
        $user->notify(new TransactionNotification($type, $intoLines, $outroLines, $subject, $actionText, $actionUrl));
    }

    private $total_pvs = 0;

    public function get_pvs(User $user)
    {
//        dd($user);
        $left_index = $user->left_index;
        $right_index = $user->right_index;
//        dd($left_pvs);
        if ($left_index != null) {
            $left_pvs = $this->get_index_pvs([$left_index], $sum = 0);
        } else {
            $left_pvs = 0;
        }

        if ($right_index != null) {
            $right_pvs = $this->get_index_pvs([$right_index], $sum = 0);
        } else {
            $right_pvs = 0;
        }


//        $right_pvs = $this->get_index_pvs([$right_index], $sum = 0);

//        dd($right_pvs);

        return response()->json(["left_pvs" => $left_pvs, "right_pvs" => $right_pvs]);
    }

    private $total = 0;

// @params array users (downlines and summation )
    public function get_index_pvs($indexes, $sum)
    {
//        echo $sum . ' '.'******'. ' ';
        $next_dls = array();

        if (count($indexes) > 0) {
            foreach ($indexes as $index) {
                if ($index != null) {

                    $user = User::where('username', $index)->first();
//                    dd($user);
//                    check total pvs
                    $user_reward = user_reward::where('membership_id', $user->membership_id)->first();
                    $left_pvs = $user_reward->left_pvs;
                    $right_pvs = $user_reward->right_pvs;
                    $points = $user_reward->points;

                    $this->total += $left_pvs;
//                        $this->total_pvs += $left_pvs;


                    $this->total += $right_pvs;
//                        $this->total_pvs += $right_pvs;


                    $this->total += $points;

                    echo "************this is total:***********" . $sum . '**********->';


//                    echo "**************** i am " . $downline . " and count = " . $count . " -*******";

                    $next_d = $this->get_next_pv_dls($user);

//dd($next_d);
                    foreach ($next_d as $d) {
                        if ($d != null) {
//                            echo $d;
                            array_push($next_dls, $d);

                        }
                    }

                }
            }

            if (count($next_dls) > 0) {

                $this->get_index_pvs($next_dls, $this->total);
            }

//            return $su

        }

//       echo $count;
//        dd($sum);

        return $this->total;
    } //ends get_index_pvs

    public function update_pvs()
    {

        $users = User::where('sponsor', '<>', 'Root')->get();

//        dd($users);

        foreach ($users as $user) {
            $username = $user->username;
            $sponsor = $user->sponsor;
            $parent = $user->parent;
            $package_id = $user->package_id;
            $position = $user->position;


            if ($sponsor == $parent) {
                $sponsor_details = User::where('username', $user->sponsor)
                    ->where('username', $user->parent)->first();

                $user_reward = user_reward::where('membership_id', $sponsor_details->membership_id)->first();
                $package = Package::where('id', $package_id)->first();

                if ($position == 0) {
                    $user_reward->left_pvs += $package->pv;
                    $user_reward->save();
                }

                if ($position == 1) {
                    $user_reward->right_pvs += $package->pv;
                    $user_reward->save();
                }


                echo ' NAME: ' . $username;

                echo '    SPONSOR: ' . $sponsor;

                echo '    PARENT: ' . $parent;

                echo '    PACKAGE: ' . $package_id;

                echo '    POSITION: ' . $position;
                echo "************************************ <br>";
                echo "************************************ <br>";

                echo '    SPONSOR LEFT PV: ' . $user_reward->left_pvs;
                echo '    SPONSOR RIGHT PV: ' . $user_reward->right_pvs;

                echo "************************************ <br>";
                echo "************************************ <br>";
                echo "************************************ <br>";


                echo '<br>';

//                dd($user_reward);
//                foreach ($users as $user)


            } else {
                $parent_details = User::where('username', $user->parent)->first();

                $user_reward = user_reward::where('membership_id', $parent_details->membership_id)->first();
                $package = Package::where('id', $package_id)->first();

                if ($position == 0) {
                    if ($user_reward->left_pvs == 0) {
                        $user_reward->left_pvs += $package->pv;
                        $user_reward->save();
                    }

                }

                if ($position == 1) {
                    $user_reward->right_pvs += $package->pv;
                    $user_reward->save();
                }


                echo ' NAME: ' . $username;

                echo '    SPONSOR: ' . $sponsor;

                echo '    PARENT: ' . $parent;

                echo '    PACKAGE: ' . $package_id;

                echo '    POSITION: ' . $position;
                echo "************************************ <br>";
                echo "************************************ <br>";

                echo '    PARENT LEFT PV: ' . $user_reward->left_pvs;
                echo '    PARENT RIGHT PV: ' . $user_reward->right_pvs;

                echo "************************************ <br>";
                echo "************************************ <br>";
                echo "************************************ <br>";


                echo '<br>';

//                dd($user_reward);
//                foreach ($users as $user)


            }


        }
        return 'COMPLETED SUCCESSFULLY';

    }

    public function member_reset_cash()
    {

        $members = User::where('username', '!=', 'root')->get();
        foreach ($members as $user)
        {
            $summed = 0;
//            $user = app('current_user');
            $rewards = $user->rewards;
//      dd($user->username);

            $sponsored = User::where('sponsor', $user->username)->get();
//      dd($sponsored);
            echo "**********************   $user->username"." ******************";
            foreach ($sponsored as $referred) {
                $package = $referred->package;;
                $referred_bonus = $package->referral_bonus;
                echo $referred->username.'--:'. $referred->package->name. ' **** '.$referred_bonus.'****';
                $summed += $referred_bonus;


            }
            $rewards->cash = $summed;
            echo "<br><br><br>". '<h1>'.$summed .'</h1>' ."<br><br>";
            $rewards->save();

        }
//        dd($members);


        return 'COMPLETED SUCCESSFULLY';
    }


    public function deduct_from_wallet()
    {

        $all_members = User::where('username', '!=', 'root')->get();
        foreach($all_members as $user)
        {
            $summed = 0;
//            $user = app('current_user');

            $user_reward = $user->rewards;

            $user_withdrawals = Withdrawal::where('by', $user->username)->get();

            foreach ($user_withdrawals as $withdrawal)
            {
                $summed += $withdrawal->value;
                $withdrawal->status = 1;
                $withdrawal->save();
            }
            $user_reward->cash -= $summed;
//        dd($summed);
            $user_reward->save();
        }

        return 'DONE';
    }



}


