<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
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
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|string',
        ]);

        $payment = new Payment;
        $payment->booking_id = $request->booking_id;
        $payment->status = $request->status;
        $payment->save();

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
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|string',
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
