<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display all students.
     */
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show form to create a student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a new student.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    /**
     * Display a single student.
     */
    public function show(Student $student)
    {
        $student->load('courses');

        return view('students.show', compact('student'));
    }

    /**
     * Show form to edit a student.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update a student.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Delete a student.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}