@extends('layouts.app')

@section('content')
    <h1>Create Payroll Record</h1>
    <form action="{{ route('payrolls.store') }}" method="POST">
        @csrf
        <div>
            <label for="employee_id">Employee:</label>
            <select id="employee_id" name="employee_id" required>
                <option value="" disabled selected>Select Employee</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
            @error('employee_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="basic_salary">Basic Salary:</label>
            <input type="number" id="basic_salary" name="basic_salary" value="{{ old('basic_salary') }}" required>
            @error('basic_salary')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="payment_date">Payment Date:</label>
            <input type="date" name="payment_date" value="{{ old('payment_date') }}" required>
            @error('payment_date')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn" type="submit">Save</button>

        @if ($errors->has('error'))
            <div style="color: red;">
                {{ $errors->first('error') }}
            </div>

        @endif
       
    </form>
@endsection
