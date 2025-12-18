OOP Student Registration (PHP + MySQL)
Simple PHP CRUD app for student records (name, email, phone, photo, address). Built for XAMPP / Apache + MySQL. Uses procedural PHP with a minimal Register class for DB interactions.

Features

Add, edit, delete, and list students
Photo upload to uploads
Minimal Bootstrap UI
Prerequisites

PHP 7.4+ (XAMPP recommended)
MySQL / MariaDB
Apache (via XAMPP)

Quick Setup

Start Apache and MySQL (XAMPP).
Create a database (e.g., oop_db) and import the table below.
Place this project in XAMPP htdocs (e.g., oop).
Open in browser: http://localhost/oop/
Database
Run this SQL to create the table used by the app:

CREATE TABLE tbl_register (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(50) DEFAULT NULL,
  photo VARCHAR(255) DEFAULT NULL,
  address TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Configure DB connection in:

config.php:1-400 (ensure credentials and DB name match)
Usage

Browse to http://localhost/oop/ to view all students.
Use Add Student (addstd.php) to create new entries.
Use Edit (edit.php?id=...) to update a student (you can keep existing photo).
Delete via the list page.

Important Files

Entry: index.php list / actions
Add form: addstd.php
Edit form: edit.php
Uploader folder: uploads/ — store uploaded photos
Register class: register.php — DB methods (registerUser, addRegister, getStudentById, updateStudent, allStudents)
DB helper: database.php
Config: config.php

Notes & Recommendations

The updateStudent method should accept form data and optional file upload; leave the photo input optional in edit.php to retain existing photos.
Validate and sanitize inputs before inserting/updating in production.
Restrict allowed file types and limit file size for uploads.
Consider using prepared statements (already used) and stronger error handling/logging.
Contributing

Open an issue or send a PR with improvements (file validation, CSRF protection, modern framework refactor).

License

MIT 
