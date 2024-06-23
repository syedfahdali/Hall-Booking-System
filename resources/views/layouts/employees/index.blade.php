@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Employees</h2>
        <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg mb-4 inline-block">Add Employee</a>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Hall</th>
                    <th class="px-4 py-2">Manager</th>
                    <th class="px-4 py-2">Shift</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="border px-4 py-2">{{ $employee->name }}</td>
                        <td class="border px-4 py-2">{{ $employee->hall->type }}</td>
                        <td class="border px-4 py-2">{{ $employee->manager->name }}</td>
                        <td class="border px-4 py-2">{{ $employee->shift }}</td>
                        <td class="border px-4 py-2">{{ $employee->phone }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('employees.show', $employee->id) }}" class="bg-green-500 text-white py-1 px-3 rounded-lg">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
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
