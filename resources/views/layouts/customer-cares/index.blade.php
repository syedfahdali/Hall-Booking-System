@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Care</h1>
        <a href="{{ route('customer-cares.create') }}" class="btn btn-primary">Add Customer Care</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Hall</th>
                    <th>Employee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customerCares as $customerCare)
                    <tr>
                        <td>{{ $customerCare->hall->name }}</td>
                        <td>{{ $customerCare->employee->name }}</td>
                        <td>
                            <a href="{{ route('customer-cares.edit', $customerCare->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('customer-cares.destroy', $customerCare->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('customer-cares.show', $customerCare->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
