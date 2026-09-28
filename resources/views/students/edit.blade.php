<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student</title>

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
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
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

        .update-btn {
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
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Student</h1>

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


    <form
        action="{{ route('students.update', $student) }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        <div class="form-group">

            <label for="name">Name</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $student->name) }}"
                required
            >

        </div>


        <div class="form-group">

            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $student->email) }}"
                required
            >

        </div>


        <div class="form-group">

            <label for="phone">Phone</label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $student->phone) }}"
            >

        </div>


        <div class="form-group">

            <label for="dob">Date of Birth</label>

            <input
                type="date"
                id="dob"
                name="dob"
                value="{{ old('dob', $student->dob) }}"
            >

        </div>


        <div class="form-group">

            <label for="address">Address</label>

            <textarea
                id="address"
                name="address"
            >{{ old('address', $student->address) }}</textarea>

        </div>


        <button type="submit" class="btn update-btn">
            Update Student
        </button>

        <a
            href="{{ route('students.index') }}"
            class="btn back-btn"
        >
            Cancel
        </a>

    </form>

</div>

</body>
</html>