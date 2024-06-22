<!-- resources/views/halls/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Halls</h1>
    <a href="{{ route('halls.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Register a New Hall</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($halls as $hall)
            <div class="max-w-sm rounded-lg overflow-hidden shadow-xl">
                <img src="{{ $hall->image_url }}" class="w-full" alt="{{ $hall->type }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $hall->type }}</div>
                    <p class="text-gray-700 text-base mb-2">Capacity: {{ $hall->capacity }}</p>
                    <p class="text-gray-700 text-base mb-2">Location: {{ $hall->location }}</p>
                    <p class="text-gray-700 text-base mb-2">Price: ${{ $hall->price }}</p>
                    <p class="text-gray-700 text-base mb-2">Availability: {{ $hall->availability ? 'Available' : 'Not Available' }}</p>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('halls.show', $hall->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
