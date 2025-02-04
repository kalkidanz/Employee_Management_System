@extends('layouts.app')

@section('content')
    <h1>Add New Employee</h1>
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="radio">
            <label for="gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" required> Male
            <input type="radio" id="female" name="gender" value="Female" required> Female
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" min = "0" id="age" name="age" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
        </div>
        <div>
            <label for="department_id">Department:</label>
            <select name="department_id" id="department_id" required>
                <option value="" disabled selected>Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="position">Position:</label>
            <select name="position" id="position" required>
                <option value="" disabled selected>Select Position</option>
                <option value="Manager">Manager</option>
                <option value="Team Leader">Team Leader</option>
                <option value="Advisor">Advisor</option>
                
            </select>
        </div>
        <button class="btn" type="submit">Add Employee</button>
    </form>
    @endsection

