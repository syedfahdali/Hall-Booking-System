@extends('layouts.app')

@section('content')
<div class="bg-gray-200 min-h-screen">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-300 rounded-lg overflow-hidden shadow-xl">
            <div class="p-6 bg-blue-950 text-white">
                <h2 class="text-2xl font-semibold">{{ $hall->type }} - Details</h2>
            </div>
            <div class="p-6 sm:p-8">
                <div class="flex flex-col md:flex-row items-center justify-center md:justify-between mb-8">
                    <div class="mb-4 md:mb-0 md:w-1/2">
                        <img src="{{ asset('storage/halls/' . $hall->image) }}" alt="{{ $hall->type }}" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <div class="md:w-1/2 md:ml-8">
                        <div class="text-gray-800">
                            <p class="mb-4"><strong>Type:</strong> {{ $hall->type }}</p>
                            <p class="mb-4"><strong>Capacity:</strong> {{ $hall->capacity }}</p>
                            <p class="mb-4"><strong>Location:</strong> {{ $hall->location }}</p>
                            <p class="mb-4"><strong>Price:</strong> ${{ $hall->price }}</p>
                            <p class="mb-4"><strong>Availability:</strong> {{ $hall->availability ? 'Available' : 'Not Available' }}</p>
                        </div>
                        <div>
                            <a href="{{ route('bookings.create', ['hall_id' => $hall->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4 md:mb-0 md:mr-4">Book Now</a>
                            <a href="{{ route('halls.edit', $hall->id) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block mb-4 md:mb-0 md:mr-4">Edit</a>
                            <form action="{{ route('halls.destroy', $hall->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-4 md:mb-0">Delete</button>
                            </form>
                            <a href="{{ route('halls.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block">Back to Halls</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
