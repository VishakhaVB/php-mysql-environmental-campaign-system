<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: homepage.php');
    exit();
}
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup | Environmental Campaign Community</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="app-layout">
  <aside class="sidebar" id="sidebar">
    <div class="brand">EcoConnect</div>
    <a class="nav-link" href="../html/homepage.html">Home</a>
    <a class="nav-link" href="../html/login.html">Login</a>
    <a class="nav-link active" href="../html/signup.html">Signup</a>
    <a class="nav-link" href="../html/campaign.html">Campaigns</a>
    <a class="nav-link" href="../html/community.html">Community</a>
    <a class="nav-link" href="../html/volunteer.html">Volunteer</a>
    <a class="nav-link" href="../html/imapact.html">Impact</a>
    <a class="nav-link" href="../html/contact.html">Contact</a>
  </aside>

  <div class="main fade-in">
    <header class="topbar">
      <button class="mobile-menu-btn" type="button" id="menuToggle" aria-label="Toggle sidebar">☰</button>
      <strong>Create Account</strong>
      <span>New user registration</span>
    </header>

    <main class="page" style="display: grid; place-items: center; min-height: calc(100vh - 140px);">
      <section class="auth-card" style="width: 100%; max-width: 460px;">
        <h2>Create Account</h2>
        <p class="form-note">Join our environmental campaign community.</p>

        <form action="../php/signup.php" method="POST" id="signupForm" novalidate>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name">
            <div class="field-error" id="nameError"></div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <div class="field-error" id="emailError"></div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <div class="password-wrap">
              <input type="password" id="password" name="password" placeholder="Create a password">
              <button type="button" id="togglePassword">Show</button>
            </div>
            <div class="field-error" id="passwordError"></div>
          </div>

          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <div class="password-wrap">
              <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
              <button type="button" id="toggleConfirmPassword">Show</button>
            </div>
            <div class="field-error" id="confirmPasswordError"></div>
          </div>

          <button class="btn" type="submit">Sign Up</button>
        </form>

        <p class="form-note">Already have an account? <a href="login.php">Login</a></p>
        <div class="message error <?php echo $error !== '' ? 'show' : ''; ?>"><?php echo htmlspecialchars($error); ?></div>
      </section>
    </main>

    <footer class="footer">
      Contact: greenfuture@gmail.com | +91 98765 43210
    </footer>
  </div>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const appLayout = document.body;

    menuToggle.addEventListener('click', function () {
      appLayout.classList.toggle('sidebar-collapsed');
    });
  </script>

  <script>
    function attachPasswordToggle(inputId, buttonId) {
      const input = document.getElementById(inputId);
      const button = document.getElementById(buttonId);
      button.addEventListener('click', function () {
        if (input.type === 'password') {
          input.type = 'text';
          button.textContent = 'Hide';
        } else {
          input.type = 'password';
          button.textContent = 'Show';
        }
      });
    }

    attachPasswordToggle('password', 'togglePassword');
    attachPasswordToggle('confirm_password', 'toggleConfirmPassword');

    // Basic front-end validation with messages below each input.
    const signupForm = document.getElementById('signupForm');
    signupForm.addEventListener('submit', function (event) {
      let valid = true;
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm_password').value;

      document.getElementById('nameError').textContent = '';
      document.getElementById('emailError').textContent = '';
      document.getElementById('passwordError').textContent = '';
      document.getElementById('confirmPasswordError').textContent = '';

      if (name === '') {
        document.getElementById('nameError').textContent = 'Name is required.';
        valid = false;
      }

      if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required.';
        valid = false;
      }

      if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'Password must be at least 6 characters.';
        valid = false;
      }

      if (confirmPassword !== password) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
        valid = false;
      }

      if (!valid) {
        event.preventDefault();
      }
    });
  </script>
</body>
</html>
