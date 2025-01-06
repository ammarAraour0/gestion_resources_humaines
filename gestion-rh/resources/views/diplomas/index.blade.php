@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Diploma</h1>
    <form action="{{ route('diplomas.store') }}" method="POST">
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
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Institution</label>
            <input type="text" name="institution" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Graduation Year</label>
            <input type="number" name="graduation_year" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
