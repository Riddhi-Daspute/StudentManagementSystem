<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Course Details</title>

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

        .student {
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
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Course Details</h1>

        <div class="detail">
            <div class="label">Course ID</div>
            <div class="value">
                {{ $course->id }}
            </div>
        </div>

        <div class="detail">
            <div class="label">Course Name</div>
            <div class="value">
                {{ $course->course_name }}
            </div>
        </div>

        <div class="detail">
            <div class="label">Course Code</div>
            <div class="value">
                {{ $course->course_code }}
            </div>
        </div>

        <div class="detail">
            <div class="label">Description</div>
            <div class="value">
                {{ $course->description ?? 'Not provided' }}
            </div>
        </div>

    </div>


    <div class="card">

        <h2>Enrolled Students</h2>

        @if($course->students->count() > 0)

            @foreach($course->students as $student)

                <div class="student">

                    <strong>
                        {{ $student->name }}
                    </strong>

                    <br>

                    <small>
                        Email: {{ $student->email }}
                    </small>

                </div>

            @endforeach

        @else

            <p>No students enrolled yet.</p>

        @endif

    </div>


    <a
        href="{{ route('courses.index') }}"
        class="btn back-btn"
    >
        ← Back to Courses
    </a>

    <a
        href="{{ route('courses.edit', $course) }}"
        class="btn edit-btn"
    >
        Edit Course
    </a>

</div>

</body>
</html>