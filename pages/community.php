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
  <title>Community | Environmental Campaign Community</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="app-layout">
  <aside class="sidebar" id="sidebar">
    <div class="brand">EcoConnect</div>
    <a class="nav-link" href="../html/homepage.html">Home</a>
    <a class="nav-link" href="../html/login.html">Login</a>
    <a class="nav-link" href="../html/signup.html">Signup</a>
    <a class="nav-link" href="../html/campaign.html">Campaigns</a>
    <a class="nav-link active" href="../html/community.html">Community</a>
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
      <strong>Community Network</strong>
      <span>Local partnerships</span>
    </header>

    <main class="page">
      <section class="hero">
        <h2>Community and Local Involvement</h2>
        <p>We collaborate with local groups, schools, and NGOs to scale environmental impact.</p>
      </section>

      <section class="grid">
        <article class="card">
          <h3>NGO Partners</h3>
          <p>Sahyadri Nature Club and Konkan Green Foundation coordinate beach cleanup and plantation programs.</p>
        </article>

        <article class="card">
          <h3>Village Participation</h3>
          <p>Communities in Amboli, Kudal, and Vengurla lead waste segregation, cleanup drives, and awareness talks.</p>
        </article>

        <article class="card">
          <h3>Youth Programs</h3>
          <p>Student groups conduct nature walks, biodiversity sessions, and neighborhood sustainability challenges.</p>
        </article>
      </section>

      <section class="media-grid" style="margin-top: 18px;">
        <article class="media-card" style="grid-column: span 6;">
          <img class="media-thumb" src="../images/beach_ratnagiri_camp.jpeg" alt="Ratnagiri beach community participation">
          <div class="media-content">
            <h4>Community Coastal Drive</h4>
            <p>Local residents and volunteers collaborate to restore beach areas and maintain cleanliness.</p>
          </div>
        </article>

        <article class="media-card" style="grid-column: span 6;">
          <img class="media-thumb" src="../images/forest_conservation.jpg" alt="Forest conservation activity">
          <div class="media-content">
            <h4>Forest Conservation Program</h4>
            <p>Workshops and guided activities that support biodiversity and responsible land use practices.</p>
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
