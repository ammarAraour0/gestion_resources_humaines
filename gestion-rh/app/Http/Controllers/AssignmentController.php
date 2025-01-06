<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Employee;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with('employee')->get();
        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('assignments.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'position' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'details' => 'nullable|string',
        ]);

        Assignment::create($validated);

        return redirect()->route('assignments.index')->with('success', 'Assignment added successfully.');
    }

    public function edit(Assignment $assignment)
    {
        $employees = Employee::all();
        return view('assignments.edit', compact('assignment', 'employees'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'details' => 'nullable|string',
        ]);

        $assignment->update($validated);

        return redirect()->route('assignments.index')->with('success', 'Assignment updated successfully.');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Assignment deleted successfully.');
    }
}
