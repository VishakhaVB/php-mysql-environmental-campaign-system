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
  <title>Campaigns | Environmental Campaign Community</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="app-layout">
  <aside class="sidebar" id="sidebar">
    <div class="brand">EcoConnect</div>
    <a class="nav-link" href="../html/homepage.html">Home</a>
    <a class="nav-link" href="../html/login.html">Login</a>
    <a class="nav-link" href="../html/signup.html">Signup</a>
    <a class="nav-link active" href="../html/campaign.html">Campaigns</a>
    <a class="nav-link" href="../html/community.html">Community</a>
    <a class="nav-link" href="../html/volunteer.html">Volunteer</a>
    <a class="nav-link" href="../html/imapact.html">Impact</a>
    <a class="nav-link" href="../html/contact.html">Contact</a>
    <div class="sidebar-footer">
      <a class="nav-link logout-link" href="../php/logout.php">Logout</a>
    </div>
  </aside>

  <div class="main fade-in">
    <header class="topbar">
      <button class="mobile-menu-btn" type="button" id="menuToggle" aria-label="Toggle sidebar">☰</button>
      <strong>Campaign Planner</strong>
      <span>Past and upcoming drives</span>
    </header>

    <main class="page">
      <section class="hero">
        <h2>Campaign Hub</h2>
        <p>Track completed campaigns and prepare upcoming environmental events.</p>
      </section>

      <section class="media-grid">
        <article class="media-card">
          <img class="media-thumb" src="../images/tree_plant_camp.jpg" alt="Tree plantation campaign">
          <div class="media-content">
            <h4>Past: Tree Plantation</h4>
            <p>Achra coastal area. Volunteers: 40. Native species planted to reduce erosion and improve biodiversity.</p>
          </div>
        </article>

        <article class="media-card">
          <img class="media-thumb" src="../images/beach_clean_camp.jpg" alt="Beach cleanup campaign">
          <div class="media-content">
            <h4>Past: Beach Cleanup</h4>
            <p>Bhatye beach. Volunteers: 60. Plastic and marine waste removed to protect local ecosystems.</p>
          </div>
        </article>

        <article class="media-card">
          <img class="media-thumb" src="../images/village_clean_camp.jpeg" alt="Village cleanup campaign">
          <div class="media-content">
            <h4>Past: Village Cleanup</h4>
            <p>Sangameshwar cleanup drive improving public hygiene and responsible waste disposal habits.</p>
          </div>
        </article>

        <article class="media-card">
          <img class="media-thumb" src="../images/river_clean.jpg" alt="River cleanup campaign">
          <div class="media-content">
            <h4>Upcoming: River Cleanup</h4>
            <p>Kajali river cleanup focused on restoring water quality and reducing riverbank litter.</p>
          </div>
        </article>

        <article class="media-card">
          <img class="media-thumb" src="../images/mangroves.jpeg" alt="Mangrove plantation campaign">
          <div class="media-content">
            <h4>Upcoming: Mangrove Plantation</h4>
            <p>Konkan coastal villages campaign to improve shoreline resilience and marine ecosystems.</p>
          </div>
        </article>

        <article class="media-card">
          <img class="media-thumb" src="../images/market_plastic.jpg" alt="Plastic free market campaign">
          <div class="media-content">
            <h4>Upcoming: Plastic-Free Market Day</h4>
            <p>Reusable packaging and cloth bag awareness drive with local vendors and volunteers.</p>
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
