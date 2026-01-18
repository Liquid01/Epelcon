<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\user_reward;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Psy\Util\Json;

class ShoppingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'members'], ['except' => ['shop', 'addToCart', 'clearCart', 'cartDetails', 'cart_remove_item', 'category_products', 'clear_basket', 'cartUpdate', 'cartContent']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function members_shop()
    {
        $products = Product::all();
        $cartItems = Cart::content();
        $categories = Category::all();

        return view('shop/guestshop', compact('products', 'cartItems', 'categories'));
    }

    public function admin_shop()
    {
        return view('shop/products');

    }


    public function shop()
    {

        $products = Product::all();
        $cartItems = Cart::content();
        $categories = Category::all();

        return view('shop/guestshop', compact('products', 'cartItems', 'categories'));

    }


    public function category_products($category)
    {

        $products = Product::where('category_id', $category)->get();
        $cartItems = Cart::content();
        $categories = Category::all();

        return view('shop/guestshop', compact('products', 'cartItems', 'categories'));

    }


    //    adding selected products to session

    public function addToCart(Request $request)
    {
        $request->validate([
            'quantity' => 'integer'
        ]);

        $product = Product::where('id', $request->productId)->first();
//        dd($product);
        $productId = $request->productId;
        $productName = $request->name;
        $productPrice = $product->sales_price;
        $quantity = $request->quantity;
        $image = $request->image;


        $added = Cart::add(['id' => $productId, 'name' => $productName, 'qty' => $quantity, 'weight' => 0, 'price' => $productPrice, 'options' => ['image' => $image]]);

//        dd($added);

        if ($added !== null) {
            $cartItems = $this->cartContent();
        }


        return view('shop.cartItems', compact('cartItems'))->with('success', $added->name . ' added successfully');
    }

    public function cartDetails(Request $request)
    {
        $cartItems = $this->cartContent();

//        dd($cartItems);

        return view('shop.cart', compact('cartItems'));
    }

    public function clearCart()
    {
        $products = Product::all();
        $cartItems = $this->cartContent();
        $categories = Category::all();
        $destroyed = Cart::destroy();

//        dd($all);
        return view('shop.guestshop', compact('products', 'categories', 'cartItems'))->with('success', 'Cart Cleared successfully');
    }

    public function clear_basket()
    {
        $cartItems = Cart::destroy();

//        dd($all);
        return view('shop.cartItems');
    }

    public function checkout()
    {
        $cartItems = $this->cartContent();

//        $countries = Countries::all()->pluck('name.common');

//        $states = Countries::where('name.common', 'Nigeria')
//            ->first()
//            ->states
//            ->sortBy('name')
//            ->pluck('name');
//
//        $collectionCenters = Store::where('country', 'Nigeria')
//            ->orderBy('name', 'asc')->get();
////        dd($collectionCenters);
//
//        if ($states !== null)
//        {
//            return view('shop.checkout', compact('countries', 'states', 'collectionCenters', 'cartItems'));
//        }else{
//            $states = null;
//            return view('shop.checkout', compact('countries', 'states', 'collectionCenters', 'cartItems'));
//
//        }

        return view('shop.checkout', compact('cartItems'));


    }

    public function member_checkout()
    {
        $cartItems = $this->cartContent();

//        $countries = Countries::all()->pluck('name.common');

//        $states = Countries::where('name.common', 'Nigeria')
//            ->first()
//            ->states
//            ->sortBy('name')
//            ->pluck('name');
//
//        $collectionCenters = Store::where('country', 'Nigeria')
//            ->orderBy('name', 'asc')->get();
////        dd($collectionCenters);
//
//        if ($states !== null)
//        {
//            return view('shop.checkout', compact('countries', 'states', 'collectionCenters', 'cartItems'));
//        }else{
//            $states = null;
//            return view('shop.checkout', compact('countries', 'states', 'collectionCenters', 'cartItems'));
//
//        }

        return view('shop.checkout', compact('cartItems'));


    }

    public function place_collection_order(Request $request)
    {
        $center = $request->collection_center;
//        switch ($center){
//            case 0:
//                $center = "Abuja";
//                    break;
//            case 1:
//                $center = "KANO";
//                    break;
//            case 2:
//                $center = "PH";
//                    break;
//            case 3:
//                $center = "ONITSHA";
//                    break;
//            case 4:
//                $center = "Calabar";
//                    break;
//
//        }
//        dd($center);
        $delivery_address = $delivery_address = $center . " Collection Center";
        $user_balance = user_reward::where('membership_id', auth()->user()->membership_id)->first();
        $cart_total = str_replace(',', '', Cart::subtotal());

        $shoppable_balance = $user_balance->shopping;
//        dd($shoppable_balance);

        if ($shoppable_balance < $cart_total) {
            $cash_balance = $user_balance->cash;
            $shoppable_balance += $cash_balance;


            if ($shoppable_balance < $cart_total) {
                return redirect()->back()->with('fail', 'INSUFFICIENT BALANCE:  ' . ' Your Total Balance = $' . $shoppable_balance);
            } else {
                $cart_items = $this->cartContent();


                $json_items = Json::encode($cart_items);
//    dd($json_items);
                $order_controller = new OrderController();
                $order = $order_controller->place_order(app('current_user')->username, $json_items, $cart_total, $delivery_address);

                if ($order) {

                    $deduct = $cart_total - $user_balance->shopping;
                    $user_balance->shopping = 0;

                    $user_balance->cash = $shoppable_balance - $cart_total;

                    $user_balance->save();
                    $destroyed = Cart::destroy();
                    return redirect()->back()->with('success', 'ORDER Placed Successfully');
                }


            }
        } else {
            $cart_items = $this->cartContent();

            $json_items = Json::encode($cart_items);

//    dd($json_items);
            $order_controller = new OrderController();
            $order = $order_controller->place_order(auth()->user()->username, $json_items, $cart_total, $delivery_address);

            if ($order) {
                $user_balance->shopping = $shoppable_balance - $cart_total;

                $user_balance->save();
                $destroyed = Cart::destroy();
                return view('orders.placed')->with('success', 'ORDER Placed Successfully');
            }
        }

        return null;
    }


    public function place_delivery_order(Request $request)
    {

        $delivery_address = $request->address1 . ' ' . $request->address2;
        $user_balance = user_reward::where('membership_id', auth()->user()->membership_id)->first();
        $cart_total = str_replace(',', '', Cart::subtotal());

        $shoppable_balance = $user_balance->shopping;
//        dd($shoppable_balance);

        if ($shoppable_balance < $cart_total) {
            $cash_balance = $user_balance->cash;
            $shoppable_balance += $cash_balance;


            if ($shoppable_balance < $cart_total) {
                return redirect()->back()->with('fail', 'INSUFFICIENT BALANCE:  ' . ' Your Total Balance = ' . $shoppable_balance);
            } else {
                $cart_items = $this->cartContent();

                $json_items = Json::encode($cart_items);
                $delivery_address = $request->address1 . ' ' . $request->address2;
//    dd($json_items);
                $order_controller = new OrderController();
                $order = $order_controller->place_order(auth()->user()->username, $json_items, $cart_total, $delivery_address);

                if ($order) {
                    $user_balance->shopping = 0;
                    $user_balance->cash = $shoppable_balance - $cart_total;

                    $user_balance->save();
                    $destroyed = Cart::destroy();
                    return redirect()->back()->with('success', 'ORDER Placed Successfully');
                }
            }
        } else {
            $cart_items = $this->cartContent();

            $json_items = Json::encode($cart_items);
//    dd($json_items);
            $order_controller = new OrderController();
            $order = $order_controller->place_order(auth()->user()->username, $json_items, $cart_total, $delivery_address);

            if ($order) {
                $user_balance->shopping = $shoppable_balance - $cart_total;

                $user_balance->save();
                $destroyed = Cart::destroy();
                return redirect()->back()->with('success', 'ORDER Placed Successfully');
            }
        }
    }


    public function saveOrder(Request $request)
    {
        $formDetails = json_decode($request->details, true);

//        dd($formDetails['state']);

        $orderDetails = $this->cartContent();

        $cartTotal = Cart::subtotal();
        $cartContent = str_replace(",", "", $cartTotal);

        $order = new Order([
            'membership_id' => str_random(10),
            'collection_center_id' => $formDetails['collectionCenter'],
            'country' => $formDetails['collectionCountry'],
            'state' => $formDetails['state'],
            'team' => $formDetails['leader'],
            'created_by' => Auth::user()->id,
            'amount' => $cartContent,
        ]);

        $order->save();

        foreach ($orderDetails as $item) {
            $orderedItems = new OrderedItems([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'unit_price' => $item->price,
                'amount' => $item->price * $item->qty
            ]);

            $orderedItems->save();
        }


        return response()->json(["success" => "successful",
            "message" => "Order placed Successfully"]);

    }

    public function member_remove_item(Request $request)
    {
        $cartItems = Cart::content();
        $item_id = $request->id;
//        dd($cartItems);
        Cart::remove($item_id);


        return view('shop.checkoutItems', compact('cartItems'));
    }

    public function cart_remove_item(Request $request)
    {
        $cartItems = Cart::content();
        $item_id = $request->id;
//        dd($cartItems);
        Cart::remove($item_id);


        return view('shop.checkoutItems', compact('cartItems'));
    }

    public function cartContent()
    {
        $all = Cart::content();

        return $all;
    }

    public function cartUpdate(Request $request)
    {
        // Validation on max quantity
//        $validator = Validator::make($request->all(), [
//            'quantity' => 'required|numeric'
//        ]);
//
//        if ($validator->fails()) {
//            session()->flash('error_message', 'error');
//            return response()->json(['success' => false]);
//        }

        Cart::update($request->id, $request->quantity);
        $total = Cart::total();
//        session()->flash('success', 'Quantity was updated successfully!');

        return view('shop.load')->with('success', 'Quantity updated');

    }

    public function deduct_balance($total_order)
    {
//        $user_balance = user_reward::where('membership_id', auth()->user()->membership_id)->first();
//
//        if ($total_order > $user_balance->shopping)

        //if not

        //remove all and deduct fromm total
        //remove the rest from cash

//        save cash and save shopping
    }


}
