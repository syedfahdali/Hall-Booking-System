@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-blue-600 text-white text-lg font-bold p-4 rounded-t-lg">Book Hall</div>
                <div class="p-6">
                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf

                        <input type="hidden" name="hall_id" value="{{ $hall->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                            <input id="price" type="text" class="w-full p-3 border border-gray-300 rounded-lg @error('price') border-red-500 @enderror" name="price" value="{{ $hall->price }}" readonly>
                            @error('price')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 font-medium mb-2">Location</label>
                            <input id="location" type="text" class="w-full p-3 border border-gray-300 rounded-lg @error('location') border-red-500 @enderror" name="location" value="{{ $hall->location }}" readonly>
                            @error('location')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
