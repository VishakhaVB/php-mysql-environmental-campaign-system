<?php
// contact_submit.php
// Stores contact inquiry form data into MySQL.

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php?error=' . urlencode('Please login first.'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/contact.php');
    exit();
}

require_once __DIR__ . '/db.php';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    header('Location: ../pages/contact.php?error=' . urlencode('Please fill all required fields.'));
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../pages/contact.php?error=' . urlencode('Please enter a valid email address.'));
    exit();
}

$insertSql = 'INSERT INTO contact_inquiries (name, email, message) VALUES (?, ?, ?)';
$stmt = mysqli_prepare($conn, $insertSql);

if (!$stmt) {
    mysqli_close($conn);
    header('Location: ../pages/contact.php?error=' . urlencode('Could not submit inquiry. Please try again.'));
    exit();
}

mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $message);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

if ($ok) {
    header('Location: ../pages/contact.php?success=' . urlencode('Your inquiry has been sent successfully.'));
    exit();
}

header('Location: ../pages/contact.php?error=' . urlencode('Could not save inquiry data.'));
exit();
