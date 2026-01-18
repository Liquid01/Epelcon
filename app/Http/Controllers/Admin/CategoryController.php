<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    protected $filename = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function shop_categories()
    {
        $categories = Category::all();
        return view('includes.categories_menu', compact('categories'));
    }


    public function ajax_get_categories()
    {
        $category = Category::all();
//        $categories = $category->select();

//        dd(json_encode($categories));
//        return response.json_encode($categories);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_category(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $destinationPath = 'assets/img/categories/bigCategoryImage';
            $filename = time() . '-' . $file->getClientOriginalName();
            $thumbPath = 'assets/img/categories/categoryThumbImage/' . $filename;
            Image::make($file->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath);

            $file->move($destinationPath, $filename);

            $this->filename = $filename;

        }

        $category = new Category([
            'name' => $request->name,
            'image' => $this->filename,
            'description' => $request->description,
        ]);

        $category->save();

        return redirect()->back()->with('success', 'The Category '. $category->name. ' CREATED successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
