@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reports and Analytics</title>
    </head>
    <body>
        <h1>Reports and Analytics</h1>
    
        <div>
            <h2>Employee Data</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Basic Salary</th>
                        <th>Bonus</th>
                        <th>Deductions</th>
                        <th>Net Salary</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        @php
                            $payroll = $employee->payrolls->last(); // Get the latest payroll record for the employee
                        @endphp
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->age }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->department->name ?? 'N/A' }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $payroll->basic_salary ?? 'N/A' }}</td>
                            <td>{{ $payroll->bonus ?? 'N/A' }}</td>
                            <td>{{ $payroll->deductions ?? 'N/A' }}</td>
                            <td>{{ $payroll->net_salary ?? 'N/A' }}</td>
                            <td>{{ $payroll->payment_date ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <div style="margin-top: 20px;">
            <a href="{{ route('reports.export.pdf') }}" class="btn btn-primary">Export PDF</a>
        </div>
    </body>
    </html>
@endsection
