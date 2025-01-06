<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    public function index()
{
    $attendances = Attendance::with('employee')->orderBy('date', 'desc')->get();
    return view('attendances.index', compact('attendances'));
}

public function create()
{
    $employees = Employee::all();
    return view('attendances.create', compact('employees'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'date' => 'required|date',
        'check_in' => 'nullable|date_format:H:i',
        'check_out' => 'nullable|date_format:H:i|after:check_in',
    ]);

    Attendance::create($validated);

    return redirect()->route('attendances.index')->with('success', 'Attendance record added successfully.');
}

public function edit(Attendance $attendance)
{
    $employees = Employee::all();
    return view('attendances.edit', compact('attendance', 'employees'));
}

public function update(Request $request, Attendance $attendance)
{
    $validated = $request->validate([
        'date' => 'required|date',
        'check_in' => 'nullable|date_format:H:i',
        'check_out' => 'nullable|date_format:H:i|after:check_in',
    ]);

    $attendance->update($validated);

    return redirect()->route('attendances.index')->with('success', 'Attendance record updated successfully.');
}

public function destroy(Attendance $attendance)
{
    $attendance->delete();

    return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully.');
}


}
