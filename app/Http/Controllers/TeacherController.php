<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo "<pre>";
        // print_r(auth()->user()->email);
        // exit;
        $teachers = Teachers::with('getCourse')->get();
        // echo "<pre>";
        // print_r($teachers);
        // exit;
        return view('front_end.teacher', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('front_end.add_teacher', compact('courses'));
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
            'name'=>'required|max:30',
            'address' => 'required|max:35',
            'contact' => 'required|numeric',
        ]);

        $requestData = $request->except('_token');
        //  echo "<pre>";
        // print_r($requestData);
        // exit;
        $store = Teachers::create($requestData);
        return redirect()->route('teacher.index');


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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teachers)
    {
        echo "<pre>";
        print_r($teachers);
        exit;
        $teachers->delete();
        return redirect()->route('teacher.index')->with('delete', 'Teacher deleted.');
    }
}
