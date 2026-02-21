@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Students List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add New Student</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>LRN</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Year Level</th>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_lrn }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->middle_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->year_level }}</td>
                    <td>{{ $student->section }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info text-white">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-4">No students found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
