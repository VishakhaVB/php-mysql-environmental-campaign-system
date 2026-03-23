<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $_SESSION['user_name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Environmental Campaign Community</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="app-layout">
  <aside class="sidebar" id="sidebar">
    <div class="brand">EcoConnect</div>
    <a class="nav-link active" href="../html/homepage.html">Home</a>
    <a class="nav-link" href="../html/login.html">Login</a>
    <a class="nav-link" href="../html/signup.html">Signup</a>
    <a class="nav-link" href="../html/campaign.html">Campaigns</a>
    <a class="nav-link" href="../html/community.html">Community</a>
    <a class="nav-link" href="../html/volunteer.html">Volunteer</a>
    <a class="nav-link" href="../html/imapact.html">Impact</a>
    <a class="nav-link" href="../html/contact.html">Contact</a>
    <div class="sidebar-footer">
      <?php if ($isLoggedIn): ?>
      <a class="nav-link logout-link" href="../php/logout.php">Logout</a>
      <?php else: ?>
      <a class="nav-link" href="../html/login.html">Login to Continue</a>
      <?php endif; ?>
    </div>
  </aside>

  <div class="main fade-in">
    <header class="topbar">
      <button class="mobile-menu-btn" type="button" id="menuToggle" aria-label="Toggle sidebar">☰</button>
      <strong>Environmental Campaign Dashboard</strong>
      <span>Hello, <?php echo htmlspecialchars($userName); ?></span>
    </header>

    <main class="page">
      <section class="hero">
        <h1>Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>
        <p>Your work is helping communities build a cleaner and greener future.</p>
      </section>

      <?php if (!$isLoggedIn): ?>
      <article class="card" style="margin-bottom: 18px;">
        <h3>Guest Mode</h3>
        <p>You can view the home page without login. Please login to access Campaigns, Community, Volunteer, Impact, and Contact pages.</p>
      </article>
      <?php endif; ?>

      <div class="stats-row">
        <div class="stat">
          <div class="value">42</div>
          <div>Active Campaigns</div>
        </div>
        <div class="stat">
          <div class="value">780+</div>
          <div>Trees Planted</div>
        </div>
        <div class="stat">
          <div class="value">126</div>
          <div>Volunteers Joined</div>
        </div>
      </div>

      <section class="grid">
        <article class="card">
          <h3>Campaigns</h3>
          <p>Plan and monitor eco drives, awareness walks, beach cleanups, and plantation events with clear timelines.</p>
        </article>

        <article class="card">
          <h3>Impact Stats</h3>
          <p>Track measurable outcomes: trees planted, plastic removed, locations restored, and community participation.</p>
        </article>

        <article class="card">
          <h3>Volunteer Actions</h3>
          <p>Assign responsibilities, register participants, and collect post-event updates to keep momentum strong.</p>
        </article>
      </section>

      <section class="full-span" style="margin-top: 18px;">
        <h3 style="margin: 0 0 10px; color: #1f5a24;">Featured Campaign Moments</h3>
        <div class="media-grid">
          <article class="media-card">
            <img class="media-thumb" src="../images/tree_plant_camp.jpg" alt="Tree plantation drive">
            <div class="media-content">
              <h4>Tree Plantation</h4>
              <p>Native species plantation campaigns to strengthen local biodiversity.</p>
            </div>
          </article>

          <article class="media-card">
            <img class="media-thumb" src="../images/beach_clean_camp.jpg" alt="Beach cleanup event">
            <div class="media-content">
              <h4>Beach Cleanup</h4>
              <p>Coastal cleanups reducing plastic waste and protecting marine life.</p>
            </div>
          </article>

          <article class="media-card">
            <img class="media-thumb" src="../images/road_aware_camp.jpg" alt="Awareness campaign">
            <div class="media-content">
              <h4>Public Awareness</h4>
              <p>Community sessions focused on eco-friendly behavior and safety practices.</p>
            </div>
          </article>
        </div>
      </section>

      <section class="card platform-card" style="margin-top: 22px; grid-column: span 12;">
        <h3>Platform Experience</h3>
        <div class="platform-highlights">
          <article class="mini-highlight">
            <div class="mini-icon">UI</div>
            <p>Modern card-based layout with consistent spacing and readable typography.</p>
          </article>
          <article class="mini-highlight">
            <div class="mini-icon">UX</div>
            <p>Responsive navigation and smooth transitions for mobile and desktop users.</p>
          </article>
          <article class="mini-highlight">
            <div class="mini-icon">SEC</div>
            <p>Session-based authentication flow for protected pages and secure access.</p>
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
