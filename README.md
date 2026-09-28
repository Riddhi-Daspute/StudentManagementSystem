# Student Management System

## Project Title

Student Management System

## Objective

A Laravel-based web application for managing students, courses, and
enrollments. The project demonstrates CRUD operations, student profile
editing, course assignment, and a many-to-many relationship using a
pivot table.

## Features

### Student Management

-   Add, view, edit, and delete students
-   View individual student profiles
-   Manage name, email, phone, date of birth, and address

### Course Management

-   Add, view, edit, and delete courses
-   Manage course name, course code, and description

### Enrollment Management

-   Assign one or multiple courses to a student
-   View enrolled courses
-   Remove courses from a student
-   Store enrollment date

### Many-to-Many Relationship

Students and courses are connected through the `enrollments` pivot
table.

The pivot table contains: - `student_id` - `course_id` -
`enrollment_date`

### Dashboard

The dashboard displays: - Total Students - Total Courses - Total
Enrollments - Quick navigation to the main modules

## Technology Stack

-   **Backend:** Laravel 13
-   **Language:** PHP
-   **Database:** MySQL
-   **Frontend:** Blade, HTML, CSS
-   **ORM:** Laravel Eloquent
-   **Version Control:** Git & GitHub

## Database Tables

  Table           Purpose
  --------------- ---------------------------------------------
  `students`      Stores student information
  `courses`       Stores course information
  `enrollments`   Pivot table connecting students and courses

## Installation & Setup

### 1. Clone the repository

``` bash
git clone https://github.com/Riddhi-Daspute/StudentManagementSystem.git
```

### 2. Open the project

``` bash
cd StudentManagementSystem
```

### 3. Install dependencies

``` bash
composer install
```

### 4. Configure the database

Create a MySQL database named `student_management`.

Update the database details in the `.env` file.

### 5. Generate application key

``` bash
php artisan key:generate
```

### 6. Run migrations

``` bash
php artisan migrate
```

### 7. Start the Laravel server

``` bash
php artisan serve
```

Open the application at:

`http://127.0.0.1:8000`

## Project Status

The required case-study features have been implemented successfully,
including student management, course management, enrollment management,
student profile editing, course assignment, and the many-to-many
relationship using a pivot table.

## GitHub Repository

https://github.com/Riddhi-Daspute/StudentManagementSystem
