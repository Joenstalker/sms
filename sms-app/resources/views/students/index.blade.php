@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Students Management</h2>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
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
                            @forelse($students as $student)
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
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No students found. <a href="{{ route('students.create') }}">Create one</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
