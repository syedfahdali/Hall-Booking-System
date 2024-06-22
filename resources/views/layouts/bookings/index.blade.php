<!-- resources/views/bookings/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Bookings</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Hall</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="border px-4 py-2">{{ $booking->id }}</td>
                        <td class="border px-4 py-2">{{ $booking->hall->type }}</td>
                        <td class="border px-4 py-2">{{ $booking->user->name }}</td>
                        <td class="border px-4 py-2">{{ $booking->price }}</td>
                        <td class="border px-4 py-2">{{ $booking->location }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('bookings.show', $booking->id) }}" class="bg-green-500 text-white py-1 px-3 rounded-lg">View</a>
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg">Edit</a>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
