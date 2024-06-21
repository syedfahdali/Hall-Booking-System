<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Hall;
use App\Models\Manager;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['hall', 'manager'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $halls = Hall::all();
        $managers = Manager::all();
        return view('employees.create', compact('halls', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'manager_id' => 'required|exists:managers,id',
            'shift' => 'required',
            'phone' => 'required',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $halls = Hall::all();
        $managers = Manager::all();
        return view('employees.edit', compact('employee', 'halls', 'managers'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'manager_id' => 'required|exists:managers,id',
            'shift' => 'required',
            'phone' => 'required',
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
