<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ---------- same global reset, variables & sidebar styles as home ---------- */
        * { margin:0; padding:0; box-sizing:border-box; }
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
        /* sidebar – identical to home */
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
        .sidebar-brand h1 { font-size: 20px; font-weight: 700; letter-spacing: -0.3px; }
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

        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* top header – same */
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

        .page-content { padding: 32px; flex: 1; }

        /* ---------- PROFILE SPECIFIC ---------- */
        .profile-header {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            padding: 36px 40px;
            display: flex;
            align-items: center;
            gap: 32px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--primary-green);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: 0 4px 16px rgba(30,126,52,0.25);
        }
        .profile-name-group h2 {
            font-size: 26px;
            font-weight: 700;
            color: var(--black);
        }
        .profile-name-group .sub-info {
            display: flex;
            flex-wrap: wrap;
            gap: 18px 28px;
            margin-top: 6px;
            color: var(--gray-500);
            font-size: 15px;
        }
        .profile-name-group .sub-info span i {
            margin-right: 6px;
            color: var(--primary-green);
            width: 18px;
        }

        /* info rows */
        .profile-details {
            background: var(--white);
            border-radius: var(--radius);
            padding: 28px 32px;
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            margin-bottom: 28px;
        }
        .profile-details h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 22px;
            color: var(--black);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .profile-details h3 i { color: var(--primary-green); }
        .detail-row {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-200);
        }
        .detail-row:last-child { border-bottom: none; }
        .detail-label {
            width: 140px;
            font-weight: 500;
            color: var(--gray-500);
            flex-shrink: 0;
        }
        .detail-value {
            font-weight: 500;
            color: var(--black);
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 8px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background: var(--primary-green);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(30,126,52,0.30);
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30,126,52,0.35);
        }
        .btn-outline {
            background: transparent;
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }
        .btn-outline:hover {
            background: var(--gray-100);
            border-color: var(--gray-500);
        }

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
            .profile-header {
                flex-direction: column;
                text-align: center;
                padding: 28px 20px;
            }
            .profile-name-group .sub-info {
                justify-content: center;
            }
            .detail-row {
                flex-direction: column;
                gap: 2px;
                padding: 14px 0;
            }
            .detail-label { width: auto; }
            .header-right .welcome-text { display: none; }
        }
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
        <a href="<?= site_url('student'); ?>">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="<?= site_url('student/profile'); ?>" class="active">
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
            <span class="page-title">My Profile</span>
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

        <!-- PROFILE HEADER -->
        <div class="profile-header">
            <div class="profile-avatar">
                <?= strtoupper(substr($name ?? 'S', 0, 1)); ?>
            </div>
            <div class="profile-name-group">
                <h2><?= $name ?? 'Student Name'; ?></h2>
                <div class="sub-info">
                    <span><i class="fas fa-id-badge"></i> <?= $student_id ?? 'N/A'; ?></span>
                    <span><i class="fas fa-graduation-cap"></i> <?= $course ?? 'N/A'; ?></span>
                </div>
            </div>
        </div>

        <!-- PERSONAL INFORMATION -->
        <div class="profile-details">
            <h3><i class="fas fa-address-card"></i> Personal Information</h3>

            <div class="detail-row">
                <span class="detail-label">Student ID</span>
                <span class="detail-value"><?= $student_id ?? 'N/A'; ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Full Name</span>
                <span class="detail-value"><?= $name ?? 'N/A'; ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Email Address</span>
                <span class="detail-value"><?= $email ?? 'N/A'; ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Course / Program</span>
                <span class="detail-value"><?= $course ?? 'N/A'; ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Username</span>
                <span class="detail-value">
                    <?= $username ?? (strtolower(str_replace(' ', '', $name ?? 'student')) . '@edu') ; ?>
                </span>
            </div>
            <!-- extra fields from your original code (optional) -->
            <?php if (!empty($year) || !empty($section)): ?>
                <div class="detail-row">
                    <span class="detail-label">Year / Section</span>
                    <span class="detail-value">
                        <?= ($year ?? '') . (!empty($year) && !empty($section) ? ' - ' : '') . ($section ?? ''); ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="action-buttons">
            <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Profile</a>
            <a href="<?= site_url('student'); ?>" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
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

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                toggleSidebar();
            }
        });
    })();
</script>
</body>
</html>