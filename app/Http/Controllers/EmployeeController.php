<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Hall;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['hall', 'manager'])->get();
        return view('layouts.employees.index', compact('employees'));
    }

    public function create()
    {
        $halls = Hall::all();
        $managers = Manager::all();
        return view('layouts.employees.create', compact('halls', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'manager_id' => 'required|exists:managers,id',
            'name' => 'required|string|max:255',
            'shift' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        Employee::create([
            'hall_id' => $request->hall_id,
            'manager_id' => $request->manager_id,
            'name' => $request->name,
            'shift' => $request->shift,
            'phone' => $request->phone,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('layouts.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $halls = Hall::all();
        $managers = Manager::all();
        return view('layouts.employees.edit', compact('employee', 'halls', 'managers'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'manager_id' => 'required|exists:managers,id',
            'name' => 'required|string|max:255',
            'shift' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
