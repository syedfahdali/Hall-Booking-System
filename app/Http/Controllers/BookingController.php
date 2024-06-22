<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        // Show only bookings of the authenticated user
        $bookings = Booking::with(['hall', 'user'])->where('user_id', Auth::id())->get();
        return view('layouts.bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $halls = Hall::all();
        $users = User::all();
        $hall = Hall::find($request->hall_id); 
        return view('layouts.bookings.create', compact('halls', 'users', 'hall'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ]);

        $hall = Hall::find($request->hall_id);
        $hall->availability = 0;
        $hall->save();

        $booking = new Booking;
        $booking->hall_id = $request->hall_id;
        $booking->user_id = Auth::id(); // Set the user_id to the authenticated user's ID
        $booking->price = $request->price;
        $booking->location = $request->location;
        $booking->save();

        return redirect()->route('dashboard')->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        // Ensure the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to view this booking.');
        }
        return view('layouts.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        // Ensure the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to edit this booking.');
        }
        $halls = Hall::all();
        $users = User::all();
        return view('layouts.bookings.edit', compact('booking', 'halls', 'users'));
    }

    public function update(Request $request, Booking $booking)
    {
        // Ensure the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to update this booking.');
        }
        
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ]);

        $booking->update($request->all());
        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        // Ensure the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to delete this booking.');
        }

        // Update the availability of the hall to 'available'
        $hall = Hall::find($booking->hall_id);
        $hall->availability = 1; // Assuming 1 means 'Available'
        $hall->save();

        // Delete the booking
        $booking->delete();

        // Redirect to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Booking deleted successfully and hall is now available.');
    }
}
