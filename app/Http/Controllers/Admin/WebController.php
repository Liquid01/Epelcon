<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test_lock()
    {
        return view('errors.419');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {

        return view('about');
    }

    public function shop()
    {

        return view('shop/products');
    }

    public function compensation()
    {
        return view('compensation');
    }

    public function blog()
    {
        return view('comingsoon');
    }

    public function contact()
    {
        return view('contact');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function buypin()
    {
        return view('buypin');
    }

    public function pay()
    {
        return view('payment.new_pay');
    }

    public function pay_new_investment()
    {
        return view('payment.new_investment');
    }

    public function donate()
    {
        return view('donate');
    }

    public function signin()
    {
        return view('auth.login');
    }

    public function foundation()
    {
        return view('comingsoon');
    }

    public function events()
    {
        return view('events.index');
    }

    public function learn()
    {
        return view('learn.index');
    }

    public function sell()
    {
        return view('sell.index');
    }

    public function adverts()
    {
        return view('adverts.index');
    }

    public function jobs()
    {
        return view('jobs.index');
    }

    public function subscribe_data()
    {
        return view('subscriptions.data');
    }

    public function buy_airtime()
    {
        return view('subscriptions.airtime');
    }

    public function careers()
    {
        return view('careers');
    }

    public function post_feedback(Request $request)
    {
        $request->validate([

        ]);
        return view('index');
    }



}
