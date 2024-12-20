<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front_end.login');
});

Route::controller(AuthenticationController::class)->group(function(){
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});


// Route::resource('students', StudentsController::class);
Route::resource('Student', StudentController::class);

Route::controller(HomeController::class)->group(function(){
    Route::get('/home', 'home')->name('home');
});

Route::resource('course', CourseController::class);

Route::resource('teacher', TeacherController::class);

Route::resource('payment', PaymentController::class);
