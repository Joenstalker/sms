# 🎓 School Management System (SMS) - Student Module

A complete RESTful CRUD application for managing students in a school system, built with **Laravel 11** and **Bootstrap 5**. This application follows the **MVC (Model-View-Controller)** design pattern with full validation, sanitization, and a user-friendly web interface.

## ✨ Features

- ✅ **Complete CRUD Operations** - Create, Read, Update, Delete students
- ✅ **Input Validation** - Comprehensive form validation with custom error messages
- ✅ **Data Sanitization** - HTML encoding and trimming for security
- ✅ **Responsive UI** - Modern Bootstrap 5 interface
- ✅ **RESTful API** - JSON API endpoints for all operations
- ✅ **Database Migrations** - Laravel Schema Builder with proper column types
- ✅ **Resource Controller** - RESTful routing with 7 standard methods
- ✅ **Flash Messages** - User feedback on successful operations
- ✅ **Error Handling** - Proper validation error display

---

## 📋 Requirements

Before installation, ensure you have:

- **PHP** >= 8.2
- **Composer** (PHP dependency manager)
- **MySQL** or **MariaDB** database
- **Node.js** (optional, for frontend assets)
- **Git** (optional, for cloning the repository)

---

## 🚀 Installation Guide

### Step 1: Clone the Repository

```bash
git clone https://github.com/Joenstalker/sms.git
cd sms/sms-app
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

### Step 3: Create Environment File

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Or on Windows:

```bash
copy .env.example .env
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Configure Database

Edit `.env` file and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sms_app
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Create the database** using MySQL:

```sql
CREATE DATABASE sms_app;
```

### Step 6: Run Migrations

```bash
php artisan migrate
```

This will create all necessary tables including the `students` table with the following columns:
- `id` - Auto-increment primary key
- `student_lrn` - Unique Student Learning Reference Number (12 chars)
- `first_name` - First name (30 chars)
- `middle_name` - Middle name (30 chars, nullable)
- `last_name` - Last name (30 chars)
- `age` - Student age (integer)
- `year_level` - Year level in school (15 chars)
- `section` - Class section (30 chars)
- `timestamps` - Created at & Updated at timestamps

### Step 7: (Optional) Seed Database with Test Data

```bash
php artisan db:seed
```

This will populate the database with sample student records.

### Step 8: Start the Development Server

```bash
php artisan serve
```

The application will be available at: **http://127.0.0.1:8000**

---

## 📖 Web Interface Usage

### Access the Application

Visit `http://127.0.0.1:8000/students` in your browser.

### 1. View All Students

- **URL:** `http://127.0.0.1:8000/students`
- Displays a table of all students in the database
- Shows actions: View, Edit, Delete for each student

### 2. Create a New Student

1. Click **"Add New Student"** button
2. Fill in the form with student details:
   - **Student LRN** (required, max 12 chars, unique)
   - **First Name** (required, max 30 chars)
   - **Middle Name** (optional, max 30 chars)
   - **Last Name** (required, max 30 chars)
   - **Age** (required, 1-100)
   - **Year Level** (required, max 15 chars)
   - **Section** (required, max 30 chars)
3. Click **"Create Student"** button
4. Success message will appear with redirect to student list

### 3. View Student Details

1. Click **"View"** button next to a student
2. See all student information on a detailed page
3. Option to: Edit, Delete, or Go Back to List

### 4. Edit Student Information

1. Click **"Edit"** button next to a student
2. Update any field with new information
3. Click **"Update Student"** button
4. Success message will appear

### 5. Delete a Student

1. Click **"Delete"** button next to a student
2. Confirm deletion in the confirmation dialog
3. Student will be removed from the database

---

## 🔌 REST API Endpoints

The application provides full RESTful API access to student data in JSON format.

### Base URL
```
http://127.0.0.1:8000/api/students
```

### API Endpoints

#### 1. Get All Students
```
GET /api/students
```

**Response:** 200 OK
```json
[
  {
    "id": 1,
    "student_lrn": "202400000001",
    "first_name": "John",
    "middle_name": "Paul",
    "last_name": "Doe",
    "age": 16,
    "year_level": "Grade 10",
    "section": "A",
    "created_at": "2026-02-21T06:32:12.000000Z",
    "updated_at": "2026-02-21T06:32:12.000000Z"
  }
]
```

#### 2. Get Single Student
```
GET /api/students/{id}
```

**Example:**
```
GET /api/students/1
```

**Response:** 200 OK
```json
{
  "id": 1,
  "student_lrn": "202400000001",
  "first_name": "John",
  "middle_name": "Paul",
  "last_name": "Doe",
  "age": 16,
  "year_level": "Grade 10",
  "section": "A",
  "created_at": "2026-02-21T06:32:12.000000Z",
  "updated_at": "2026-02-21T06:32:12.000000Z"
}
```

