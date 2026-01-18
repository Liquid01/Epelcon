<?php

namespace App\Http\Controllers\Admin;

use App\Matrix;
use App\StageMatrix;
use App\Transaction;
use App\User;
use App\user_reward;
use Illuminate\Http\Request;

class StageMatrixController extends Controller
{
    private $seen = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create($username, $stage)
    {
        $new_matrix = new StageMatrix([
            'username' => $username,
            'stage' => $stage,
        ]);

        $new_matrix->save();

        return $new_matrix;
    }


//    ajax check stage matrix
    public function check_stage_matrix()
    {
//        get the current user, stage and level
        $user = app('current_user');
//        $user_account = app('current_user_account');

        $username = $user->username;
        $stage = $user->stage;
        $level = $user->level;

//        get this stage SDB

        $sdb = $this->get_sdb($stage);

        // his Feeder matrix i.e. his first 6 to use;
        $matrix = Matrix::where('username', $username)->first();

        // get his current stage matrix; his
        $stage_matrix = StageMatrix::where('username', $username)
            ->where('stage', $stage)->first();

//        dd($stage_matrix);
//        if the stage matrix is not empty, get the positions filled into an array to avoid duplications
        if ($stage_matrix) {
//            get the first 14 people to use if available
            $accounts_to_check = [$matrix->p1, $matrix->p2];
//            dd($accounts_to_check);

            $left = [1, 3, 4, 7, 8, 9, 10];
            $right = [2, 5, 6, 11, 12, 13, 14];
//

//            get the positions filled into an array to avoid duplications
            $in_matrix = $this->get_in_matrix($stage_matrix);

            // dd($matrix);

            for ($i = 1; $i <= 14; $i++) {
                $pos = "p" . $i;

//                echo " --CHECKING --". $pos ." -- ";
//                echo" i am next account - $accounts_to_check[$pos]";

                if ($stage_matrix->$pos == null) {
//                    echo $pos . " is null";
                    if (in_array($i, $left))
                    {
                        $p = $accounts_to_check[0];

                    }

                    if (in_array($i, $right))
                    {
                        $p = $accounts_to_check[1];
                    }

//

//                    dd($p);


//                    The person in the position's account
                    $p_account = User::where('username', $p)->first();
//                    echo " checking ". $p;


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
                            $credit = $this->credit_account($sdb, $user, config('app.credit'), "STAGE_" . $stage . "_DROP_BONUS From " . strtoupper($p) . " joining you", $stage);
//                            update in_matrix with new person;
                            $in_matrix = $this->get_in_matrix($stage_matrix);

//                            echo " I am ". $p . "i have been added to the matrix";

                            continue;
                        } else {
//                          check persons left and right downlines if they can replace him in the position
//                            get current placeholder's matrix
//                            echo " I am ". $p . "i am not in stage or i am in Matrix already";
                            $p_account_matrix = Matrix::where('username', $p_account->username)->first();

//                            dd($p_account_matrix->p2);
                            $p_left = $p_account_matrix->p1;
                            $p_right = $p_account_matrix->p2;

                            $next_p = $this->get_next_p($stage, array($p_left, $p_right), $in_matrix);

//                            dd($next_p);

                            if ($next_p != null) {
                                if (in_array($next_p, $in_matrix)) {
                                    continue;
                                } else {
                                    $stage_matrix->$pos = $next_p;
                                    $stage_matrix->save();
                                    $credit = $this->credit_account($sdb, $user, config('app.credit'), "STAGE_" . $stage . "_DROP_BONUS From " . strtoupper($next_p) . " joining you", $stage);
//                                    update in_matrix with new person;
                                    $in_matrix = $this->get_in_matrix($stage_matrix);
                                    $this->seen = null;
                                    continue;
                                }

                            }else{
                                continue;
                            }

                        }
                    }


                }//end if position == null
//                else {
//
//                }

            }// end for

        }

        $new_level = $this->check_stage_level($stage_matrix);
