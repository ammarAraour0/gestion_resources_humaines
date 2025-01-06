@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Leave Requests</h1>
    <a href="{{ route('leave-requests.create') }}" class="btn btn-primary mb-3">Add Leave Request</a>
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
            @foreach($leaveRequests as $leaveRequest)
                <tr>
                    <td>{{ $leaveRequest->id }}</td>
                    <td>{{ $leaveRequest->employee->first_name }} {{ $leaveRequest->employee->last_name }}</td>
                    <td>{{ $leaveRequest->start_date }}</td>
                    <td>{{ $leaveRequest->end_date }}</td>
                    <td>{{ $leaveRequest->reason }}</td>
                    <td>{{ $leaveRequest->status }}</td>
                    <td>
                        <a href="{{ route('leave-requests.edit', $leaveRequest) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('leave-requests.destroy', $leaveRequest) }}" method="POST" style="display:inline-block;">
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
