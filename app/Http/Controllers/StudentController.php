<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('getCourse')->get();
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
        echo "<pre>";
        print_r($requestData);
        exit;
        // $store = Student::create($requestData);
        // return redirect()->route('Student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Course::all();
        $student = Student::find($id);
        // echo "<pre>";
        // print_r($student);
        // exit;
        return view('front_end.edit_student', compact(['courses', 'student']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        $student = Student::find($id);
        // echo "<pre>";
        // print_r($student);
        // exit;
        $request->validate([
            'name' => 'required|max:30',
            'address' => 'required|max:30',
            'contact' => 'required|numeric',
            'course_id' => 'required|numeric',
        ]);
        $newFee = Course::where('id', $request['course_id'])->value('fee');
        $request['fee'] = $newFee;
        $request['remaining_fee'] = Student::find($id)->value('remaining_fee'); //paid ho remaining bhayo
        $requestData = $request->except(['_token', '_method']);
        $student->update($requestData);
        return redirect()->route('Student.index')->with('Update', 'Student Updated');
        // echo "<pre>";
        // print_r($requestData);
        // exit;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('Student.index')->with('delete', 'Student Deleted');
    }
}
