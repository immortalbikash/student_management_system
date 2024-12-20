@extends('front_end.layout')
@section('content')
    <h1>Teachers</h1>
    <a href="{{ route('teacher.create') }}" class="btn btn-primary m-2   ">+ Add Teacher</a>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Teacher Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
            <th scope="col">Course</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->contact }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->getCourse->course_name }}</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('teacher.destroy', ['teacher' => $teacher->id]) }}">
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
