@extends('front_end.layout')
@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@elseif (session('delete'))
    <div class="alert alert-danger" role="alert">
        {{ session('delete') }}
    </div>
@endif
    <h1>Courses</h1>
    <a href="{{ route('course.create') }}" class="btn btn-primary m-2   ">+ Add Course</a>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Course Name</th>
            <th scope="col">Course Duration</th>
            <th scope="col">Course Fee</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_duration }}</td>
                    <td>Rs {{ $course->fee }}</td>
                    <td>
                        <a href="{{ route('course.edit', ['course'=>$course->id]) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="DELETE"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection
