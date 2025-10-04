@extends('layouts.app')

@section('content')
<h1>Departments</h1>

<a href="{{ route('departments.create') }}">Create New Department</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Department Name</th>
            <th>Max Clock In Time</th>
            <th>Max Clock Out Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
        <tr>
            <td>{{ $department['id'] }}</td>
            <td>{{ $department['department_name'] }}</td>
            <td>{{ $department['max_clock_in_time'] }}</td>
            <td>{{ $department['max_clock_out_time'] }}</td>
            <td>
                <a href="{{ route('departments.edit', $department['id']) }}">Edit</a>
                <form action="{{ route('departments.destroy', $department['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection