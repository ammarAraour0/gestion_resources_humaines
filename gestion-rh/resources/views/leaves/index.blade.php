@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Leave Requests</h1>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">Add Leave Request</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->employee->first_name }} {{ $leave->employee->last_name }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>{{ ucfirst($leave->status) }}</td>
                    <td>
                        <a href="{{ route('leaves.edit', $leave) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('leaves.destroy', $leave) }}" method="POST" style="display:inline-block;">
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
