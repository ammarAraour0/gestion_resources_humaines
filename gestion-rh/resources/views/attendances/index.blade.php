@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attendance Records</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Add Attendance</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->employee->first_name }} {{ $attendance->employee->last_name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->check_in ?? 'N/A' }}</td>
                    <td>{{ $attendance->check_out ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('attendances.destroy', $attendance) }}" method="POST" style="display:inline-block;">
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
