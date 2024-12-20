<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::with('getCourses')->get();
        // echo "<pre>";
        // print_r($students);
        // exit;
        return view('front_end.student', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('front_end.add_student', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = Course::where('id', $request['course_id'])->value('fee');
        // echo "<pre>";
        // print_r($course);
        // exit;
       $request->validate([
        'name'=>'required|max:30',
        'address' => 'required|max:30',
        'contact' => 'required|numeric',
       ]);
       $request['fee'] = $course;
       $request['remaining_fee'] = 0;   //paid ho but remaining bhayo
        $requestData = $request->except('_token');
        // echo "<pre>";
        // print_r($requestData);
        // exit;
        $store = Students::create($requestData);
        return redirect()->route('students.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students)
    {
        // echo "<pre>";
        // print_r($students);
        // exit;
        $s = Students::find($students);
        echo "<pre>";
        print_r($s);
        exit;
        // $students->delete();
    }
}
