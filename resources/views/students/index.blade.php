<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>

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

    <h1>Student Management System</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="btn">
        + Add Student
    </a>

    @if($students->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($students as $student)

                    <tr>
                        <td>{{ $student->id }}</td>

                        <td>{{ $student->name }}</td>

                        <td>{{ $student->email }}</td>

                        <td>{{ $student->phone ?? 'N/A' }}</td>

                        <td class="actions">

                            <a href="{{ route('students.show', $student) }}">
                                View
                            </a>

                            <a href="{{ route('students.edit', $student) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('students.destroy', $student) }}"
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this student?')"
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

        <p>No students found.</p>

    @endif

</div>

</body>
</html>