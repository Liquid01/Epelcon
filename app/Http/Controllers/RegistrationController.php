<?php

namespace App\Http\Controllers;

use App\Bank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    //

    public function register_with_referal(Request $request, $sponsor_username)
    {
        $banks = Bank::all();
        $sponsoring_user = User::where('username', $sponsor_username)->first();

        $this->logout($request);

        return view('auth.registerWithReferral', compact('sponsor_username', 'banks', 'sponsoring_user'));
    }

    public function home_register(Request $request)
    {
        $banks = Bank::all();
        return view('index', compact('banks'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return;
    }
}
