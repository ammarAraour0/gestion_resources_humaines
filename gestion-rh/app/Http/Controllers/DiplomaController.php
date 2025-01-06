<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Employee;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index()
    {
        $diplomas = Diploma::with('employee')->get();
        return view('diplomas.index', compact('diplomas'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('diplomas.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'graduation_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        Diploma::create($validated);

        return redirect()->route('diplomas.index')->with('success', 'Diploma added successfully.');
    }

    public function edit(Diploma $diploma)
    {
        $employees = Employee::all();
        return view('diplomas.edit', compact('diploma', 'employees'));
    }

    public function update(Request $request, Diploma $diploma)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'graduation_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        $diploma->update($validated);

        return redirect()->route('diplomas.index')->with('success', 'Diploma updated successfully.');
    }

    public function destroy(Diploma $diploma)
    {
        $diploma->delete();

        return redirect()->route('diplomas.index')->with('success', 'Diploma deleted successfully.');
    }
}