//         dd($new_level);
        if ($new_level['completed'] == true) {

            $scb = $this->get_scb($stage);
            $this->credit_account($scb, $user, config('app.credit'), "STAGE_" . $stage . "_COMPLETION_BONUS", $stage);
            $stage += 1;
            $level = 0;

            $this->update_stage($stage, $level);

        } else {
            $level = $new_level['level'];
            $this->update_stage($stage, $level);
        }

        return response()->json(["stage" => $stage, "level" => $level]);

    }

    public function update_all_stages()
    {
        $members = User::where('username', '!=', 'root')
           -> where('stage', 1)->get();
//        dd($members);
        foreach ($members as $member) {
            $res = $this->check_all_stage_matrix($member);

        }

        return 'Done Updating Matrix for all;';
    }
    public function check_all_stage_matrix(User $user)
    {
//        $user = app('current_user');
//        $user_account = app('current_user_account');

        $username = $user->username;
        $stage = $user->stage;
        $level = $user->level;

//        get this stage SDB

        $sdb = $this->get_sdb($stage);

        // his Feeder matrix i.e. his first 6 to use;
        $matrix = Matrix::where('username', $username)->first();

        // get his current stage matrix; his
        $stage_matrix = StageMatrix::where('username', $username)
            ->where('stage', $stage)->first();

//        dd($stage_matrix);
//        if the stage matrix is not empty, get the positions filled into an array to avoid duplications
        if ($stage_matrix) {
//            get the first 14 people to use if available
            $accounts_to_check = [$matrix->p1, $matrix->p2];
//            dd($accounts_to_check);

            $left = [1, 3, 4, 7, 8, 9, 10];
            $right = [2, 5, 6, 11, 12, 13, 14];
//

//            get the positions filled into an array to avoid duplications
            $in_matrix = $this->get_in_matrix($stage_matrix);

            // dd($matrix);

            for ($i = 1; $i <= 14; $i++) {
                $pos = "p" . $i;

//                echo " --CHECKING --". $pos ." -- ";
//                echo" i am next account - $accounts_to_check[$pos]";

                if ($stage_matrix->$pos == null) {
//                    echo $pos . " is null";
                    if (in_array($i, $left))
                    {
                        $p = $accounts_to_check[0];

                    }

                    if (in_array($i, $right))
                    {
                        $p = $accounts_to_check[1];
                    }

//

//                    dd($p);


//                    The person in the position's account
                    $p_account = User::where('username', $p)->first();
//                    echo " checking ". $p;


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
                            $credit = $this->credit_account($sdb, $user, config('app.credit'), "STAGE_" . $stage . "_DROP_BONUS From " . strtoupper($p) . " joining you", $stage);
//                            update in_matrix with new person;
                            $in_matrix = $this->get_in_matrix($stage_matrix);

//                            echo " I am ". $p . "i have been added to the matrix";

                            continue;
                        } else {
//                          check persons left and right downlines if they can replace him in the position
//                            get current placeholder's matrix
//                            echo " I am ". $p . "i am not in stage or i am in Matrix already";
                            $p_account_matrix = Matrix::where('username', $p_account->username)->first();

//                            dd($p_account_matrix->p2);
                            $p_left = $p_account_matrix->p1;
                            $p_right = $p_account_matrix->p2;

                            $next_p = $this->get_next_p($stage, array($p_left, $p_right), $in_matrix);

//                            dd($next_p);

                            if ($next_p != null) {
                                if (in_array($next_p, $in_matrix)) {
                                    continue;
                                } else {
                                    $stage_matrix->$pos = $next_p;
                                    $stage_matrix->save();
                                    $credit = $this->credit_account($sdb, $user, config('app.credit'), "STAGE_" . $stage . "_DROP_BONUS From " . strtoupper($next_p) . " joining you", $stage);
//                                    update in_matrix with new person;
                                    $in_matrix = $this->get_in_matrix($stage_matrix);
                                    $this->seen = null;
                                    continue;
                                }

                            }else{
                                continue;
                            }

                        }
                    }


                }//end if position == null
//                else {
//
//                }

            }// end for

        }

        $new_level = $this->check_stage_level($stage_matrix);
