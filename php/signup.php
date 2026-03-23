<?php
// signup.php
// Handles account creation from signup form.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/signup.php');
    exit();
}

require_once __DIR__ . '/db.php';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if ($name === '' || $email === '' || $password === '' || $confirmPassword === '') {
    header('Location: ../pages/signup.php?error=' . urlencode('All fields are required.'));
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../pages/signup.php?error=' . urlencode('Please enter a valid email address.'));
    exit();
}

if ($password !== $confirmPassword) {
    header('Location: ../pages/signup.php?error=' . urlencode('Passwords do not match.'));
    exit();
}

if (strlen($password) < 6) {
    header('Location: ../pages/signup.php?error=' . urlencode('Password must be at least 6 characters.'));
    exit();
}

$checkSql = 'SELECT id FROM users WHERE email = ? LIMIT 1';
$checkStmt = mysqli_prepare($conn, $checkSql);
mysqli_stmt_bind_param($checkStmt, 's', $email);
mysqli_stmt_execute($checkStmt);
mysqli_stmt_store_result($checkStmt);

if (mysqli_stmt_num_rows($checkStmt) > 0) {
    mysqli_stmt_close($checkStmt);
    header('Location: ../pages/signup.php?error=' . urlencode('Email already exists. Please login.'));
    exit();
}

mysqli_stmt_close($checkStmt);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$insertSql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';
$insertStmt = mysqli_prepare($conn, $insertSql);
mysqli_stmt_bind_param($insertStmt, 'sss', $name, $email, $hashedPassword);
$ok = mysqli_stmt_execute($insertStmt);
mysqli_stmt_close($insertStmt);
mysqli_close($conn);

if ($ok) {
    header('Location: ../pages/login.php?success=' . urlencode('Account created successfully. Please login.'));
    exit();
}

header('Location: ../pages/signup.php?error=' . urlencode('Could not create account. Please try again.'));
exit();
