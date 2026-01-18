<?php

namespace App\Http\Controllers\Admin;

use App\Matrix;
use App\StageMatrix;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatrixController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create_stage_matrix($username)
    {
        $matrix = new StageMatrix([
            'username' => $username,
//            'SDB' => config('app.feeder_sdb')
        ]);

//        dd($matrix);

        $matrix->save();
        return $matrix;
    }


//    getting stage matrix

    public function get_stage_matrix()
    {
        if (auth()->user()->stage < 1) {
            $stage_matrix = Matrix::where('username', app('current_user')->username)->first();
//            dd($stage_matrix);
            return view('genealogy.feeder_matrix', compact('stage_matrix'));
        }

        if (auth()->user()->stage > 0) {
            $stage_matrix = StageMatrix::where('username', app('current_user')->username)->first();

            if ($stage_matrix == null) {
                $stage_matrix = $this->create_stage_matrix(app('current_user')->username);
            }
            return view('genealogy.matrix', compact('stage_matrix'));
        }

        return null;
    }


//    creating feeder matrix
    public function create_matrix($username)
    {
        $matrix = new Matrix([
            'username' => $username,
            'SDB' => config('app.feeder_sdb')
        ]);

//        dd($matrix);

        $matrix->save();
        return;
    }


//    CHECKING USERS FEEDER MATRIX ajax if in stage 0
    public function check_feeder_matrix()
    {
        $user = app('current_user');
        $username = $user->username;
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

            return response()->json(["stage" => $current_stage, "level" => $current_level]);
        }

//        if the user has on the right but not on the left;

        if ($matrix->p1 == null && $matrix->p2 != null) {
            $current_stage = 0;
            $current_level = 1;

            $level1 = $this->check_level_2($matrix->p2);
            if ($matrix->p5 == null) {
                if ($level1['p5'] != null) {
                    $matrix->p5 = $level1['p5'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p5." JOINING_YOUR_FEEDER_MATRIX", $current_stage);
                }
            }

            if ($matrix->p6 == null) {
                if ($level1['p6'] != null) {
                    $matrix->p6 = $level1['p6'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p6." JOINING_YOUR_FEEDER_MATRIX", $current_stage);
                }
            }

            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();

        }


//        if user has on the left but not on the right

        if ($matrix->p1 != null && $matrix->p2 == null) {
            $current_stage = 0;
            $current_level = 1;

            $level1 = $this->check_level_1($matrix->p1);
            if ($matrix->p3 == null) {
                if ($level1['p3'] != null) {
                    $matrix->p3 = $level1['p3'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p3." JOINING_FEEDER_MATRIX", $current_stage);
                }
            }

            if ($matrix->p4 == null) {
//                dd('hi2');
                if ($level1['p4'] != null) {
                    $matrix->p4 = $level1['p4'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p5." JOINING_FEEDER_MATRIX", $current_stage);
                }
            }
            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();
        }

