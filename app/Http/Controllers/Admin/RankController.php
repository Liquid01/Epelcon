<?php

namespace App\Http\Controllers\Admin;

use App\Rank;
use App\User;
use Illuminate\Http\Request;

class RankController extends Controller
{
    //


    public  function members_rank()
    {
        $members = User::where('is_admin', 0)->distinct('username')->get();
        foreach ($members as $member)
        {
            $dlc = new \App\Http\Controllers\DownlineController();

            $pvs = $dlc->get_pvs($member);

            $apvs = json_decode($pvs->content(), true);

            $rank = $this->check_member_rank($apvs['left_pvs'], $apvs['right_pvs']);

//            dd($rank);

            if ($rank)
            {
                $uuser = $this->update_rank($member, $rank->id);
            }else{
                $uuser = $this->update_rank($member, 0);
            }



            echo 'NAME: '.$uuser->username. ' RANK: '. $uuser->stage. '<br> <br>';

        }

        return 'done';
    }

    public function check_member_rank($left_pvs, $right_pvs)
    {
        if ($left_pvs >= 700000 && $right_pvs >= 700000)
        {
            $new_rank = Rank::where('id', 7)->first();

            return $new_rank;
        }

        if ($left_pvs >= 300000 && $right_pvs >= 300000)
        {
            $new_rank = Rank::where('id', 6)->first();
            return $new_rank;
        }

        if ($left_pvs >= 85000 && $right_pvs >= 85000)
        {
            $new_rank = Rank::where('id', 5)->first();
            return $new_rank;
        }

        if ($left_pvs >= 30000 && $right_pvs >= 30000)
        {
            $new_rank = Rank::where('id', 4)->first();
            return $new_rank;
        }

        if ($left_pvs >= 15000 && $right_pvs >= 15000)
        {
            $new_rank = Rank::where('id', 3)->first();
            return $new_rank;
        }

        if ($left_pvs >= 6000 && $right_pvs >= 6000)
        {
            $new_rank = Rank::where('id', 2)->first();
            return $new_rank;
        }

        if ($left_pvs >= 3000 && $right_pvs >= 3000)
        {
            $new_rank = Rank::where('id', 1)->first();
            return $new_rank;
        }

        return null;
    }

    public function update_rank(User $user, $rank)
    {
        $user->stage = $rank;
        $user->save();

        return $user;

    }

}
