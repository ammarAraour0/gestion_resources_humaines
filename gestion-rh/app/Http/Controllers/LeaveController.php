<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('employee')->get();
        return view('leaves.index', compact('leaves'));
    }
    
    public function create()
    {
        $employees = Employee::all();
        return view('leaves.create', compact('employees'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);
    
        Leave::create($validated);
    
        return redirect()->route('leaves.index')->with('success', 'Leave request submitted successfully.');
    }
    
    public function edit(Leave $leave)
    {
        $employees = Employee::all();
        return view('leaves.edit', compact('leave', 'employees'));
    }
    
    public function update(Request $request, Leave $leave)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
            'status' => 'required|in:pending,approved,rejected',
        ]);
    
        $leave->update($validated);
    
        return redirect()->route('leaves.index')->with('success', 'Leave request updated successfully.');
    }
    
    public function destroy(Leave $leave)
    {
        $leave->delete();
    
        return redirect()->route('leaves.index')->with('success', 'Leave request deleted successfully.');
    }
    
}
