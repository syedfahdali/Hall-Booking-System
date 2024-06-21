<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Owner;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::with('owner')->get();
        return view('managers.index', compact('managers'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('managers.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Manager::create($request->all());
        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    public function show(Manager $manager)
    {
        return view('managers.show', compact('manager'));
    }

    public function edit(Manager $manager)
    {
        $owners = Owner::all();
        return view('managers.edit', compact('manager', 'owners'));
    }

    public function update(Request $request, Manager $manager)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $manager->update($request->all());
        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}
