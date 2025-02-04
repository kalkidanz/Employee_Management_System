@extends('layouts.app')

@section('content')
    <h1>Add New Department</h1>
   
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Department Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
    
        <div>
            <label for="description">Description (Optional):</label>
            <input type="text" name="description" id="description">
        </div>
    
    
        <button class="btn" type="submit">Create Department</button>
    </form>
    
    @endsection