<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_lrn'  => 'required|string|max:12|unique:students,student_lrn',
            'first_name'   => 'required|string|max:30',
            'middle_name'  => 'nullable|string|max:30',
            'last_name'    => 'required|string|max:30',
            'age'          => 'required|integer|min:1',
            'year_level'   => 'required|string|max:15',
            'section'      => 'required|string|max:30',
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_lrn'  => 'required|string|max:12|unique:students,student_lrn,' . $student->id,
            'first_name'   => 'required|string|max:30',
            'middle_name'  => 'nullable|string|max:30',
            'last_name'    => 'required|string|max:30',
            'age'          => 'required|integer|min:1',
            'year_level'   => 'required|string|max:15',
            'section'      => 'required|string|max:30',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
