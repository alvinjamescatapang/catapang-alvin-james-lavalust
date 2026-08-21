<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Font Awesome 6 (free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ---------- RESET & VARIABLES ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            --primary-green: #1e7e34;
            --primary-dark: #145a24;
            --primary-light: #2a9d47;
            --black: #1a1a1a;
            --black-light: #2d2d2d;
            --gray-100: #f4f6f9;
            --gray-200: #e9edf2;
            --gray-500: #6b7a8a;
            --gray-700: #3d4a5a;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 40px rgba(0,0,0,0.12);
            --radius: 16px;
            --radius-sm: 10px;
            --sidebar-width: 250px;
            --header-height: 68px;
        }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: var(--gray-100);
            color: var(--black);
            display: flex;
            min-height: 100vh;
        }
        /* ---------- SIDEBAR ---------- */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--black);
            color: var(--white);
            padding: 28px 20px 24px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
            box-shadow: 2px 0 20px rgba(0,0,0,0.15);
        }
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 28px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            margin-bottom: 24px;
        }
        .sidebar-brand .brand-icon {
            width: 44px;
            height: 44px;
            background: var(--primary-green);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 700;
            color: var(--white);
            flex-shrink: 0;
        }
        .sidebar-brand h1 {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }
        .sidebar-brand h1 span { color: var(--primary-light); }
        .sidebar-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar-nav a i { width: 22px; font-size: 17px; text-align: center; }
        .sidebar-nav a:hover {
            background: rgba(255,255,255,0.06);
            color: var(--white);
        }
        .sidebar-nav a.active {
            background: var(--primary-green);
            color: var(--white);
            box-shadow: 0 4px 14px rgba(30,126,52,0.35);
        }
        .sidebar-nav .logout-link {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.06);
            padding-top: 20px;
            color: rgba(255,255,255,0.5);
        }
        .sidebar-nav .logout-link:hover {
            color: #ff6b6b;
            background: rgba(255,107,107,0.08);
        }

        /* ---------- MAIN WRAPPER ---------- */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ---------- TOP HEADER ---------- */
        .top-header {
            position: sticky;
            top: 0;
            z-index: 500;
            height: var(--header-height);
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 4px rgba(0,0,0,0.02);
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: var(--black);
            cursor: pointer;
            padding: 4px;
        }
        .page-title { font-size: 18px; font-weight: 600; }
        .header-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .welcome-text {
            font-size: 14px;
            color: var(--gray-700);
            font-weight: 500;
        }
        .welcome-text strong { color: var(--primary-green); }
        .avatar-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-green);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 17px;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(30,126,52,0.25);
        }

        /* ---------- PAGE CONTENT ---------- */
        .page-content { padding: 32px; flex: 1; }

        /* Welcome banner */
        .welcome-banner {
            background: linear-gradient(145deg, var(--black), var(--black-light));
            color: var(--white);
            padding: 32px 36px;
            border-radius: var(--radius);
            margin-bottom: 32px;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }
        .welcome-banner::after {
            content: '';
            position: absolute;
            top: -40%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: var(--primary-green);
            opacity: 0.08;
            border-radius: 50%;
            pointer-events: none;
        }
        .welcome-banner h2 {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.4px;
            position: relative;
            z-index: 1;
        }
        .welcome-banner h2 span { color: var(--primary-light); }
        .welcome-banner p {
            color: rgba(255,255,255,0.6);
            margin-top: 6px;
            font-size: 15px;
            position: relative;
            z-index: 1;
        }

        /* Cards grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
            margin-top: 8px;
        }
        .info-card {
            background: var(--white);
            padding: 24px 22px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            transition: all 0.25s ease;
        }
        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }
        .info-card .card-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-sm);
            background: rgba(30,126,52,0.10);
            color: var(--primary-green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 14px;
        }
        .info-card .card-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--gray-500);
            font-weight: 600;
        }
        .info-card .card-value {
            font-size: 17px;
            font-weight: 600;
            color: var(--black);
            margin-top: 4px;
            word-break: break-word;
        }
        .info-card .card-value.green { color: var(--primary-green); }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-wrapper { margin-left: 0; }
            .menu-toggle { display: block; }
            .top-header { padding: 0 16px; }
            .page-content { padding: 20px 16px; }
            .welcome-banner { padding: 24px 20px; }
            .welcome-banner h2 { font-size: 22px; }
            .cards-grid { grid-template-columns: 1fr; }
            .header-right .welcome-text {
                display: none;
            }
        }
        @media (max-width: 480px) {
            .profile-header { flex-direction: column; text-align: center; }
        }
        /* overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.3);
            z-index: 999;
        }
        .sidebar-overlay.active { display: block; }
    </style>
</head>
<body>

<!-- SIDEBAR OVERLAY (mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">E</div>
        <h1>Edu<span>Portal</span></h1>
    </div>
    <nav class="sidebar-nav">
        <a href="<?= site_url('student'); ?>" class="active">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="<?= site_url('student/profile'); ?>">
            <i class="fas fa-user-circle"></i> My Profile
        </a>
        <a href="<?= site_url('logout'); ?>" class="logout-link">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </nav>
</aside>

<!-- ===== MAIN WRAPPER ===== -->
<div class="main-wrapper">

    <!-- TOP HEADER -->
    <header class="top-header">
        <div class="header-left">
            <button class="menu-toggle" id="menuToggle" aria-label="Toggle sidebar">
                <i class="fas fa-bars"></i>
            </button>
            <span class="page-title">Dashboard</span>
        </div>
        <div class="header-right">
            <span class="welcome-text">
                Welcome, <strong><?= $name ?? 'Student'; ?></strong>
            </span>
            <div class="avatar-small">
                <?= strtoupper(substr($name ?? 'S', 0, 1)); ?>
            </div>
        </div>
    </header>

    <!-- PAGE CONTENT -->
    <main class="page-content">

        <!-- WELCOME BANNER -->
        <div class="welcome-banner">
            <h2>Welcome back, <span><?= $name ?? 'Student'; ?></span>!</h2>
            <p>Here is a quick glance at your student information.</p>
        </div>

        <!-- INFORMATION CARDS -->
        <div class="cards-grid">
            <div class="info-card">
                <div class="card-icon"><i class="fas fa-id-card"></i></div>
                <div class="card-label">Student ID</div>
                <div class="card-value green"><?= $student_id ?? 'N/A'; ?></div>
            </div>
            <div class="info-card">
                <div class="card-icon"><i class="fas fa-user"></i></div>
                <div class="card-label">Full Name</div>
                <div class="card-value"><?= $name ?? 'N/A'; ?></div>
            </div>
            <div class="info-card">
                <div class="card-icon"><i class="fas fa-envelope"></i></div>
                <div class="card-label">Email Address</div>
                <div class="card-value"><?= $email ?? 'N/A'; ?></div>
            </div>
            <div class="info-card">
                <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="card-label">Course / Program</div>
                <div class="card-value green"><?= $course ?? 'N/A'; ?></div>
            </div>
        </div>

    </main>
</div>

<!-- ===== JAVASCRIPT (mobile toggle) ===== -->
<script>
    (function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('menuToggle');

        function toggleSidebar() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                toggleSidebar();
            }
        });
    })();
</script>
</body>
</html>