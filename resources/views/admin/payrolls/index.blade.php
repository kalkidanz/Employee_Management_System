@extends('layouts.app')

@section('content')
    <h1>Payroll Records</h1>
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <div class="container">
    <button><a href="{{ route('payrolls.create') }}">Add New Payroll</a></button>
    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Basic Salary</th>
                <th>Bonus</th>
                <th>Deductions</th>
                <th>Net Salary</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->employee->name }}</td>
                    <td>{{ $payroll->basic_salary }}</td>
                    <td>{{ $payroll->bonus }}</td>
                    <td>{{ $payroll->deductions }}</td>
                    <td>{{ $payroll->net_salary }}</td>
                    <td>{{ $payroll->payment_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
