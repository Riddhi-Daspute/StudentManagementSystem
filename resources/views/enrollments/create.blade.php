<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Assign Courses</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select[multiple] {
            height: 180px;
        }

        .help-text {
            color: #666;
            font-size: 14px;
            margin-top: 6px;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .save-btn {
            background: #2563eb;
        }

        .back-btn {
            background: #6b7280;
            margin-left: 8px;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .empty {
            background: #fef3c7;
            color: #92400e;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Assign Courses to Student</h1>


    @if($errors->any())

        <div class="errors">

            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    @if($students->count() == 0 || $courses->count() == 0)

        <div class="empty">

            You need at least one student and one course
            before creating an enrollment.

        </div>

    @else

        <form
            action="{{ route('enrollments.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-group">

                <label for="student_id">
                    Select Student
                </label>

                <select
                    id="student_id"
                    name="student_id"
                    required
                >

                    <option value="">
                        -- Select Student --
                    </option>

                    @foreach($students as $student)

                        <option
                            value="{{ $student->id }}"
                            {{ old('student_id') == $student->id ? 'selected' : '' }}
                        >
                            {{ $student->name }} - {{ $student->email }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="form-group">

                <label for="course_ids">
                    Select Courses
                </label>

                <select
                    id="course_ids"
                    name="course_ids[]"
                    multiple
                    required
                >

                    @foreach($courses as $course)

                        <option
                            value="{{ $course->id }}"
                            {{ in_array($course->id, old('course_ids', [])) ? 'selected' : '' }}
                        >
                            {{ $course->course_name }}
                            ({{ $course->course_code }})
                        </option>

                    @endforeach

                </select>

                <div class="help-text">
                    Hold Ctrl (Windows) or Command (Mac)
                    to select multiple courses.
                </div>

            </div>


            <div class="form-group">

                <label for="enrollment_date">
                    Enrollment Date
                </label>

                <input
                    type="date"
                    id="enrollment_date"
                    name="enrollment_date"
                    value="{{ old('enrollment_date', date('Y-m-d')) }}"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn save-btn"
            >
                Assign Courses
            </button>


            <a
                href="{{ route('students.index') }}"
                class="btn back-btn"
            >
                Cancel
            </a>

        </form>

    @endif

</div>

</body>
</html>