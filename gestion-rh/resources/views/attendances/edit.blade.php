@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Attendance</h1>
    <form action="{{ route('attendances.update', $attendance) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $attendance->date }}" required>
        </div>
        <div class="form-group">
            <label>Check In</label>
            <input type="time" name="check_in" class="form-control" value="{{ $attendance->check_in }}">
        </div>
        <div class="form-group">
            <label>Check Out</label>
            <input type="time" name="check_out" class="form-control" value="{{ $attendance->check_out }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
