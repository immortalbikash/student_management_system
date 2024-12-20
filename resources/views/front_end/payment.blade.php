@extends('front_end.layout')
@section('content')
    <h1>Payments</h1>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Course</th>
            <th scope="col">Total Fee</th>
            <th scope="col"> Paid</th>
            <th scope="col"> Remaining Fee</th>
            <th scope="col">Result</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
                    @foreach ($students as $student )
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->contact }}</td>
                        <td>{{ $student->getCourses->course_name }}</td>
                        <td>Rs {{ $student->fee }}</td>
                        <td>Rs {{ $student->remaining_fee }}</td>
                        <td>Rs {{ ($student->fee) - ($student->remaining_fee) }}</td>
                        <td>Paid or Not</td>
                        <td>
                            <a href="{{ route('payment.edit', ['payment' => $student->id]) }}" class="btn btn-danger">Pay</a>
                        </td>
                    </tr>
                    @endforeach
        </tbody>
      </table>
@endsection
