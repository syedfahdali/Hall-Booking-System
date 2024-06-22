@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Customer Care</h1>
        <form action="{{ route('customer-cares.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="hall_id" class="form-label">Hall</label>
                <select name="hall_id" id="hall_id" class="form-control">
                    @foreach($halls as $hall)
                        <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee</label>
                <select name="employee_id" id="employee_id" class="form-control">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
