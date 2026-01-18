<?php

namespace App\Http\Controllers\Admin;

use App\Discipline;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::all();

        return view('disciplines.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'title' => 'string|required',
//           'image'=> 'string|required',
        ]);

        $discipline = new  Discipline([
            'name' => $request->name,
            'title' => $request->title,
            'image' => $request->image,
        ]);

        $discipline->save();

        return redirect()->back()->with('success', 'Discipline Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discipline $discipline
     * @return \Illuminate\Http\Response
     */
    public function show(Discipline $discipline)
    {
        return view('disciplines.details', compact('discipline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discipline $discipline
     * @return \Illuminate\Http\Response
     */
    public function edit(Discipline $discipline)
    {
        return view('disciplines.edit', compact('discipline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Discipline $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discipline $discipline)
    {

        $slug = $this->createSlug($request->name);
        $filename = $discipline->image;

        If ($request->hasFile('image')) {
//            dd($request->file);

            $file = $request->file('image');
            $ext = $file->extension();

            $destinationPath = 'dashassets/images/courses/big';
            $filename =  $slug.time().'.'.$ext;
            $thumbPath = 'dashassets/images/courses/thumb/' . $filename;
            Image::make($file->getRealPath())->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath);

            $file->move($destinationPath, $filename);


        }
        $discipline->name = $request->name;
        $discipline->title = $request->title;
        $discipline->description = $request->description;
        $discipline->image = $filename;

        $discipline->save();

        return redirect()->back()->with('success', 'Discipline Updated Successfully');
    }


    public function createSlug($text)
    {
        $slug = str_replace(' ', '-', $text);
        return $slug;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discipline $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discipline $discipline)
    {
        $to_destroy = Discipline::destroy($discipline->id);

        return redirect()->back()->with('success', 'Discipline DELETED Successfully');


    }
}