#### 3. Create New Student
```
POST /api/students
Content-Type: application/json

{
  "student_lrn": "202400000002",
  "first_name": "Jane",
  "middle_name": "Marie",
  "last_name": "Smith",
  "age": 15,
  "year_level": "Grade 9",
  "section": "B"
}
```

**Response:** 201 Created
```json
{
  "id": 2,
  "student_lrn": "202400000002",
  "first_name": "Jane",
  "middle_name": "Marie",
  "last_name": "Smith",
  "age": 15,
  "year_level": "Grade 9",
  "section": "B",
  "created_at": "2026-02-21T10:15:30.000000Z",
  "updated_at": "2026-02-21T10:15:30.000000Z"
}
```

#### 4. Update Student
```
PUT /api/students/{id}
Content-Type: application/json

{
  "student_lrn": "202400000001",
  "first_name": "Jonathan",
  "middle_name": "Paul",
  "last_name": "Doe",
  "age": 17,
  "year_level": "Grade 11",
  "section": "A"
}
```

**Response:** 200 OK
```json
{
  "id": 1,
  "student_lrn": "202400000001",
  "first_name": "Jonathan",
  "middle_name": "Paul",
  "last_name": "Doe",
  "age": 17,
  "year_level": "Grade 11",
  "section": "A",
  "created_at": "2026-02-21T06:32:12.000000Z",
  "updated_at": "2026-02-21T10:20:45.000000Z"
}
```

#### 5. Delete Student
```
DELETE /api/students/{id}
```

**Example:**
```
DELETE /api/students/1
```

**Response:** 204 No Content

---

## 📡 API Testing with cURL

### Get All Students
```bash
curl -X GET http://127.0.0.1:8000/api/students
```

### Create a Student
```bash
curl -X POST http://127.0.0.1:8000/api/students \
  -H "Content-Type: application/json" \
  -d '{
    "student_lrn": "202400000003",
    "first_name": "Michael",
    "middle_name": "James",
    "last_name": "Johnson",
    "age": 16,
    "year_level": "Grade 10",
    "section": "C"
  }'
```

### Get Specific Student
```bash
curl -X GET http://127.0.0.1:8000/api/students/1
```

### Update a Student
```bash
curl -X PUT http://127.0.0.1:8000/api/students/1 \
  -H "Content-Type: application/json" \
  -d '{
    "student_lrn": "202400000001",
    "first_name": "Updated Name",
    "age": 18
  }'
```

### Delete a Student
```bash
curl -X DELETE http://127.0.0.1:8000/api/students/1
```

---

## 🛡️ Validation Rules

All API and form requests are validated with these rules:

| Field | Rules |
|-------|-------|
| `student_lrn` | Required, String, Max 12 chars, Unique in database |
| `first_name` | Required, String, Max 30 chars |
| `middle_name` | Optional, String, Max 30 chars |
| `last_name` | Required, String, Max 30 chars |
| `age` | Required, Integer, Min 1, Max 100 |
| `year_level` | Required, String, Max 15 chars |
| `section` | Required, String, Max 30 chars |

### Validation Error Response
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "student_lrn": [
      "The student lrn field is required."
    ],
    "age": [
      "The age must be between 1 and 100."
    ]
  }
}
```

---

## 🔐 Security Features

1. **CSRF Protection** - All forms include CSRF tokens
2. **Input Sanitization** - `htmlspecialchars()` encoding prevents XSS attacks
3. **SQL Injection Prevention** - Laravel's Eloquent ORM uses parameterized queries
4. **Data Validation** - Server-side validation of all inputs
5. **Database Integrity** - Unique constraints on Student LRN

---

## 📁 Project Structure

```
sms-app/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── StudentController.php
│   └── Models/
│       └── Student.php
├── database/
│   ├── migrations/
│   │   └── 2026_02_21_063212_create_students_table.php
│   └── seeders/
│       └── StudentSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── students/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
├── routes/
│   └── web.php
├── .env
├── composer.json
└── README.md
```

---

## 🐛 Troubleshooting

### Database Connection Error
```
Error: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost'
```
**Solution:** Check your `.env` file database credentials match your MySQL setup.

### Key Generation Error
**Solution:** Run `php artisan key:generate`

### Migration Errors
**Solution:** Ensure database exists and is created before running migrations.

### 404 Not Found
**Solution:** Make sure the server is running with `php artisan serve`

---

## 📝 License

This project is open-source and available under the MIT license.

---

## 👨‍💻 Contributing

Contributions are welcome! Feel free to fork the repository and submit pull requests.

---

## 📞 Support

For issues or questions, please create an issue in the [GitHub repository](https://github.com/Joenstalker/sms).

---

**Built with ❤️ using Laravel & Bootstrap**

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
