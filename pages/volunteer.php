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
  <title>Volunteer | Environmental Campaign Community</title>
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
    <a class="nav-link active" href="../html/volunteer.html">Volunteer</a>
    <a class="nav-link" href="../html/imapact.html">Impact</a>
    <a class="nav-link" href="../html/contact.html">Contact</a>
    <div class="sidebar-footer">
      <a class="nav-link logout-link" href="../php/logout.php">Logout</a>
    </div>
  </aside>

  <div class="main fade-in">
    <header class="topbar">
      <button class="mobile-menu-btn" type="button" id="menuToggle" aria-label="Toggle sidebar">☰</button>
      <strong>Volunteer Action Center</strong>
      <span>Contribute your skills</span>
    </header>

    <main class="page">
      <section class="hero">
        <h2>Volunteer Registration</h2>
        <p>Share your availability and skills to join upcoming environmental campaigns.</p>
      </section>

      <section class="card" style="max-width: 760px;">
        <h3>Join as a Volunteer</h3>
        <form action="../php/volunteer_submit.php" method="POST">
          <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>

          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
          </div>

          <div class="form-group">
            <label for="skill">Preferred Skill</label>
            <select id="skill" name="skill" required>
              <option value="">Select one</option>
              <option>Field Work</option>
              <option>Photography</option>
              <option>Social Media</option>
              <option>Logistics</option>
            </select>
          </div>

          <div class="form-group">
            <label for="motivation">Why do you want to volunteer?</label>
            <textarea id="motivation" name="motivation" rows="4" placeholder="Write your motivation"></textarea>
          </div>

          <button class="btn" type="submit">Submit Registration</button>
        </form>

        <div class="message error <?php echo $error !== '' ? 'show' : ''; ?>"><?php echo htmlspecialchars($error); ?></div>
        <div class="message success <?php echo $success !== '' ? 'show' : ''; ?>"><?php echo htmlspecialchars($success); ?></div>
      </section>

      <section class="media-grid" style="margin-top: 18px;">
        <article class="media-card" style="grid-column: span 12;">
          <img class="media-thumb" src="../images/mangroves.jpeg" alt="Volunteers working near mangrove area">
          <div class="media-content">
            <h4>Volunteer Spotlight</h4>
            <p>Volunteer support in mangrove and coastal zones creates long-term ecological benefits for local communities.</p>
          </div>
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
