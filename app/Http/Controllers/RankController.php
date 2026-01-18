<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RankController extends Controller
{
    //

    public  function update_rank()
    {
        $members = User::where('is_admin', 0)->distinct('username')->get();

        dd($members);
    }
}
