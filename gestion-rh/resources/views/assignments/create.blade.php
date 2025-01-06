@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Assignment</h1>
    <form action="{{ route('assignments.store') }}" method="POST">
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
            <label>Position</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Region</label>
            <input type="text" name="region" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Province</label>
            <input type="text" name="province" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <div class="form-group">
            <label>Details</label>
            <textarea name="details" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
