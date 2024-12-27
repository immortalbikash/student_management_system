@extends('front_end.layout')
@section('content')
    <h1>Edit Student</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('Student.update', ['Student'=> $student->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Student Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label for="address">Student Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}">
        </div>
        <div class="form-group">
            <label for="contact">Student Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $student->contact }}">
        </div>
        <div class="form-group">
            <label for="course_id">Course Name</label>
            <select class="form-select" id="course_id" aria-label="Default select example"
            required="" name="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" @if($student->course_id == $course->id) selected @endif>{{ $course->course_name }}</option>
            @endforeach
            </select>
        </div>
        <button class="btn btn-success mt-2">Update Student</button>
      </form>
@endsection
