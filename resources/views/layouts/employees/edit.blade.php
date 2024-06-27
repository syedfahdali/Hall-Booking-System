@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-blue-600 text-white text-lg font-bold p-4 rounded-t-lg">Edit Payment</div>
                <div class="p-6">
                    <form method="POST" action="{{ route('payments.update', $payment) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <input id="status" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror" name="status" value="{{ $payment->status }}" required>
                            @error('status')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="booking_id" class="block text-gray-700 text-sm font-bold mb-2">Booking</label>
                            <select name="booking_id" id="booking_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('booking_id') border-red-500 @enderror" required>
                                @foreach($bookings as $booking)
                                    <option value="{{ $booking->id }}" @if($booking->id == $payment->booking_id) selected @endif>{{ $booking->id }}</option>
                                @endforeach
                            </select>
                            @error('booking_id')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">
                                Update Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
