<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $bookings = Booking::all();
        return view('payments.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        Payment::create($request->all());
        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $bookings = Booking::all();
        return view('payments.edit', compact('payment', 'bookings'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $payment->update($request->all());
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