//         dd($new_level);
        if ($new_level['completed'] == true) {

            $scb = $this->get_scb($stage);
            $this->credit_account($scb, $user, config('app.credit'), "STAGE_" . $stage . "_COMPLETION_BONUS", $stage);
            $stage += 1;
            $level = 0;

            $this->update_stage($stage, $level);

        } else {
            $level = $new_level['level'];
            $this->update_stage($stage, $level);
        }

        return response()->json(["stage" => $stage, "level" => $level]);

    }


    public function get_first_14($stage_matrix, $matrix)
    {
        $in_matrix = array();
        $accounts_to_check = array();
        $p = null;
        for ($i = 1; $i <= 14; $i++) {

            switch ($i) {
                case 1:
                    $p = $matrix->p1;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 2:
                    $p = $matrix->p2;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 3:
                    $p = $matrix->p3;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 4:
                    $p = $matrix->p4;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 5:
                    $p = $matrix->p5;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 6:
                    $p = $matrix->p6;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 7:
                    $p_matrix = Matrix::where('username', $matrix->p3)->first();
                    $p = $p_matrix->p1;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 8:
                    $p_matrix = Matrix::where('username', $matrix->p3)->first();
                    $p = $p_matrix->p2;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 9:
                    $p_matrix = Matrix::where('username', $matrix->p4)->first();
                    $p = $p_matrix->p1;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 10:
                    $p_matrix = Matrix::where('username', $matrix->p4)->first();
                    $p = $p_matrix->p2;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 11:
                    $p_matrix = Matrix::where('username', $matrix->p5)->first();
                    $p = $p_matrix->p1;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 12:
                    $p_matrix = Matrix::where('username', $matrix->p5)->first();
                    $p = $p_matrix->p2;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 13:
                    $p_matrix = Matrix::where('username', $matrix->p6)->first();
                    $p = $p_matrix->p1;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;
                case 14:
                    $p_matrix = Matrix::where('username', $matrix->p6)->first();
                    $p = $p_matrix->p2;
                    //echo "I am " . $p . " and its my Turn <br>";
                    break;

            }

            $per = "p" . $i;

            $accounts_to_check[$per] = $p;

//            $pos = "p" . $i;
//            if ($stage_matrix->$pos == null) {
//
//                // downlines' positions to check
//
//
////                    The person in the position's account
//                $p_account = User::where('username', $p)->first();
////                    dd($p_account);
//
//                array_push($accounts_to_check, $p_account);
//
//
//
//                array_push($in_matrix,
//                    $stage_matrix->p1,
//                    $stage_matrix->p2,
//                    $stage_matrix->p3,
//                    $stage_matrix->p4,
//                    $stage_matrix->p5,
//                    $stage_matrix->p6,
//                    $stage_matrix->p7,
//                    $stage_matrix->p8,
//                    $stage_matrix->p9,
//                    $stage_matrix->p10,
//                    $stage_matrix->p11,
//                    $stage_matrix->p12,
//                    $stage_matrix->p13,
//                    $stage_matrix->p14
//                );
//            }
        }

        return $accounts_to_check;
    }

    public function get_in_matrix($stage_matrix)
    {
        $in_matrix = array(); //already in stage_matrix
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

        return $in_matrix;
    }

    public function check_left_tree(array $left, array $positions)
    {

        dd($positions);
        if ($positions->p1 == null) {

        }
    }

    public function check_right_tree(array $right, array $positions)
    {

    }


    public function get_sdb($stage)
    {
        $sdb = 0.00;
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

        return $sdb;
    }

    public function get_scb($stage)
    {
        $scb = 0.00;
        if ($stage == 1) {
            $scb = config('app.stage1_scb');
        } elseif ($stage == 2) {
            $scb = config('app.stage2_scb');
        } elseif ($stage == 3) {
            $scb = config('app.stage3_scb');
        } elseif ($stage == 4) {
            $scb = config('app.stage4_scb');
        } elseif ($stage == 5) {
            $scb = config('app.stage5_scb');
        } elseif ($stage == 6) {
            $scb = config('app.stage6_scb');
        } elseif ($stage == 7) {
            $scb = config('app.stage7_scb');
        }

        return $scb;
    }

    public function get_next_p($stage, $downlines, $in_matrix)
    {

        //count 15 generations @TODO to avoid infinity
        $next_downlines = [];
        if ($this->seen != null) {
            return $this->seen;
        } else {
            if (count($downlines) > 0) {
                foreach ($downlines as $downline) {
                    if ($downline == null) {
                        continue;
                    } else {
                        $dl_account = User::where('username', $downline)->first();
                        if (in_array($dl_account->username, $in_matrix)) {
                            $inside = true;
                        } else {
                            $inside = false;
                        }

                        if ($dl_account->stage == $stage && $inside == false) {
                            $next_downlines = [];
                            $this->seen = $dl_account->username;
                            break;
                        } else {
                            $dl_account_matrix = Matrix::where('username', $downline)->first();

                            //echo $dl_account->username . ' is not in stage 1 or in the array ';
                            $left = $dl_account_matrix->p1;
                            $right = $dl_account_matrix->p2;
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

                if ($this->seen != null)
                {
                    return $this->seen;
                }else{
                    $this->get_next_p($stage, $next_downlines, $in_matrix);
                }


            }
            return $this->seen;
        }
    }


    public function credit_account($amount, $user, $type, $for, $stage)
    {

        $tc = new TransactionController();
        $tc->credit_account($user, $amount, $type, $for, $stage);

        //@TODO Log the transaction and notify the user

        return;
    }

    public function debit_account($amount, $user, $type, $for, $stage)
    {

        $tc = new TransactionController();
        $tc->debit_account($user, $amount, $type, $for);


        //@TODO Log the transaction and notify the user

        return;
    }

    public function check_stage_level($stage_matrix)
    {
        $completed = false;
        $count = 0;
        $level = 0;
        $sm = $stage_matrix;
//        dd($sm);

        if ($sm != null) {
            if ($sm->p1 != null || $sm->p2 != null) {
                $level = 1;
            } else {
                $level = 0;
            }

            if ($level == 1) {
                if ($sm->p1 != null && $sm->p2 != null) {
                    if ($sm->p3 != null || $sm->p4 != null || $sm->p5 != null || $sm->p6 != null) {
                        $level = 2;
                    }
                }
            }

            if ($level == 2) {
                if ($sm->p3 != null && $sm->p4 != null && $sm->p5 != null && $sm->p6 != null) {
                    if ($sm->p7 != null || $sm->p8 != null || $sm->p9 != null || $sm->p10 != null ||
                        $sm->p11 != null || $sm->p12 != null || $sm->p13 != null || $sm->p14 != null
                    ) {
                        $level = 3;

                    }
                }
            }


            for ($i = 1; $i <= 14; $i++) {
                $pos = 'p' . $i;

                if ($sm->$pos != null) {
                    $count++;
                }
            }

            if ($count == 14) {
                return ['level' => $level, 'completed' => true];
            }
        }


        return ['level' => $level, 'completed' => false];

    }

    protected function update_stage($stage, $level)
    {
        $updated_stage = User::where('username', auth()->user()->username)
            ->update([
                'stage' => $stage,
                'level' => $level
            ]);

        return;
    }

    public function reset_stage_matrices()
    {
        $stage_matrices = StageMatrix::where('stage', '>', 0)->get();
        if ($stage_matrices)
        {
//            dd($stage_matrices);
            foreach ($stage_matrices as $stage_matrix) {
                for ($i=1; $i<=14; $i++)
                {
                    $pos = "p".$i;

                    if ($stage_matrix->$pos == null)
                    {
                        continue;
                    }else{
                        $stage_matrix->$pos = null;
                    }
                }

                $stage_matrix->save();
            }
        }

        return "DONE";
    }

    public function reset_stage_matrix($username)
    {
        $stage_matrix = StageMatrix::where('username', $username)
            ->where('stage', 1)->first();
        if ($stage_matrix)
        {
            for ($i = 1; $i <= 14; $i++) {
                $pos = "p" . $i;

                if ($stage_matrix->$pos == null)
                {
                    continue;
                }else{
                    $stage_matrix->$pos = null;
                }
            }

            $stage_matrix->save();
        }

        return "DONE";
    }

//    StageMatrixController ends here
}
