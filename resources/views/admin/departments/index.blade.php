
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Departments</h1>
        @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
        <button><a href="/admin/departments/create">Add New Department</a></button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->description }}</td>
                 
                        <td>
                            <button class="action">
                            <a  href="{{ route('departments.edit', $department->id) }}">Edit</a>
                            </button>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
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
    