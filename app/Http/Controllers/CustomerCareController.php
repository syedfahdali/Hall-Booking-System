<?php

namespace App\Http\Controllers;

use App\Models\CustomerCare;
use App\Models\Hall;  // Import the Hall model
use App\Models\Employee;  // Import the Employee model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCareController extends Controller
{
    public function index()
    {
        $customerCares = CustomerCare::whereHas('hall', function($query) {
            $query->where('user_id', Auth::id()); // Assuming each hall has a user_id column
        })->get();

        return view('layouts.customer-cares.index', compact('customerCares'));
    }

    public function create()
    {
        // Ensure the user can only create customer care for their own halls
        $halls = Hall::where('user_id', Auth::id())->get();
        $employees = Employee::all();
        return view('layouts.customer-cares.create', compact('halls', 'employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        CustomerCare::create($validated);

        return redirect()->route('customer-cares.index')->with('success', 'Customer care created successfully.');
    }

    public function show($id)
    {
        $customerCare = CustomerCare::findOrFail($id);
        return view('customer-cares.show', compact('customerCare'));
    }

    public function edit($id)
    {
        $customerCare = CustomerCare::findOrFail($id);
        $halls = Hall::where('user_id', Auth::id())->get();
        $employees = Employee::all();
        return view('customer-cares.edit', compact('customerCare', 'halls', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $customerCare = CustomerCare::findOrFail($id);

        $validated = $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $customerCare->update($validated);

        return redirect()->route('customer-cares.index')->with('success', 'Customer care updated successfully.');
    }

    public function destroy($id)
    {
        $customerCare = CustomerCare::findOrFail($id);
        $customerCare->delete();

        return redirect()->route('customer-cares.index')->with('success', 'Customer care deleted successfully.');
    }
}
