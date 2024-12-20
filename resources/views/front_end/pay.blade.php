@extends('front_end.layout')
@section('content')
    <h1>Fee Payment</h1>
    <form method="POST" action="{{ route('payment.update', ['payment' => $student->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="course_name">Student Name</label>
          <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $student->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="course_duration">Contact</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="{{ $student->contact }}" disabled>
        </div>

        <div class="form-group">
            <label for="fee">Total Fee</label>
            <input type="text" class="form-control" id="fee" name="fee" value="{{ $student->fee }}" disabled>
        </div>

        <div class="form-group">
            <label for="fee">Paid</label>
            <input type="text" class="form-control" id="fee" name="fee" value="{{ $student->remaining_fee }}" disabled>
        </div>

        <div class="form-group">
            <label for="fee">Remaining Fee</label>
            <input type="number" class="form-control" id="remaining" name="remaining" value="{{ $remaining_fee }}" disabled>
        </div>

        <div class="form-group">
            <label for="pay">Pay</label>
            <input type="number" class="form-control" value="0" id="pay" name="pay">
        </div>

        <button class="btn btn-dark mt-2">Pay</button>
      </form>
@endsection
