<?php

namespace App\Http\Controllers;

use App\Course;
use App\Discipline;
use App\MemberCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['members', 'admin']);
    }

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


    public function member_all_courses()
    {
        $courses = Discipline::all();
        return view('courses/all_member_courses', compact('courses'));
    }

    public function member_course_details(Discipline $discipline)
    {
        $course = $discipline;
        return view('courses/member_course_details', compact('course'));
    }

    public function my_courses()
    {
        $courses = MemberCourse::where('user_id', auth()->user()->id)->get();
        return view('courses/my_courses', compact('courses'));
    }


    public function member_course_apply(Discipline $discipline)
    {
        $course = $discipline;
//        dd($course->title);
        $words = preg_split("/[\s,_-]+/", $course->name);
        $code = "";
        foreach ($words as $w) {
            $code .= $w[0];
        }
        $period = Carbon::now();
        $dcode = 'CAN-' . $course->id . '/' . strtoupper($code).'/'.$period->month.'/'.$period->year;
        return view('courses/apply', compact('course', 'dcode'));
    }


    public function save_course_apply(Request $request)
    {
        $request->validate([
//            'referrer' => 'string|required|exist:users, username',
            'course_code' => 'string|required',
            'serial' => 'string|required|exists:pins,serial',
            'pin' => 'string|required|exists:pins,code',
        ]);

        $member_course = new MemberCourse([
            'user_id' => auth()->user()->id,
            'discipline_id' => $request->course_id,
            'courses' => $request->course_code,

        ]);
        $member_course->save();
        return view('courses.confirm')->with('success', 'Course Applied for successfully');
    }

    public function latest_courses()
    {
        $courses = MemberCourse::latest();
        return view('courses/latest', compact('courses'));
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

            $file = $request->file('image');

            $destinationPath = 'assets/img/courses/bigImages';
            $filename = time() . '-' . $file->getClientOriginalName();
            $thumbPath = 'assets/img/courses/thumbImages/' . $filename;

//            Image::make($file->getRealPath())->resize(400, null, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save($thumbPath);
//
//            $file->move($destinationPath, $filename);

        }

        $course = new Course([
            'discipline_id' => $request->discipline_id,
            'name' => $request->name,
            'title' => $request->title,
            'code' => 'CAN-' . $request->decription_id,
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
        $course->update([
            'discipline_id' => $request->discipline_id,
            'name' => $request->name,
            'title' => $request->title,
            'code' => 'CAN-' . $request->decription_id,
            'image' => $request->image,
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
