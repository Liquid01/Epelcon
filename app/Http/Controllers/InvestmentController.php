<?php

namespace App\Http\Controllers;

use App\investment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mockery\Exception;

class InvestmentController extends Controller
{

    function __construct()
    {
        return $this->middleware(['auth', 'members']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function my_investments()
    {
        $investments = investment::where('membership_id', auth()->user()->membership_id)->get();

        return view('investments.investments', compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_new_investment(Request $request)
    {
        $request->validate([
            'plan_amount'=> 'required',
            'plan_duration'=> 'required:integer'
        ]);

        $new_investment = new investment([
            'membership_id' =>app('current_user')->membership_id,
            'paid_from' => 'Deposit',
            'duration' => $request->plan_duration,
            'amount' => $request->plan_amount,
            'due_date' => now()->addMonths($request->plan_duration), //TODO change DB ti timestasmp

        ]);

//        dd($new_investment);

        try{
            $new_investment->save();
        }catch (Exception $exception)
        {
            return redirect()->back()->with('fail', 'Investment could not be saved, Please try again later');
        }



        return redirect()->back()->with('success', 'Investment Account Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(investment $investment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy(investment $investment)
    {
        //
    }
}
