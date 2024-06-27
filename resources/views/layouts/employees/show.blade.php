@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg">
        <div class="bg-blue-600 text-white text-lg font-bold p-4 rounded-t-lg">Payment Details</div>
        <div class="p-6">
            <div class="mb-4">
                <strong>ID:</strong> {{ $payment->id }}
            </div>
            <div class="mb-4">
                <strong>Status:</strong> {{ $payment->status }}
            </div>
            <div class="mb-4">
                <strong>Booking ID:</strong> {{ $payment->booking->id }}
            </div>
            <div class="flex justify-end">
                <a href="{{ route('payments.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-600">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
