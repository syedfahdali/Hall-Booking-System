<!-- resources/views/halls/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="border border-gray-300 rounded-lg overflow-hidden shadow-xl">
            <div class="p-6 bg-blue-900 text-white">
                <h2 class="text-2xl font-semibold">Edit {{ $hall->type }}</h2>
            </div>
            <div class="p-6 sm:p-8">
                <form action="{{ route('halls.update', $hall->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="type" class="block text-gray-900 text-sm font-bold mb-2">Type</label>
                        <input type="text" id="type" name="type" value="{{ old('type', $hall->type) }}" class="w-full px-3 py-2 leading-tight text-gray-900 bg-gray-200 border rounded focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="capacity" class="block text-gray-900 text-sm font-bold mb-2">Capacity</label>
                        <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $hall->capacity) }}" class="w-full px-3 py-2 leading-tight text-gray-900 bg-gray-200 border rounded focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-900 text-sm font-bold mb-2">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $hall->location) }}" class="w-full px-3 py-2 leading-tight text-gray-900 bg-gray-200 border rounded focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-900 text-sm font-bold mb-2">Price ($)</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $hall->price) }}" class="w-full px-3 py-2 leading-tight text-gray-900 bg-gray-200 border rounded focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="availability" class="block text-gray-900 text-sm font-bold mb-2">Availability</label>
                        <select id="availability" name="availability" class="w-full px-3 py-2 leading-tight text-gray-900 bg-gray-200 border rounded focus:outline-none focus:shadow-outline">
                            <option value="1" {{ $hall->availability ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ !$hall->availability ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-900 text-sm font-bold mb-2">Image</label>
                        <input type="file" id="image" name="image" class="w-full px-3 py-2 leading-tight text-gray-900 bg-gray-200 border rounded focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Hall</button>
                        <a href="{{ route('halls.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
    