@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employees</h1>
    @if (session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif
    <button ><a href="{{ route('employees.create') }}">Add New Employee</a></button>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Department</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->department->name ?? 'N/A' }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>
                        <button class="action">
                        <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                        </button>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="action" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
