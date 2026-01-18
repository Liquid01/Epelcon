<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Sale;
use App\User;
use App\user_reward;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }


    public function index()
    {
        $sales = Sale::all();
        return view('admin.sales.index', compact('sales'));
    }


    public function sell()
    {
        $products = Product::all();

        return view('admin.sales.sell', compact('products'));
    }


    public function save_sale(Request $request)
    {
//        dd($request);
        $request->validate([
            'customer' => 'required|string|exists:users,username',
            'product' => 'integer|required',
            'payment' => 'integer|required',
            'quantity' => 'integer|min:1',
        ]);

        $payment = $request->payment;
        $product_id = $request->product;
        $product = Product::where('id', $product_id)->first();
//        dd($product );
        $user = User::where('username', $request->customer)->first();
        $order_controller = new  \App\Http\Controllers\OrderController();
        $amount = $request->quantity * $product->sales_price;
        $pvs = $product->pvs * $request->quantity;
//        dd($pvs);

        $sale = new Sale([
            'user_id' => $user->id,
            'product_id' => $request->product,
            'quantity' => $request->quantity,
            'amount' => $amount,
            'payment' => $payment,
            'order_by' => auth()->user()->id,
        ]);
        $sale->save();

        if ($payment == 2){
            $user_reward = user_reward::where('membership_id', $user->membership_id)->first();
//        dd($user_reward);
            if ($user_reward) {
                $user_reward->cash -= $amount;
                $user_reward->save();
            }
        }

        $order = $order_controller->place_order($request->customer, $product->name, $amount, 'Lagos Office');

        $account_controller = new \App\Http\Controllers\AccountController();
        $account_controller->credit_pvs($user, $pvs);
        return redirect()->route('admin_sales')->with('success', 'sales successful');
    }

    public function member_sell()
    {

        return view('sell.back_office');
    }

    public function deliver_sale(Sale $sale)
    {
        $sale->status = 3;

        $sale->save();

//        dd($sale);

        return redirect()->route('admin_sales')->with('success', 'Sale Updated Successfully');
    }
}
