<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Course Management</title>

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
            margin-bottom: 20px;
        }

        .student-btn {
            background: #6b7280;
            margin-left: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .actions a {
            margin-right: 8px;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
            border: none;
            padding: 7px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Course Management</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('courses.create') }}" class="btn">
        + Add Course
    </a>

    <a href="{{ route('students.index') }}" class="btn student-btn">
        Student Management
    </a>


    @if($courses->count() > 0)

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($courses as $course)

                    <tr>

                        <td>
                            {{ $course->id }}
                        </td>

                        <td>
                            {{ $course->course_name }}
                        </td>

                        <td>
                            {{ $course->course_code }}
                        </td>

                        <td>
                            {{ $course->description ?? 'N/A' }}
                        </td>

                        <td class="actions">

                            <a href="{{ route('courses.show', $course) }}">
                                View
                            </a>

                            <a href="{{ route('courses.edit', $course) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('courses.destroy', $course) }}"
                                method="POST"
                                style="display:inline;"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this course?')"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>No courses found.</p>

    @endif

</div>

</body>
</html>