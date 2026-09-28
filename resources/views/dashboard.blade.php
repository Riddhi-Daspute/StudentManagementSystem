<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Student Management Dashboard</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        .header {
            background: #2563eb;
            color: white;
            padding: 25px;
        }

        .header h1 {
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }

        .card h2 {
            margin: 0 0 10px;
            color: #555;
            font-size: 18px;
        }

        .number {
            font-size: 40px;
            font-weight: bold;
            color: #2563eb;
        }

        .navigation {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        .navigation h2 {
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            margin: 8px 8px 8px 0;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .course-btn {
            background: #16a34a;
        }

        .enrollment-btn {
            background: #7c3aed;
        }

    </style>

</head>


<body>

    <div class="header">

        <div class="container">

            <h1>Student Management System</h1>

            <p>
                Dashboard
            </p>

        </div>

    </div>


    <div class="container">

        <div class="cards">

            <div class="card">

                <h2>Total Students</h2>

                <div class="number">
                    {{ $studentCount }}
                </div>

            </div>


            <div class="card">

                <h2>Total Courses</h2>

                <div class="number">
                    {{ $courseCount }}
                </div>

            </div>


            <div class="card">

                <h2>Total Enrollments</h2>

                <div class="number">
                    {{ $enrollmentCount }}
                </div>

            </div>

        </div>


        <div class="navigation">

            <h2>Quick Navigation</h2>

            <a
                href="{{ route('students.index') }}"
                class="btn"
            >
                Manage Students
            </a>


            <a
                href="{{ route('courses.index') }}"
                class="btn course-btn"
            >
                Manage Courses
            </a>


            <a
                href="{{ route('enrollments.index') }}"
                class="btn enrollment-btn"
            >
                Manage Enrollments
            </a>

        </div>

    </div>

</body>

</html>