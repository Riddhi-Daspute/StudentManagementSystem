<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student</title>

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
            margin-bottom: 7px;
            font-weight: bold;
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
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .save-btn {
            background: #2563eb;
            color: white;
        }

        .back-btn {
            background: #6b7280;
            color: white;
            margin-left: 8px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .required {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Student</h1>

    {{-- Display validation errors --}}

    @if($errors->any())
        <div class="error">
            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="name">
                Name <span class="required">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter student name"
            >
        </div>

        <div class="form-group">
            <label for="email">
                Email <span class="required">*</span>
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter email address"
            >
        </div>

        <div class="form-group">
            <label for="phone">
                Phone
            </label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="Enter phone number"
            >
        </div>

        <div class="form-group">
            <label for="dob">
                Date of Birth
            </label>

            <input
                type="date"
                id="dob"
                name="dob"
                value="{{ old('dob') }}"
            >
        </div>

        <div class="form-group">
            <label for="address">
                Address
            </label>

            <textarea
                id="address"
                name="address"
                placeholder="Enter address"
            >{{ old('address') }}</textarea>
        </div>

        <button type="submit" class="btn save-btn">
            Save Student
        </button>

        <a href="{{ route('students.index') }}" class="btn back-btn">
            Back
        </a>

    </form>

</div>

</body>
</html>