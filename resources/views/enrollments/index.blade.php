<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Enrollment Management</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 8px;
            margin-bottom: 20px;
        }

        .back-btn {
            background: #6b7280;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
            border: none;
            padding: 7px 10px;
            border-radius: 4px;
            cursor: pointer;
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

    <h1>Enrollment Management</h1>

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <a
        href="{{ route('enrollments.create') }}"
        class="btn"
    >
        + Assign Courses
    </a>


    <a
        href="{{ route('students.index') }}"
        class="btn back-btn"
    >
        Student Management
    </a>


    @if($enrollments->count() > 0)

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Course Code</th>
                    <th>Enrollment Date</th>
                    <th>Action</th>
                </tr>

            </thead>


            <tbody>

                @foreach($enrollments as $enrollment)

                    <tr>

                        <td>
                            {{ $enrollment->id }}
                        </td>

                        <td>
                            {{ $enrollment->student->name }}
                        </td>

                        <td>
                            {{ $enrollment->course->course_name }}
                        </td>

                        <td>
                            {{ $enrollment->course->course_code }}
                        </td>

                        <td>
                            {{ $enrollment->enrollment_date }}
                        </td>

                        <td>

                            <form
                                action="{{ route('enrollments.destroy', [$enrollment->student, $enrollment->course]) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-btn"
                                    onclick="return confirm('Remove this enrollment?')"
                                >
                                    Remove
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>No enrollments found.</p>

    @endif

</div>

</body>

</html>