<?php
// loginform.php
// Verifies login and starts session.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/login.php');
    exit();
}

require_once __DIR__ . '/db.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    header('Location: ../pages/login.php?error=' . urlencode('Please enter email and password.'));
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../pages/login.php?error=' . urlencode('Please enter a valid email.'));
    exit();
}

$sql = 'SELECT id, name, password FROM users WHERE email = ? LIMIT 1';
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);

if (!$user || !password_verify($password, $user['password'])) {
    header('Location: ../pages/login.php?error=' . urlencode('Invalid email or password.'));
    exit();
}

session_start();
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $email;

header('Location: ../pages/homepage.php');
exit();
