@extends('front_end.layout')
@section('content')
    <h1>Add Teacher</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('teacher.store') }}">
        @csrf
        <div class="form-group">
          <label for="name">Teacher Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Shyam Kumar">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Lokanthali">
          </div>

          <div class="form-group">
            <label for="contact">Phone Number</label>
            <input type="number" class="form-control" id="contact" name="contact" placeholder="98********">
          </div>

        <div class="form-group">
            <label for="course">Course Name</label>
            <select class="form-select" id="course_id" aria-label="Default select example"
            required="" name="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
            </select>
        </div>

          <button class="btn btn-dark mt-2">Add course</button>
      </form>
@endsection
