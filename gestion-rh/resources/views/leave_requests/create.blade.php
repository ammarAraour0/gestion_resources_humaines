@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Leave Request</h1>
    <form action="{{ route('leave-requests.store') }}" method="POST">
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
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Reason</label>
            <textarea name="reason" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
