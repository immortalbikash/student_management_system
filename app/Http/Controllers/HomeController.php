<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        // echo "<pre>";
        // print_r('Home');
        // exit;
        $courses = Course::all();
        $courseNumber = $courses->count();

        $teachers = Teachers::all();
        $teacherNumber = $teachers->count();

        $studentsNumber = Students::all()->count();
        return view('front_end.home', compact('courseNumber', 'teacherNumber', 'studentsNumber'));
    }
}
