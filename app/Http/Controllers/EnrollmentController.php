<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
    * Display all enrollments.
    */
    public function index()
    {
        $enrollments = \App\Models\Enrollment::with(['student', 'course'])
            ->latest()
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }
    /**
    * Show enrollment form.
    */
    public function create()
    {
        $students = Student::orderBy('name')->get();
        $courses = Course::orderBy('course_name')->get();

        return view('enrollments.create', compact('students', 'courses'));
    }

    /**
     * Store enrollments.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_ids' => 'required|array',
            'course_ids.*' => 'exists:courses,id',
            'enrollment_date' => 'required|date',
        ]);

        $student = Student::findOrFail($validated['student_id']);

        $enrollments = [];

        foreach ($validated['course_ids'] as $courseId) {
            $enrollments[$courseId] = [
                'enrollment_date' => $validated['enrollment_date'],
            ];
        }

        $student->courses()->syncWithoutDetaching($enrollments);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Courses assigned successfully!');
    }
    /**
    * Remove a course from a student.
    */
    public function destroy(Student $student, Course $course)
    {
        $student->courses()->detach($course->id);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Course removed from student successfully!');
    }
}