<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;

class DownlineController extends Controller
{

    public function __controller()
    {
        $this->middleware(['auth', 'member']);
    }
    //
    private $downline_count = 0;



    public function get_downline_count()
    {
        $username = app('current_user')->username;
        $count = $this->dl_count([$username], $count = 0)-1;
        return response()->json(["count" => $count]);
    }

    public function dl_count($downlines, $count)
    {


        $next_dls = array();

        if (count($downlines) > 0) {
            foreach ($downlines as $downline) {

                if ($downline != null) {
                    $this->downline_count++;
                    $count++;

//                    echo "**************** i am " . $downline . " and count = " . $count . " -*******";

                    $next_d = $this->get_next_dls($downline);
//                    dd($next_d);

                    foreach ($next_d as $d) {
                        if ($d != null) {
                            array_push($next_dls, $d);

                        }


//                        dd($next_d);
                    }
//                    dd($next_dls);


                } else {
                    continue;
                }
            }
            $this->dl_count($next_dls, $count);


        } else {
            return $count;
        }


//       echo $count;

        return $this->downline_count;
    }

    public function get_next_dls($username)
    {
        $user = User::where('username', $username)->first();

        if ($user) {
            $p1 = $user->left_index;
            $p2 = $user->right_index;
            $dl = ["p1" => $p1, "p2" => $p2];

            return $dl;
        }

        return null;
    }


}
