@extends('front_end.layout')
@section('content')
    <h1>Students</h1>
    <a href="{{ route('Student.create') }}" class="btn btn-primary m-2">+ Add Student</a>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Course</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
                    @foreach ($students as $student )
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->contact }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->getCourse->course_name }}</td>
                        <td>
                            <a href="{{ route('Student.edit', ['Student'=> $student->id]) }}" class="btn btn-warning">Edit</a>
                            <form method="POST" action="{{ route('Student.destroy', ['Student' => $student->id])}}">
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
