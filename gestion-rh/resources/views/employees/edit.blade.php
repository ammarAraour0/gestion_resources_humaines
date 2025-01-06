@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
        </div>
        <div class="form-group">
            <label>Hire Date</label>
            <input type="date" name="hire_date" class="form-control" value="{{ $employee->hire_date }}" required>
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
