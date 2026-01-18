<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //

    public  function __construct()
    {
        $this->middleware(['auth', 'stockist']);
    }


    public  function index()
    {
        return view('sell.index');
    }

    public  function stockist_dashboard()
    {

        return view('sell.back_office');
    }

    public  function stockist_store($username)
    {
        $products = Product::where('created_by', $username)->get();
        $user = $this->get_user_by_username($username);

        return view('stockists.store.create', compact('user', 'products'));
    }

    public  function my_store($username)
    {
        $products = Product::where('created_by', $username)->get();
        $user = $this->get_user_by_username($username);

        return view('shop.stockist_store', compact('user', 'products'));
    }
}
