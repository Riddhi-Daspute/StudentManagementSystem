<?php

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {

    $studentCount = Student::count();
    $courseCount = Course::count();
    $enrollmentCount = Enrollment::count();

    return view('dashboard', compact(
        'studentCount',
        'courseCount',
        'enrollmentCount'
    ));
})->name('dashboard');

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);

Route::get('/enrollments', [EnrollmentController::class, 'index'])
    ->name('enrollments.index');

Route::get('/enrollments/create', [EnrollmentController::class, 'create'])
    ->name('enrollments.create');

Route::post('/enrollments', [EnrollmentController::class, 'store'])
    ->name('enrollments.store');

Route::delete(
    '/students/{student}/courses/{course}',[EnrollmentController::class, 'destroy'])
    ->name('enrollments.destroy');