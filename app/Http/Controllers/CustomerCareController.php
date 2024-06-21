<?php

namespace App\Http\Controllers;

use App\Models\CustomerCare;
use App\Models\Hall;
use App\Models\Employee;
use Illuminate\Http\Request;

class CustomerCareController extends Controller
{
    public function index()
    {
        $customerCares = CustomerCare::with(['hall', 'employee'])->get();
        return view('customerCares.index', compact('customerCares'));
    }

    public function create()
    {
        $halls = Hall::all();
        $employees = Employee::all();
        return view('customerCares.create', compact('halls', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        CustomerCare::create($request->all());
        return redirect()->route('customer-cares.index')->with('success', 'Customer Care created successfully.');
    }

    public function show(CustomerCare $customerCare)
    {
        return view('customerCares.show', compact('customerCare'));
    }

    public function edit(CustomerCare $customerCare)
    {
        $halls = Hall::all();
        $employees = Employee::all();
        return view('customerCares.edit', compact('customerCare', 'halls', 'employees'));
    }

    public function update(Request $request, CustomerCare $customerCare)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $customerCare->update($request->all());
        return redirect()->route('customer-cares.index')->with('success', 'Customer Care updated successfully.');
    }

    public function destroy(CustomerCare $customerCare)
    {
        $customerCare->delete();
        return redirect()->route('customer-cares.index')->with('success', 'Customer Care deleted successfully.');
    }
}
