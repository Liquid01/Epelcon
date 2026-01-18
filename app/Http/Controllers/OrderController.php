<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    function __construct()
    {
        return $this->middleware(['auth', 'members']);
    }

    public function place_order($username, $items, $amount, $delivery_address)
    {
        $order = new Order([
           'owner' => $username,
            'items' => $items,
            'amount' => $amount,
            'delivery_address' => $delivery_address
        ]);

        $order->save();
        if ($order)
        {
            return true;
        }

        return false;
    }


    public function all_orders()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }


    public function member_orders()
    {
        $orders = Order::where('owner', auth()->user()->username)->get();
//        dd(auth()->user()->membership_id);

        return view('orders.index', compact('orders'));
    }

    public function stockist_orders(User $stockist)
    {

    }

}
