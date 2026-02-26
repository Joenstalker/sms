@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Edit Student</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="student_lrn" class="col-sm-3 col-form-label">Student LRN</label>
                        <div class="col-sm-9">
                            <input type="text" name="student_lrn" id="student_lrn"
                                   class="form-control @error('student_lrn') is-invalid @enderror"
                                   value="{{ old('student_lrn', $student->student_lrn) }}" maxlength="12" required>
                            @error('student_lrn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" id="first_name"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   value="{{ old('first_name', $student->first_name) }}" maxlength="30" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="middle_name" class="col-sm-3 col-form-label">Middle Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="middle_name" id="middle_name"
                                   class="form-control @error('middle_name') is-invalid @enderror"
                                   value="{{ old('middle_name', $student->middle_name) }}" maxlength="30">
                            @error('middle_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" id="last_name"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   value="{{ old('last_name', $student->last_name) }}" maxlength="30" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="age" class="col-sm-3 col-form-label">Age</label>
                        <div class="col-sm-9">
                            <input type="number" name="age" id="age"
                                   class="form-control @error('age') is-invalid @enderror"
                                   value="{{ old('age', $student->age) }}" min="1" required>
                            @error('age')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="year_level" class="col-sm-3 col-form-label">Year Level</label>
                        <div class="col-sm-9">
                            <input type="text" name="year_level" id="year_level"
                                   class="form-control @error('year_level') is-invalid @enderror"
                                   value="{{ old('year_level', $student->year_level) }}" maxlength="15" required>
                            @error('year_level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="section" class="col-sm-3 col-form-label">Section</label>
                        <div class="col-sm-9">
                            <input type="text" name="section" id="section"
                                   class="form-control @error('section') is-invalid @enderror"
                                   value="{{ old('section', $student->section) }}" maxlength="30" required>
                            @error('section')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
