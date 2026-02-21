@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Student</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fix the following errors:
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="student_lrn" class="form-label">Student LRN <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('student_lrn') is-invalid @enderror" id="student_lrn" name="student_lrn" maxlength="12" value="{{ old('student_lrn') }}" required>
                            @error('student_lrn')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" maxlength="30" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name" maxlength="30" value="{{ old('middle_name') }}">
                            @error('middle_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" maxlength="30" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" min="1" max="100" value="{{ old('age') }}" required>
                            @error('age')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="year_level" class="form-label">Year Level <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('year_level') is-invalid @enderror" id="year_level" name="year_level" maxlength="15" value="{{ old('year_level') }}" required>
                            @error('year_level')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="section" class="form-label">Section <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('section') is-invalid @enderror" id="section" name="section" maxlength="30" value="{{ old('section') }}" required>
                            @error('section')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Create Student</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
