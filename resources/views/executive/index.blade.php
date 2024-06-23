@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6">Executive Section</h1>

        <!-- Owners Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Owners</h2>
            <a href="{{ route('executive.create_owner') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">Create New Owner</a>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Name</th>
                        <th class="px-4 py-2 border-b">Phone</th>
                        <th class="px-4 py-2 border-b">Managers</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td class="border px-4 py-2">{{ $owner->name }}</td>
                            <td class="border px-4 py-2">{{ $owner->phone }}</td>
                            <td class="border px-4 py-2">
                                <ul>
                                    @foreach($owner->managers as $manager)
                                        <li>{{ $manager->name }} - {{ $manager->email }} - {{ $manager->phone }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('executive.destroy_owner', $owner->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Managers Section -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Managers</h2>
            <a href="{{ route('executive.create_manager') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">Create New Manager</a>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Name</th>
                        <th class="px-4 py-2 border-b">Email</th>
                        <th class="px-4 py-2 border-b">Phone</th>
                        <th class="px-4 py-2 border-b">Owner</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($managers as $manager)
                        <tr>
                            <td class="border px-4 py-2">{{ $manager->name }}</td>
                            <td class="border px-4 py-2">{{ $manager->email }}</td>
                            <td class="border px-4 py-2">{{ $manager->phone }}</td>
                            <td class="border px-4 py-2">{{ $manager->owner->name }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('executive.destroy_manager', $manager->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
