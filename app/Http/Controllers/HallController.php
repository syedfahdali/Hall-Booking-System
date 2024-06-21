<?php

// app/Http/Controllers/HallController.php
namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        return view('halls.index', compact('halls'));
    }
    public function create()
    {
        return view('halls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'capacity' => 'required|integer',
            'location' => 'required',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
        ]);

        Hall::create($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall created successfully.');
    }

    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }

    public function edit(Hall $hall)
    {
        return view('halls.edit', compact('hall'));
    }

    public function update(Request $request, Hall $hall)
    {
        $request->validate([
            'type' => 'required',
            'capacity' => 'required|integer',
            'location' => 'required',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
        ]);

        $hall->update($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall updated successfully.');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('halls.index')->with('success', 'Hall deleted successfully.');
    }
}
