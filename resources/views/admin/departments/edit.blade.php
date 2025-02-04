@extends('layouts.app')

@section('content')
    <h2>Edit Department</h2>
<form method="POST" action="{{ route('departments.update', $department->id) }}">
    @csrf
    @method('PUT')
    <div>
     <label for="name">Name:</label>
       <input type="text" name="name" id= "name" value="{{$department -> name}}" required>
    </div>
    <div>
    <label for="description">Description (Optional):</label>
            <input type="text" name="description" id="description"  value="{{$department -> name}}"> 
            <button  class="btn" type="submit">Update</button>
 </div>
       
   </form>
   @endsection