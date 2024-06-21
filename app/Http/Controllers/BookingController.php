<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['hall', 'user'])->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $halls = Hall::all();
        $users = User::all();
        return view('bookings.create', compact('halls', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'user_id' => 'required|exists:users,id',
            'availability' => 'required|boolean',
            'price' => 'required|numeric',
            'location' => 'required',
        ]);

        Booking::create($request->all());
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $halls = Hall::all();
        $users = User::all();
        return view('bookings.edit', compact('booking', 'halls', 'users'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'user_id' => 'required|exists:users,id',
            'availability' => 'required|boolean',
            'price' => 'required|numeric',
            'location' => 'required',
        ]);

        $booking->update($request->all());
        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