//        if user has both legs (left and right) filled

        if ($matrix->p1 != null && $matrix->p2 != null) {

            $current_stage = 0;
            $current_level = 1;

            if ($matrix->p3 != null || $matrix->p4 != null || $matrix->p5 != null || $matrix->p6 != null) {
                $current_level = 2;
            }

            if (($matrix->p3 && $matrix->p4 && $matrix->p5 && $matrix->p6)) {
                $current_stage = 1;
                $current_level = 0;
            }

            $level1 = $this->check_level_1($matrix->p1);
//            dd($level1);
            if ($matrix->p3 == null) {
                if ($level1['p3'] != null) {
                    $matrix->p3 = $level1['p3'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p3." JOINING_FEEDER_MATRIX", $current_stage);
                }
            }

            if ($matrix->p4 == null) {

                if ($level1['p4'] != null) {

                    $matrix->p4 = $level1['p4'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p4." JOINING_FEEDER_MATRIX", $current_stage);
                }
            }

            $level2 = $this->check_level_2($matrix->p2);


            if ($matrix->p5 == null) {
//                dd($matrix->p5);
                if ($level2['p5'] != null) {

                    $matrix->p5 = $level2['p5'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p5." JOINING_FEEDER_MATRIX", $current_stage);
                }
            }

            if ($matrix->p6 == null) {
                if ($level2['p6'] != null) {
                    $matrix->p6 = $level2['p6'];
                    $matrix->save();
                    $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p6." JOINING_FEEDER_MATRIX", $current_stage);
                }
            }

            $user->stage = $current_stage;
            $user->level = $current_level;

            $user->save();

        }


        $completed = $this->check_if_feeder_complete($current_stage, $current_level, $username);

        if ($completed != null) {
            $user->stage = $completed->stage;
            $user->level = $completed->level;
            $user->save();
            return response()->json(["stage" => $user->stage, "level" => $user->level]);
        }

        return response()->json(["stage" => $current_stage, "level" => $current_level]);

    }

    public function update_all_feeders()
    {
        $members = User::where('stage', 0)
            ->orderBy('created_at', 'ASC')->get();

//        dd($members[0]->username);

        foreach ($members as $user)
        {
            $username = $user->username;
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

//                return response()->json(["stage" => $current_stage, "level" => $current_level]);
                continue;
            }

//        if the user has on the right but not on the left;

            if ($matrix->p1 == null && $matrix->p2 != null) {
                $current_stage = 0;
                $current_level = 1;

                $level1 = $this->check_level_2($matrix->p2);
                if ($matrix->p5 == null) {
                    if ($level1['p5'] != null) {
                        $matrix->p5 = $level1['p5'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p5." JOINING_YOUR_FEEDER_MATRIX", $current_stage);
                    }
                }

                if ($matrix->p6 == null) {
                    if ($level1['p6'] != null) {
                        $matrix->p6 = $level1['p6'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p6." JOINING_YOUR_FEEDER_MATRIX", $current_stage);
                    }
                }

                $user->stage = $current_stage;
                $user->level = $current_level;

                $user->save();

            }


//        if user has on the left but not on the right

            if ($matrix->p1 != null && $matrix->p2 == null) {
                $current_stage = 0;
                $current_level = 1;

                $level1 = $this->check_level_1($matrix->p1);
                if ($matrix->p3 == null) {
                    if ($level1['p3'] != null) {
                        $matrix->p3 = $level1['p3'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p3." JOINING_FEEDER_MATRIX", $current_stage);
                    }
                }

                if ($matrix->p4 == null) {
//                dd('hi2');
                    if ($level1['p4'] != null) {
                        $matrix->p4 = $level1['p4'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p5." JOINING_FEEDER_MATRIX", $current_stage);
                    }
                }
                $user->stage = $current_stage;
                $user->level = $current_level;

                $user->save();
            }

//        if user has both legs (left and right) filled

            if ($matrix->p1 != null && $matrix->p2 != null) {

                $current_stage = 0;
                $current_level = 1;

                if ($matrix->p3 != null || $matrix->p4 != null || $matrix->p5 != null || $matrix->p6 != null) {
                    $current_level = 2;
                }

                if (($matrix->p3 && $matrix->p4 && $matrix->p5 && $matrix->p6)) {
                    $current_stage = 1;
                    $current_level = 0;
                }

                $level1 = $this->check_level_1($matrix->p1);
//            dd($level1);
                if ($matrix->p3 == null) {
                    if ($level1['p3'] != null) {
                        $matrix->p3 = $level1['p3'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p3." JOINING_FEEDER_MATRIX", $current_stage);
                    }
                }

                if ($matrix->p4 == null) {

                    if ($level1['p4'] != null) {

                        $matrix->p4 = $level1['p4'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p4." JOINING_FEEDER_MATRIX", $current_stage);
                    }
                }

                $level2 = $this->check_level_2($matrix->p2);


                if ($matrix->p5 == null) {
//                dd($matrix->p5);
                    if ($level2['p5'] != null) {

                        $matrix->p5 = $level2['p5'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p5." JOINING_FEEDER_MATRIX", $current_stage);
                    }
                }

                if ($matrix->p6 == null) {
                    if ($level2['p6'] != null) {
                        $matrix->p6 = $level2['p6'];
                        $matrix->save();
                        $credit = $this->credit_account(config("app.feeder_sdb"), $user, config('app.credit'), $matrix->p6." JOINING_FEEDER_MATRIX", $current_stage);
                    }
                }

                $user->stage = $current_stage;
                $user->level = $current_level;

                $user->save();

            }


            $completed = $this->check_if_feeder_complete($current_stage, $current_level, $username);

            if ($completed != null) {

                $user->stage = $completed->stage;
                $user->level = $completed->level;
                $user->save();
            }


        }
