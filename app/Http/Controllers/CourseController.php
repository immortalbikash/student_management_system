<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        // echo "<pre>";
        // print_r($courses);
        // exit;
        return view('front_end.Course', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front_end.add_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        $request->validate([
            'course_name' => 'required|max:20',
            'course_duration' => 'required|string',
            'fee' => 'required|numeric',
        ]);
        $requestData = $request->except('_token');
        $store = Course::create($requestData);
        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('front_end.edit_course', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        echo "<pre>";
        print_r($request->all());
        exit;
        $request->validate([
            'course_name' => 'required|max:20',
            'course_duration' => 'required|string',
            'fee' => 'required|numeric',
        ]);
        // $course->course_name = $request->course_name ?? $course->course_name;
        // $course->course_duration = $request->course_duration ?? $course->course_duration;
        // $course->save();
        $requestData = $request->except(['_token', 'method']);
        $course->update($requestData);
        return redirect()->route('course.index')->with('success', 'Course Updated.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // echo "<pre>";
        // print_r($course);
        // exit;
        $course->delete();
        return redirect()->route('course.index')->with('delete', 'Course deleted.');
    }
}
