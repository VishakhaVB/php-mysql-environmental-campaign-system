<?php
// volunteer_submit.php
// Stores volunteer registration form data into MySQL.

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php?error=' . urlencode('Please login first.'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/volunteer.php');
    exit();
}

require_once __DIR__ . '/db.php';

$fullName = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$skill = trim($_POST['skill'] ?? '');
$motivation = trim($_POST['motivation'] ?? '');

if ($fullName === '' || $email === '' || $phone === '' || $skill === '') {
    header('Location: ../pages/volunteer.php?error=' . urlencode('Please fill all required fields.'));
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../pages/volunteer.php?error=' . urlencode('Please enter a valid email address.'));
    exit();
}

$insertSql = 'INSERT INTO volunteer_registrations (full_name, email, phone, skill, motivation) VALUES (?, ?, ?, ?, ?)';
$stmt = mysqli_prepare($conn, $insertSql);

if (!$stmt) {
    mysqli_close($conn);
    header('Location: ../pages/volunteer.php?error=' . urlencode('Could not submit registration. Please try again.'));
    exit();
}

mysqli_stmt_bind_param($stmt, 'sssss', $fullName, $email, $phone, $skill, $motivation);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

if ($ok) {
    header('Location: ../pages/volunteer.php?success=' . urlencode('Volunteer registration submitted successfully.'));
    exit();
}

header('Location: ../pages/volunteer.php?error=' . urlencode('Could not save volunteer data.'));
exit();
