<?php
// logout.php
// Destroys session and sends user back to login page.

session_start();
$_SESSION = array();
session_destroy();

header('Location: ../pages/login.php?success=' . urlencode('You have been logged out.'));
exit();
