<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Employee Report</h1>

    <table>
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
                    
                    $payroll = $employee->payrolls->last();
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
</body>
</html>
