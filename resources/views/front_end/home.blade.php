@extends('front_end.layout')
@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div class="home-content">
        <div class="std">
            <h2>{{ $courseNumber }}</h2>
            <h3>Courses</h3>
        </div>
        <div class="tchr">
            <h2>{{ $teacherNumber }}</h2>
            <h3>Teachers</h3>
        </div>
        <div class="course">
            <h2>{{ $studentsNumber }}</h2>
            <h3>Students</h3>
        </div>
    </div>
@endsection
