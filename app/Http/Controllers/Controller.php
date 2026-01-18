<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_user_by_username($username)
    {
        return User::where('username', $username)->first();

    }

    public function get_user_by_membership_id($membership_id)
    {
        return User::where('membership_id', $membership_id)->first();

    }
}
