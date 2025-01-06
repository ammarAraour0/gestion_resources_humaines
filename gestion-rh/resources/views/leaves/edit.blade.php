@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Leave Request</h1>
    <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id == $leave->employee_id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $leave->start_date }}" required>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $leave->end_date }}" required>
        </div>
        <div class="form-group">
            <label>Reason</label>
            <textarea name="reason" class="form-control" required>{{ $leave->reason }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
