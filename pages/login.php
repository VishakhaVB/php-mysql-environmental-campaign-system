<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: homepage.php');
    exit();
}
$error = $_GET['error'] ?? '';
$success = $_GET['success'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Environmental Campaign Community</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="app-layout">
  <aside class="sidebar" id="sidebar">
    <div class="brand">EcoConnect</div>
    <a class="nav-link" href="../html/homepage.html">Home</a>
    <a class="nav-link active" href="../html/login.html">Login</a>
    <a class="nav-link" href="../html/signup.html">Signup</a>
    <a class="nav-link" href="../html/campaign.html">Campaigns</a>
    <a class="nav-link" href="../html/community.html">Community</a>
    <a class="nav-link" href="../html/volunteer.html">Volunteer</a>
    <a class="nav-link" href="../html/imapact.html">Impact</a>
    <a class="nav-link" href="../html/contact.html">Contact</a>
  </aside>

  <div class="main fade-in">
    <header class="topbar">
      <button class="mobile-menu-btn" type="button" id="menuToggle" aria-label="Toggle sidebar">☰</button>
      <strong>User Login</strong>
      <span>Secure access</span>
    </header>

    <main class="page" style="display: grid; place-items: center; min-height: calc(100vh - 140px);">
      <section class="auth-card" style="width: 100%; max-width: 460px;">
        <h2>Welcome Back</h2>
        <p class="form-note">Login to continue your green journey.</p>

        <form action="../php/loginform.php" method="POST" id="loginForm" novalidate>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <div class="field-error" id="emailError"></div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <div class="password-wrap">
              <input type="password" id="password" name="password" placeholder="Enter your password">
              <button type="button" id="togglePassword">Show</button>
            </div>
            <div class="field-error" id="passwordError"></div>
          </div>

          <button class="btn" type="submit">Login</button>
        </form>

        <p class="form-note">Don't have an account? <a href="signup.php">Sign Up</a></p>

        <div class="message error <?php echo $error !== '' ? 'show' : ''; ?>"><?php echo htmlspecialchars($error); ?></div>
        <div class="message success <?php echo $success !== '' ? 'show' : ''; ?>"><?php echo htmlspecialchars($success); ?></div>
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
    // Toggle password visibility for beginner-friendly UX.
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');

    toggleButton.addEventListener('click', function () {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.textContent = 'Hide';
      } else {
        passwordInput.type = 'password';
        toggleButton.textContent = 'Show';
      }
    });

    // Inline validation messages below each input.
    const form = document.getElementById('loginForm');
    form.addEventListener('submit', function (event) {
      let valid = true;
      const email = document.getElementById('email').value.trim();
      const password = passwordInput.value;

      document.getElementById('emailError').textContent = '';
      document.getElementById('passwordError').textContent = '';

      if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required.';
        valid = false;
      }

      if (password === '') {
        document.getElementById('passwordError').textContent = 'Password is required.';
        valid = false;
      }

      if (!valid) {
        event.preventDefault();
      }
    });
  </script>
</body>
</html>
