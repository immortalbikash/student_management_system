@extends('front_end.layout')
@section('content')
    <h1>Edit Course</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('course.update', ['course'=> $course->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="course_name">Course Name</label>
          <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="{{ $course->course_duration }}">
        </div>

        <div class="form-group">
            <label for="fee">Course Name</label>
            <input type="text" class="form-control" id="fee" name="fee" value="{{ $course->fee }}">
          </div>

        <button class="btn btn-dark mt-2">Update course</button>
      </form>
@endsection
