<?php


namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HallController extends Controller
{
    // Display a listing of the halls owned by the authenticated user
    public function index()
    {
        $user = Auth::user();
        $halls = $user->halls;
        return view('layouts.halls.index', compact('halls'));
    }

    // Show the form for creating a new hall
    public function create()
    {
        return view('layouts.halls.create');
    }

    // Store a newly created hall in storage for the authenticated user
    public function store(Request $request)
    {
        $this->validateHall($request);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/halls', $imageName);

        Auth::user()->halls()->create([
            'type' => $request->type,
            'capacity' => $request->capacity,
            'location' => $request->location,
            'price' => $request->price,
            'availability' => $request->availability,
            'image' => $imageName,
        ]);

        return redirect()->route('halls.index')->with('success', 'Hall created successfully.');
    }

    // Display the specified hall
    public function show(Hall $hall)
    {
        return view('layouts.halls.show', compact('hall'));
    }

    // Show the form for editing the specified hall
    public function edit(Hall $hall)
    {
        // Ensure only the owner of the hall can edit it
        if (Auth::user()->id !== $hall->user_id) {
            return redirect()->route('halls.index')->with('error', 'Unauthorized access.');
        }

        return view('layouts.halls.edit', compact('hall'));
    }

    // Update the specified hall in storage
    public function update(Request $request, Hall $hall)
    {
        // Validate the incoming request data
        $this->validateHall($request, $hall->id);

        // Ensure only the owner of the hall can update it
        if (Auth::user()->id !== $hall->user_id) {
            return redirect()->route('halls.index')->with('error', 'Unauthorized update.');
        }

        // Prepare data to update based on the request
        $data = [
            'type' => $request->input('type'),
            'capacity' => $request->input('capacity'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'availability' => $request->input('availability'),
        ];

        // Handle image update if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            Storage::delete('public/halls/' . $hall->image);

            // Store the new image and update the image field in $data
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/halls', $imageName);
            $data['image'] = $imageName;
        }

        // Update the hall with the prepared data
        $hall->update($data);

        // Redirect back to the edit form with a success message
        return redirect()->route('halls.index')->with('success', 'Hall updated successfully.');
    }

    // Remove the specified hall from storage
    public function destroy(Hall $hall)
    {
        // Ensure only the owner of the hall can delete it
        if (Auth::user()->id !== $hall->user_id) {
            return redirect()->route('halls.index')->with('error', 'Unauthorized delete.');
        }

        // Delete the hall image from storage
        Storage::delete('public/halls/' . $hall->image);

        $hall->delete();
        return redirect()->route('halls.index')->with('success', 'Hall deleted successfully.');
    }

    // Validation logic for hall data
    protected function validateHall(Request $request, $id = null)
    {
        $rules = [
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($id) {
            $rules['image'] = 'sometimes|' . $rules['image'];
        } else {
            $rules['image'] = 'required|' . $rules['image'];
        }

        $request->validate($rules);
    }
}
