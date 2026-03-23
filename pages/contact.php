<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php?error=' . urlencode('Please login first.'));
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
  <title>Contact | Environmental Campaign Community</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="app-layout">
  <aside class="sidebar" id="sidebar">
    <div class="brand">EcoConnect</div>
    <a class="nav-link" href="../html/homepage.html">Home</a>
    <a class="nav-link" href="../html/login.html">Login</a>
    <a class="nav-link" href="../html/signup.html">Signup</a>
    <a class="nav-link" href="../html/campaign.html">Campaigns</a>
    <a class="nav-link" href="../html/community.html">Community</a>
    <a class="nav-link" href="../html/volunteer.html">Volunteer</a>
    <a class="nav-link" href="../html/imapact.html">Impact</a>
    <a class="nav-link active" href="../html/contact.html">Contact</a>
    <div class="sidebar-footer">
      <a class="nav-link logout-link" href="../php/logout.php">Logout</a>
    </div>
  </aside>

  <div class="main fade-in">
    <header class="topbar">
      <button class="mobile-menu-btn" type="button" id="menuToggle" aria-label="Toggle sidebar">☰</button>
      <strong>Contact and Support</strong>
      <span>We are here to help</span>
    </header>

    <main class="page">
      <section class="hero">
        <h2>Get in Touch</h2>
        <p>Send your questions, partnership requests, or campaign ideas.</p>
      </section>

      <section class="grid">
        <article class="card">
          <h3>Contact Details</h3>
          <p>Email: greenfuture@gmail.com</p>
          <p>Phone: +91 98765 43210</p>
          <p>Region: Konkan, Maharashtra</p>
        </article>

        <article class="card" style="grid-column: span 8;">
          <h3>Inquiry Form</h3>
          <form action="../php/contact_submit.php" method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Your email" required>
            </div>
            <div class="form-group">
              <label for="msg">Message</label>
              <textarea id="msg" name="message" rows="4" placeholder="Write your inquiry" required></textarea>
            </div>
            <button class="btn" type="submit">Send Inquiry</button>
          </form>

          <div class="message error <?php echo $error !== '' ? 'show' : ''; ?>"><?php echo htmlspecialchars($error); ?></div>
          <div class="message success <?php echo $success !== '' ? 'show' : ''; ?>"><?php echo htmlspecialchars($success); ?></div>
        </article>
      </section>
    </main>

    <footer class="footer">
      Contact: greenfuture@gmail.com | +91 98765 43210
    </footer>
  </div>

  <script>
    const toggle = document.getElementById('menuToggle');
    const appLayout = document.body;

    toggle.addEventListener('click', function () {
      appLayout.classList.toggle('sidebar-collapsed');
    });
  </script>
</body>
</html>