//        $user = app('current_user');


        return "matrix update done done";

    }


    public function check_level_1($username)
    {
        $matrix = Matrix::where('username', $username)->first();
//        dd($matrix);
        if ($matrix->p1 != null && $matrix->p2 != null) {
            return ["p3" => $matrix->p1, "p4" => $matrix->p2];
        } elseif ($matrix->p1 != null && $matrix->p2 == null) {
            return ["p3" => $matrix->p1, "p4" => null];
        } elseif ($matrix->p1 == null && $matrix->p2 != null) {
            return ["p3" => null, "p4" => $matrix->p2];
        } elseif ($matrix->p1 == null && $matrix->p2 == null) {
            return ["p3" => null, "p4" => null];
        }

        return null;

    }

    public function check_level_2($username)
    {
        $matrix = Matrix::where('username', $username)->first();
//        dd($matrix);
        if ($matrix->p1 != null && $matrix->p2 != null) {
            return ["p5" => $matrix->p1, "p6" => $matrix->p2];
        } elseif ($matrix->p1 != null && $matrix->p2 == null) {
            return ["p5" => $matrix->p1, "p6" => null];
        } elseif ($matrix->p1 == null && $matrix->p2 != null) {
            return ["p5" => null, "p6" => $matrix->p2];
        } elseif ($matrix->p1 == null && $matrix->p2 == null) {
            return ["p5" => null, "p6" => null];
        }

        return null;

    }


//    public function credit_account($amount, $user)
//    {
////        dd($user);
//        $account = user_reward::where('membership_id', $user->membership_id)->first();
//
//        $account->shopping += $amount;
//        $account->save();
//
////        dd($amount);
//
//        return;
//    }

    public function credit_account($amount, $user, $type, $for, $stage)
    {

        $tc = new TransactionController();
        $tc->credit_account($user, $amount, $type, $for, $stage);

        //@TODO Log the transaction and notify the user

        return;
    }

//    OTHERS


//    get members first downlines
    public function user_downline_tree($username)
    {
        $first_downlines = null;

        $user = User::where('username', $username)->first();
        if ($user)
        {
            $p1 = $user->left_index;
            $p2 = $user->right_index;
            $dl = ["p1"=>$p1, "p2"=>$p2];


            if ($p1 != null)
            {
                $dl2 = $this->get_next_dls($p1);

                $p3 = $dl2[0];
                $p4 = $dl2[1];
            }else{
                $p3 = null;
                $p4 = null;
            }

            if ($p2 != null)
            {
                $dl3 = $this->get_next_dls($p2);
                $p5 = $dl3[0];
                $p6 =$dl3[1];
            }else{
                $p5 = null;
                $p6 = null;
            }

            $downlines = array("p1"=>$p1, "p2"=>$p2, "p3"=>$p3, "p4"=>$p4, "p5"=>$p5, "p6"=>$p6);
        }

        $first_d = json_encode($downlines) ;
        $first_downlines= json_decode($first_d);


        return view('genealogy.downlinetree', compact('first_downlines', 'username'));


    }

//    GET NEXT DOWNLINES
    public function get_next_dls($username)
    {
        $user = User::where('username', $username)->first();

        if ($user)
        {
            $p1 = $user->left_index;
            $p2 = $user->right_index;
            $dl = [$p1, $p2];

            return $dl;
        }

        return null;
    }

//checking if user has finished feeder stage
    protected function check_if_feeder_complete($current_stage, $current_level, $username)
    {
        if ($current_stage == 0) {
            $matrix = Matrix::where('username', $username)->first();

            $completed = false;
            $stage_completed = Array();
            for ($i = 1; $i <= 6; $i++) {
                $position = "p" . $i;
                if ($matrix->$position != null) {
                    array_push($stage_completed, $matrix->$position);
                }
            }

            if (count($stage_completed) == 6) {
                $stage = $current_stage + 1;
                $level = 0;
                $this->update_stage($stage, $level, $username);
                $stage_matrix = new StageMatrixController();
                $created_matrix = $stage_matrix->create($username, $stage);
                $completed = true;
                return ["stage" => $stage, "level" => $level];
            } else {
                return null;
            }

        }

        return ["stage" => $current_stage, "level" => $current_level];
    }


    protected function update_stage($stage, $level, $username)
    {
        $updated_stage = User::where('username', auth()->user()->username)
            ->update([
                'stage' => $stage,
                'level' => $level
            ]);

        return;
    }

    public function check_member_matrix($username)
    {
        $user = User::where('username', $username)->first();
        if ($user) {
            if ($user->stage < 1) {
                $stage_matrix = Matrix::where('username', $username)->first();
//            dd($stage_matrix);
                return view('admin.genealogy.feeder_matrix', compact('stage_matrix','user'));
            } elseif ($user->stage > 0) {
                $stage_matrix = StageMatrix::where('username', $username)->first();

                return view('admin.genealogy.matrix', compact('stage_matrix', 'user'));
            }else{
                return null;
            }
        }else{
            return redirect()->back(404)->with('fail', 'User Matrix not found');
        }

    }
}
