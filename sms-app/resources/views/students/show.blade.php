@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Student Details</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="text-muted">ID</h5>
                            <p>{{ $student->id }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">Student LRN</h5>
                            <p>{{ $student->student_lrn }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="text-muted">First Name</h5>
                            <p>{{ $student->first_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">Middle Name</h5>
                            <p>{{ $student->middle_name ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="text-muted">Last Name</h5>
                            <p>{{ $student->last_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">Age</h5>
                            <p>{{ $student->age }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="text-muted">Year Level</h5>
                            <p>{{ $student->year_level }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">Section</h5>
                            <p>{{ $student->section }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
