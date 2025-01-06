<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Models\Employee;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::with('employee')->orderBy('created_at', 'desc')->get();
        return view('leave_requests.index', compact('leaveRequests'));
    }
    
    public function create()
    {
        $employees = Employee::all();
        return view('leave_requests.create', compact('employees'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);
    
        LeaveRequest::create($validated);
    
        return redirect()->route('leave-requests.index')->with('success', 'Leave request submitted successfully.');
    }
    
    public function edit(LeaveRequest $leaveRequest)
    {
        $employees = Employee::all();
        return view('leave_requests.edit', compact('leaveRequest', 'employees'));
    }
    
    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);
    
        $leaveRequest->update($validated);
    
        return redirect()->route('leave-requests.index')->with('success', 'Leave request updated successfully.');
    }
    
    public function destroy(LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();
    
        return redirect()->route('leave-requests.index')->with('success', 'Leave request deleted successfully.');
    }
    
}
