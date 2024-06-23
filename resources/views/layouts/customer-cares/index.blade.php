@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Customer Care</h2>
        <a href="{{ route('customer-cares.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg mb-4 inline-block">Add Customer Care</a>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">Hall</th>
                    <th class="px-4 py-2">Employee</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customerCares as $customerCare)
                    <tr>
                        <td class="border px-4 py-2">{{ $customerCare->hall->name }}</td>
                        <td class="border px-4 py-2">{{ $customerCare->employee->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('customer-cares.show', $customerCare->id) }}" class="bg-green-500 text-white py-1 px-3 rounded-lg">View</a>
                            <a href="{{ route('customer-cares.edit', $customerCare->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg">Edit</a>
                            <form action="{{ route('customer-cares.destroy', $customerCare->id) }}" method="POST" class="inline">
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
