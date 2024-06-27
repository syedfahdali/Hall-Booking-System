@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Payment Details</h1>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Payment ID</label>
            <p class="text-gray-700">{{ $payment->id }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Booking ID</label>
            <p class="text-gray-700">{{ $payment->booking_id }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Amount</label>
            <p class="text-gray-700">${{ $payment->amount }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Status</label>
            <p class="text-gray-700">{{ $payment->status }}</p>
        </div>
        <a href="{{ route('payments.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Back to Payments</a>
    </div>
</div>
@endsection
