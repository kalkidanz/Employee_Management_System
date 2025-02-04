@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
   
    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $employee->name }}" required>
        </div>
        <div class="radio">
            <label for="gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" {{ $employee->gender == 'Male' ? 'checked' : '' }} required> Male
            <input type="radio" id="female" name="gender" value="Female" {{ $employee->gender == 'Female' ? 'checked' : '' }} required> Female
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" min = "0" id="age" name="age" value="{{ $employee->age }}" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ $employee->phone }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $employee->email }}" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required value="{{ $employee->address }}"></textarea>
        </div>
        <div>
            <label for="department_id">Department:</label>
            <select id="department_id" name="department_id" required>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select></div>
        <div>
            <label for="position">Position:</label>
            <select id="position" name="position" required>
                <option value="Manager" {{ old('position', $employee->position) == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Developer" {{ old('position', $employee->position) == 'Developer' ? 'selected' : '' }}>Developer</option>
                <option value="HR" {{ old('position', $employee->position) == 'HR' ? 'selected' : '' }}>HR</option>
            </select></div>
            
        <button  class="btn" type="submit">Update Employee</button>
    </form>
@endsection

  