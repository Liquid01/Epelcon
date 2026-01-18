<?php

namespace App\Http\Controllers\Admin;
use App\Savings;
use App\SavingsType;
use Illuminate\Http\Request;
use Mockery\Exception;

class SavingsController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth', 'members']);
    }

    //

    public  function index()
    {
        $savings_type = SavingsType::all();
        $savings = Savings::where('username', app('current_user')->username)->get();
        return view('savings.index', compact('savings', 'savings_type'));
    }

    public  function new_savings_account()
    {
        $savings_type = SavingsType::all();
        $savings = Savings::where('username', app('current_user')->username)->get();
        return view('savings.new_savings', compact('savings', 'savings_type'));
    }

    public function store_savings_account(Request $request)
    {
        $request->validate([
            'plan_name' => 'string|required',
            'plan_type' => 'integer|required',
            'plan_duration' => 'integer|required',
            'plan_amount' => 'required',
        ]);

        $duration = $request->plan_duration;
        $planType = $request->plan_type;
        $planName = $request->plan_name;
        $basePercent = 5;
        $amount = $request->plan_amount;

        switch ($duration)
        {
            case $duration = 1:
                $percentageInterest = $basePercent * $duration;
                break;
            case $duration = 2:
                $percentageInterest = 8;
                break;
            case $duration = 3:
                $percentageInterest = 12;
                break;
            default:
                $percentageInterest = 5;
        }

        $interest = $amount * ($percentageInterest/100);

        $new_savings = New Savings([
            'username' => app('current_user')->username,
            'plan_name' => $planName,
            'type' => $planType,
            'duration' => $duration,
            'amount' => $amount,
            'interest' => $interest,
            'due_date' => now()->addMonths($duration),
        ]);

        try{
            $new_savings->save();

            return redirect()->back()->with('success', "Your ". strtoupper($planName) . " Savings was created Successfully. Enjoy a wonderful saving experience");
        }catch (Exception $exception)
        {
            return redirect()->back()->with('fail', "Your ". $planName . "Savings was NOT created". $exception->getMessage(). "try again later");

        }


    }
}
