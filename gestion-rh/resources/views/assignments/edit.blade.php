@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Assignment</h1>
    <form action="{{ route('assignments.update', $assignment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $assignment->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" value="{{ $assignment->position }}" required>
        </div>
        <div class="form-group">
            <label>Region</label>
            <input type="text" name="region" class="form-control" value="{{ $assignment->region }}" required>
        </div>
        <div class="form-group">
            <label>Province</label>
            <input type="text" name="province" class="form-control" value="{{ $assignment->province }}" required>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $assignment->start_date }}" required>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $assignment->end_date }}">
        </div>
        <div class="form-group">
            <label>Details</label>
            <textarea name="details" class="form-control">{{ $assignment->details }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
