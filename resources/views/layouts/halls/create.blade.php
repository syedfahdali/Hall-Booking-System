@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-center">Upload Hall Information</h2>

                <form method="POST" action="{{ route('halls.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input id="type" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('type') border-red-500 @enderror" name="type" value="{{ old('type') }}" required autofocus>
                        @error('type')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity</label>
                        <input id="capacity" type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('capacity') border-red-500 @enderror" name="capacity" value="{{ old('capacity') }}" required>
                        @error('capacity')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                        <input id="location" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('location') border-red-500 @enderror" name="location" value="{{ old('location') }}" required>
                        @error('location')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input id="price" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price') border-red-500 @enderror" name="price" value="{{ old('price') }}" required>
                        @error('price')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="availability" class="block text-gray-700 text-sm font-bold mb-2">Availability</label>
                        <select id="availability" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('availability') border-red-500 @enderror" name="availability" required>
                            <option value="1" {{ old('availability') == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('availability') == '0' ? 'selected' : '' }}>Not Available</option>
                        </select>
                        @error('availability')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                        <input id="image" type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" name="image" required>
                        @error('image')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-0 flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
