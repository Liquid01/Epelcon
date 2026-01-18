<?php

namespace App\Http\Controllers;

use App\Order;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StockistController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['stockist', 'auth'], ['except'=>['all_stockists']]);
    }

    public function all_stockists()
    {
        $stores = Store::all();
//        dd($stockists);
        return view('stockists.list', compact('stores'));
    }


    public  function stockist_dashboard()
    {
//        dd(app('current_user')->username);
        $balance = app('current_user')->rewards->stockist;
//        dd($balance);
        return view('stockists.back_office', compact('balance'));
    }
    public function stockist_orders()
    {
        $orders = Order::where('stockist_id', app('current_user')->id)->get();
        return view('stockists.orders.index', compact('orders'));
    }

    public function stockist_sales()
    {
        $orders = Order::where('stockist_id', app('current_user')->id)->get();
        return view('stockists.sales.index', compact('orders'));
    }

    public function stockist_shop(Store $store)
    {
        return view('stockists/shop', compact('store'));
    }


}
