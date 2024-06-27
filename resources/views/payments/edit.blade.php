@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Edit Payment</h1>
    <form action="{{ route('payments.update', $payment->id) }}" method="POST" class="max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="booking_id" class="block text-gray-700 font-bold mb-2">Booking</label>
            <select name="booking_id" id="booking_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($bookings as $booking)
                    <option value="{{ $booking->id }}" {{ $payment->booking_id == $booking->id ? 'selected' : '' }}>
                        {{ $booking->hall->name }} - ${{ $booking->price }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-gray-700 font-bold mb-2">Amount</label>
            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="amount" name="amount" value="{{ $payment->amount }}" required>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" value="{{ $payment->status }}" required>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Payment</button>
    </form>
</div>
@endsection
