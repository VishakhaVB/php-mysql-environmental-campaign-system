<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php?error=' . urlencode('Please login first.'));
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Impact | Environmental Campaign Community</title>
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
    <a class="nav-link active" href="../html/imapact.html">Impact</a>
    <a class="nav-link" href="../html/contact.html">Contact</a>
    <div class="sidebar-footer">
      <a class="nav-link logout-link" href="../php/logout.php">Logout</a>
    </div>
  </aside>

  <div class="main fade-in">
    <header class="topbar">
      <button class="mobile-menu-btn" type="button" id="menuToggle" aria-label="Toggle sidebar">☰</button>
      <strong>Impact Overview</strong>
      <span>Measured outcomes</span>
    </header>

    <main class="page">
      <section class="hero">
        <h2>Overall Impact</h2>
        <p>Our campaigns deliver measurable environmental improvements across the region.</p>
      </section>

      <div class="stats-row">
        <div class="stat">
          <div class="value">500+</div>
          <div>Trees Planted</div>
        </div>
        <div class="stat">
          <div class="value">100+ kg</div>
          <div>Waste Collected</div>
        </div>
        <div class="stat">
          <div class="value">50+</div>
          <div>Locations Restored</div>
        </div>
      </div>

      <section class="grid">
        <article class="card">
          <h3>Water Quality Improvement</h3>
          <p>Cleanups around rivers and beaches have reduced visible plastic accumulation and improved local awareness.</p>
        </article>

        <article class="card">
          <h3>Biodiversity Support</h3>
          <p>Native tree plantation drives created habitats for birds and small wildlife in restored green corridors.</p>
        </article>

        <article class="card">
          <h3>Community Behavior Change</h3>
          <p>Repeat campaigns increased waste segregation and reuse practices in participating neighborhoods.</p>
        </article>
      </section>

      <section class="card full-span" style="margin-top: 20px;">
        <h3 style="margin-top: 0;">Before and After Results</h3>
        <div class="compare-grid">
          <article class="compare-item">
            <h4>Before</h4>
            <img class="media-thumb" src="../images/before.jpg" alt="Before cleanup condition">
          </article>
          <article class="compare-item">
            <h4>After</h4>
            <img class="media-thumb" src="../images/after.jpeg" alt="After cleanup result">
          </article>
        </div>
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
