<!-- resources/views/bookings/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-blue-600 text-white text-lg font-bold p-4 rounded-t-lg">Edit Booking</div>
                <div class="p-6">
                    <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="hall_id" class="block text-gray-700 font-medium mb-2">Hall</label>
                            <select id="hall_id" class="w-full p-3 border border-gray-300 rounded-lg" name="hall_id" required>
                                @foreach($halls as $hall)
                                    <option value="{{ $hall->id }}" {{ $booking->hall_id == $hall->id ? 'selected' : '' }}>{{ $hall->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 font-medium mb-2">User</label>
                            <select id="user_id" class="w-full p-3 border border-gray-300 rounded-lg" name="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                            <input id="price" type="text" class="w-full p-3 border border-gray-300 rounded-lg" name="price" value="{{ $booking->price }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 font-medium mb-2">Location</label>
                            <input id="location" type="text" class="w-full p-3 border border-gray-300 rounded-lg" name="location" value="{{ $booking->location }}" required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
                                Update Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
