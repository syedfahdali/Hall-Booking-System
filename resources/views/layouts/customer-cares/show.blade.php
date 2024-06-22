@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Care Details</h1>
        <p><strong>Hall:</strong> {{ $customerCare->hall->name }}</p>
        <p><strong>Employee:</strong> {{ $customerCare->employee->name }}</p>
    </div>
@endsection
