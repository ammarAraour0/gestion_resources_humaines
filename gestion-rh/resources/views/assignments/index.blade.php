@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assignments</h1>
    <a href="{{ route('assignments.create') }}" class="btn btn-primary mb-3">Add Assignment</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Position</th>
                <th>Region</th>
                <th>Province</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->id }}</td>
                    <td>{{ $assignment->employee->first_name }} {{ $assignment->employee->last_name }}</td>
                    <td>{{ $assignment->position }}</td>
                    <td>{{ $assignment->region }}</td>
                    <td>{{ $assignment->province }}</td>
                    <td>{{ $assignment->start_date }}</td>
                    <td>{{ $assignment->end_date ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('assignments.edit', $assignment) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('assignments.destroy', $assignment) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
