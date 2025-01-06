
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Attendance</h1>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Check In</label>
            <input type="time" name="check_in" class="form-control">
        </div>
        <div class="form-group">
            <label>Check Out</label>
            <input type="time" name="check_out" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
