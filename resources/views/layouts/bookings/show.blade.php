<!-- resources/views/bookings/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Booking Details</h2>
        <p><strong>Hall:</strong> {{ $booking->hall->name }}</p>
        <p><strong>User:</strong> {{ $booking->user->name }}</p>
        <p><strong>Price:</strong> {{ $booking->price }}</p>
        <p><strong>Location:</strong> {{ $booking->location }}</p>
        <p><strong>Created At:</strong> {{ $booking->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $booking->updated_at }}</p>

        <div class="mt-4">
            <a href="{{ route('bookings.index') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">Back to List</a>
        </div>
    </div>
</div>
@endsection
