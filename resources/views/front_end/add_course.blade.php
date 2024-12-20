@extends('front_end.layout')
@section('content')
    <h1>Add course</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('course.store') }}">
        @csrf
        <div class="form-group">
          <label for="course_name">Course Name</label>
          <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Android">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" placeholder="2 Months">
          </div>

          <div class="form-group">
            <label for="fee">Course Fee</label>
            <input type="number" class="form-control" id="fee" name="fee" placeholder="">
          </div>

          <button class="btn btn-dark mt-2">Add course</button>
      </form>
@endsection
