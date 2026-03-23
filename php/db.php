<?php
// db.php
// Reusable database connection for all PHP backend files.

$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'login_system';
$DB_PORT = 3307;

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, null, $DB_PORT);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Create database and users table automatically for beginner-friendly setup.
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$DB_NAME`");
mysqli_select_db($conn, $DB_NAME);

$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn, $createUsersTable);

$createVolunteerTable = "CREATE TABLE IF NOT EXISTS volunteer_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    skill VARCHAR(80) NOT NULL,
    motivation TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn, $createVolunteerTable);

$createContactTable = "CREATE TABLE IF NOT EXISTS contact_inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn, $createContactTable);
