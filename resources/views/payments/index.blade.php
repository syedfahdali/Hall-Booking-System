@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Payments</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
@foreach($payments as $payment)
    <div class="max-w-sm rounded-lg overflow-hidden shadow-xl">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Payment ID: {{ $payment->id }}</div>
            <p class="text-gray-700 text-base mb-2">Booking ID: {{ $payment->booking_id }}</p>
            <p class="text-gray-700 text-base mb-2">Status: {{ $payment->status }}</p>
        </div>
        <div class="px-6 py-4">
            <a href="{{ route('payments.show', $payment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">View Details</a>
        </div>
    </div>
@endforeach


    </div>
</div>
@endsection
