<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use function GuzzleHttp\Psr7\str;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
//use Intervention\Image;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','members']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function my_products()
    {
        $current_user = app('current_user');
//        dd($current_user);
        $products = Product::where('created_by', $current_user->username)->get();
//        dd($products);

        return view('products.seller_products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    public function new_product()
    {
        return view('products.new_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_product(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'sales_price' => 'required',
            'image' => 'required',
            'description' => 'required|string',
        ]);

        If($request->hasFile('image')) {
//            dd($request->file);

            $file = $request->file('image');

            $destinationPath = 'assets/img/products/bigProductImage';
            $filename = time() . '-' . $file->getClientOriginalName();
            $thumbPath = 'assets/img/products/productThumbImage/' . $filename;
            Image::make($file->getRealPath())->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath);

            $file->move($destinationPath, $filename);

            $product = new Product([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'sales_price' => $request->sales_price,
                'image' => $filename,
                'description' => $request->description,
                'created_by' => auth()->user()->username,
            ]);

            $product->save();

            return redirect()->back()->with('success', 'The Product '. $product->name. ' CREATED successfully');

        }

        return redirect()->back()->with('fail', 'The Product CREATION was not successful');

    }

    public function category_products(Category $category)
    {
        $category_products = Product::where('category_id', $category)->get();
        return view('shop.guestshop', compact('category_products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        $product_to_update = Product::find($product->id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'sales_price' => 'required',
            'description' => 'required|string',
        ]);

        $product_to_update = Product::find($product->id);
        $slug = str_replace(' ', '-', $request->name);
//        dd($slug);


        If($request->hasFile('image')) {
//            dd($request->file);

            $file = $request->file('image');

            $destinationPath = 'assets/img/products/bigProductImage';
            $filename = time() . '-' . $slug.'.'. $file->extension();
            $thumbPath = 'assets/img/products/productThumbImage/';
            $thumb = $thumbPath.$filename;
            Image::make($file->getRealPath())->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumb);

//            File::delete($destinationPath.$product_to_update->image, $thumbPath.$product_to_update->image);

            $file->move($destinationPath, $filename);
        }else {
            $filename = $product_to_update->image;
        }

//            $file_to_remove =



            $product->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'sales_price' => $request->sales_price,
                'image' => $filename,
                'description' => $request->description,
                'created_by' => auth()->user()->username,
            ]);

//            $product->save();

            return redirect()->back()->with('success', 'The Product '. $product->name. ' UPDATED successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product_to_delete = Product::find($product->id);
        $product_to_delete->delete();
        return redirect()->back()->with('success', 'The Product '. $product->name. ' Was DELETED successfully');

    }
}
