<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation and sanitization
        $validated = $request->validate([
            'student_lrn' => 'required|string|max:12|unique:students,student_lrn',
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'age' => 'required|integer|min:1|max:100',
            'year_level' => 'required|string|max:15',
            'section' => 'required|string|max:30',
        ]);

        // Check for duplicate first_name and last_name combination
        $existingStudent = Student::where('first_name', $validated['first_name'])
            ->where('last_name', $validated['last_name'])
            ->first();

        if ($existingStudent) {
            return back()->withErrors([
                'first_name' => 'A student with this first name and last name combination already exists.',
                'last_name' => 'A student with this first name and last name combination already exists.',
            ])->withInput();
        }

        // Sanitize inputs
        foreach ($validated as $key => $value) {
            if ($value !== null) {
                $validated[$key] = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
            }
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        // Validation and sanitization
        $validated = $request->validate([
            'student_lrn' => 'required|string|max:12|unique:students,student_lrn,' . $id,
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'age' => 'required|integer|min:1|max:100',
            'year_level' => 'required|string|max:15',
            'section' => 'required|string|max:30',
        ]);

        // Check for duplicate first_name and last_name combination (excluding current student)
        $existingStudent = Student::where('first_name', $validated['first_name'])
            ->where('last_name', $validated['last_name'])
            ->where('id', '!=', $id)
            ->first();

        if ($existingStudent) {
            return back()->withErrors([
                'first_name' => 'A student with this first name and last name combination already exists.',
                'last_name' => 'A student with this first name and last name combination already exists.',
            ])->withInput();
        }

        // Sanitize inputs
        foreach ($validated as $key => $value) {
            if ($value !== null) {
                $validated[$key] = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
            }
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
