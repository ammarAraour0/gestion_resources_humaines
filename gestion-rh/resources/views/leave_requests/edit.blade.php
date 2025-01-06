@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Leave Request</h1>
    <form action="{{ route('leave-requests.update', $leaveRequest) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $leaveRequest->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $leaveRequest->start_date }}" required>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $leaveRequest->end_date }}" required>
        </div>
        <div class="form-group">
            <label>Reason</label>
            <textarea name="reason" class="form-control" required>{{ $leaveRequest->reason }}</textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending" {{ $leaveRequest->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $leaveRequest->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Rejected" {{ $leaveRequest->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
