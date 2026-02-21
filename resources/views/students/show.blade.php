@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Student Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">ID</th>
                            <td>{{ $student->id }}</td>
                        </tr>
                        <tr>
                            <th>Student LRN</th>
                            <td>{{ $student->student_lrn }}</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{ $student->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Middle Name</th>
                            <td>{{ $student->middle_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $student->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>{{ $student->age }}</td>
                        </tr>
                        <tr>
                            <th>Year Level</th>
                            <td>{{ $student->year_level }}</td>
                        </tr>
                        <tr>
                            <th>Section</th>
                            <td>{{ $student->section }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this student?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
