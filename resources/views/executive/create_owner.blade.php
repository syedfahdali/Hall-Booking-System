@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Create New Owner</h1>

        <!-- Form for creating a new owner -->
        <form method="POST" action="{{ route('executive.store_owner') }}" class="space-y-4">
            @csrf

            <!-- Name input field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <!-- Phone input field -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
                <input type="text" id="phone" name="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <!-- Submit button -->
            <div>
                <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Create Owner</button>
            </div>
        </form>
    </div>
</div>
@endsection
