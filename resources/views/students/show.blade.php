<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 25px;
        }

        .detail {
            margin-bottom: 18px;
        }

        .label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .value {
            font-size: 17px;
        }

        .courses {
            margin-top: 10px;
        }

        .course {
            padding: 12px;
            background: #f1f5f9;
            border-radius: 5px;
            margin-bottom: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            margin-right: 8px;
        }

        .back-btn {
            background: #6b7280;
        }

        .edit-btn {
            background: #2563eb;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
            border: none;
            padding: 7px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 8px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        <h1>Student Profile</h1>

        <div class="detail">
            <div class="label">Student ID</div>

            <div class="value">
                {{ $student->id }}
            </div>
        </div>


        <div class="detail">
            <div class="label">Name</div>

            <div class="value">
                {{ $student->name }}
            </div>
        </div>


        <div class="detail">
            <div class="label">Email</div>

            <div class="value">
                {{ $student->email }}
            </div>
        </div>


        <div class="detail">
            <div class="label">Phone</div>

            <div class="value">
                {{ $student->phone ?? 'Not provided' }}
            </div>
        </div>


        <div class="detail">
            <div class="label">Date of Birth</div>

            <div class="value">
                {{ $student->dob ?? 'Not provided' }}
            </div>
        </div>


        <div class="detail">
            <div class="label">Address</div>

            <div class="value">
                {{ $student->address ?? 'Not provided' }}
            </div>
        </div>

    </div>


    <div class="card">

        <h2>Enrolled Courses</h2>

        <div class="courses">

            @if($student->courses->count() > 0)

                @foreach($student->courses as $course)

                    <div class="course">

                        <strong>
                            {{ $course->course_name }}
                        </strong>

                        <br>

                        <small>
                            Course Code:
                            {{ $course->course_code }}
                        </small>

                        <br>

                        <form
                            action="{{ route('enrollments.destroy', [$student, $course]) }}"
                            method="POST"
                            style="display:inline;"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                                onclick="return confirm('Remove this course from the student?')"
                            >
                                Remove Course
                            </button>

                        </form>

                    </div>

                @endforeach

            @else

                <p>No courses enrolled yet.</p>

            @endif

        </div>

    </div>


    <a
        href="{{ route('students.index') }}"
        class="btn back-btn"
    >
        ← Back to Students
    </a>


    <a
        href="{{ route('students.edit', $student) }}"
        class="btn edit-btn"
    >
        Edit Student
    </a>

</div>

</body>

</html>