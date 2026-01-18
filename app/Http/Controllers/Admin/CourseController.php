<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Discipline;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }


    public function course_list(Discipline $discipline)
    {
        $disciplines = Discipline::all();
        $courses = Course::where('discipline_id', $discipline->id)->get();
        return view('courses.courselist', compact('courses', 'discipline', 'disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'discipline_id' => 'required|integer',
            'name' => 'required|string',
            'title' => 'required|string',
            'price' => 'required',
            'duration' => 'required',
            'description' => 'required',

        ]);

        $filename = $request->image;

        If ($request->hasFile('image')) {
//            dd($request->image);
            $file = $request->file('image');

            $destinationPath = 'assets/img/courses/bigImages';
            $filename = time() . '-' . $file->getClientOriginalName();
            $thumbPath = 'assets/img/courses/thumbImages/' . $filename;

            Image::make($file->getRealPath())->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath);

            $file->move($destinationPath, $filename);

        }

//        $words = explode(" ", $request->title);
        $words = preg_split("/[\s,_-]+/", $request->title);
        $code = "";
        foreach ($words as $w) {
            $code .= $w[0];
        }
        dd($code);

        $course = new Course([
            'discipline_id' => $request->discipline_id,
            'name' => $request->name,
            'title' => $request->title,
            'code' => 'CAN-' . $request->discipline_id . '/' . $code,
            'image' => $filename,
            'price' => $request->price,
            'student_price' => $request->student_price,
            'member_price' => $request->member_price,
            'graduate_price' => $request->graduate_price,
            'other_price' => $request->other_price,
            'duration' => $request->duration,
            'description' => $request->description,

        ]);

//        dd($course);


        $course->save();

        return redirect()->back()->with('success', 'The Course ' . strtoupper($course->name) . ' was Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
//        dd($course);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $filename = $course->image;

        If ($request->hasFile('image')) {
//            dd($request->image);
            $file = $request->file('image');

            $destinationPath = 'assets/img/courses/bigImages';
            $filename = time() . '-' . $file->getClientOriginalName();
            $thumbPath = 'assets/img/courses/thumbImages/' . $filename;

            Image::make($file->getRealPath())->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath);

            $file->move($destinationPath, $filename);

        }

        $words = preg_split("/[\s,_-]+/", $request->title);
        $code = "";
        foreach ($words as $w) {
            $code .= $w[0];
        }
        $period = Carbon::now();
//        dd(strtoupper($code).'/'.$period->month.'/'.$period->year);
        $course->update([
            'discipline_id' => $request->discipline_id,
            'name' => $request->name,
            'title' => $request->title,
            'code' => 'CAN-' . $request->discipline_id . '/' . strtoupper($code).'/'.$period->month.'/'.$period->year,
            'image' => $filename,
            'price' => $request->price,
            'student_price' => $request->student_price,
            'member_price' => $request->member_price,
            'graduate_price' => $request->graduate_price,
            'other_price' => $request->other_price,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Course UPDATED Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);

        return redirect()->back()->with('success', 'Course DELETED Successfully');
    }
}
