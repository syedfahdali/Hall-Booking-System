<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Manager;
use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function index()
    {
        $owners = Owner::with('managers')->get();
        $managers = Manager::with('owner')->get();

        return view('executive.index', compact('owners', 'managers'));
    }

    public function createOwner()
    {
        return view('executive.create_owner');
    }

    public function storeOwner(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        Owner::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->route('executive.index')->with('success', 'Owner created successfully.');
    }

    public function destroyOwner(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('executive.index')->with('success', 'Owner deleted successfully.');
    }

    public function createManager()
    {
        $owners = Owner::all();
        return view('executive.create_manager', compact('owners'));
    }

    public function storeManager(Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:managers,email',
            'phone' => 'required|string',
        ]);

        Manager::create([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('executive.index')->with('success', 'Manager created successfully.');
    }

    public function destroyManager(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('executive.index')->with('success', 'Manager deleted successfully.');
    }
}
