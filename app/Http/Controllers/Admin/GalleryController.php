<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bigImages = \File::allFiles('assets/img/gallery/big');
        $smallImages = \File::allFiles('assets/img/gallery/small');
//        dd($images);
//        foreach ($images as $image)
//        {
//            dd($image->getPathname());
//        }

        return view('gallery')->with('images',$bigImages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $evens =
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|integer',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')){

            $file = $request->file('image');

            $destinationPath = 'assets/img/gallery/big';
            $filename = '_'.$request->event_id .time() .'-'. $file->getClientOriginalName();
            $thumbPath = 'assets/img/gallery/small/' . $filename;
            Image::make($file->getRealPath())->resize(255, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath);

            $file->move($destinationPath, $filename);
            return redirect()->back()->with('success', 'Image Uploaded Successfully');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
