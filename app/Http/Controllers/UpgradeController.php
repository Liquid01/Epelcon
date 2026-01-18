<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Stockist;
use App\Upgrade;
use App\User;
use Illuminate\Http\Request;

class UpgradeController extends Controller
{
    //


    public function log_upgrade(User $user, $old_package, $new_package)
    {

        $upgrade = new Upgrade([
            'user_id'=> $user->id,
            'old_package'=> $old_package,
            'new_package'=> $new_package,
            'by'=> app('current_user')->id,
        ]);

        $upgrade->save();

        return true;

    }
}
