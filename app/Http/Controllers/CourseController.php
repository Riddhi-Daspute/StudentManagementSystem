<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display all courses.
     */
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show form to create a course.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a new course.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:50|unique:courses,course_code',
            'description' => 'nullable|string',
        ]);

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course added successfully!');
    }

    /**
     * Display a single course.
     */
    public function show(Course $course)
    {
        $course->load('students');

        return view('courses.show', compact('course'));
    }

    /**
     * Show form to edit a course.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update a course.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:50|unique:courses,course_code,' . $course->id,
            'description' => 'nullable|string',
        ]);

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    /**
     * Delete a course.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}