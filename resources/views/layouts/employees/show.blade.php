<!-- resources/views/employees/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Employee Details</h2>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Hall:</label>
            <p class="text-gray-700">{{ $employee->hall->type }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Manager:</label>
            <p class="text-gray-700">{{ $employee->manager->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Shift:</label>
            <p class="text-gray-700">{{ $employee->shift }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
            <p class="text-gray-700">{{ $employee->phone }}</p>
        </div>
        <a href="{{ route('employees.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Back to Employees
        </a>
    </div>
</div>
@endsection
