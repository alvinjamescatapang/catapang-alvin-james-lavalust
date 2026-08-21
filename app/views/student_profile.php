<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile | Student Information System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7f5;
            color: #1e293b;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #111827;
            padding: 30px 20px;
            color: white;
            position: fixed;
            height: 100vh;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 50px;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: #22c55e;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .logo h2 {
            font-size: 17px;
        }

        .logo span {
            font-size: 12px;
            color: #9ca3af;
        }

        .menu-title {
            font-size: 11px;
            color: #6b7280;
            letter-spacing: 1px;
            margin: 25px 12px 10px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #d1d5db;
            padding: 14px;
            margin-bottom: 8px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #22c55e;
            color: white;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            width: calc(100% - 260px);
            padding: 35px 50px;
        }

        .topbar {
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .topbar p {
            color: #64748b;
        }

        /* PROFILE CARD */
        .profile-container {
            background: white;
            border-radius: 20px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            max-width: 1000px;
        }

        .profile-banner {
            height: 180px;
            background: linear-gradient(135deg, #15803d, #22c55e);
        }

        .profile-content {
            padding: 0 40px 40px;
        }

        .profile-header {
            display: flex;
            align-items: flex-end;
            gap: 25px;
            margin-top: -65px;
            margin-bottom: 35px;
        }

        .avatar {
            width: 130px;
            height: 130px;
            background: #dcfce7;
            border: 6px solid white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #15803d;
            font-size: 45px;
            font-weight: bold;
        }

        .profile-name {
            padding-bottom: 15px;
        }

        .profile-name h2 {
            font-size: 28px;
        }

        .profile-name p {
            color: #64748b;
            margin-top: 5px;
        }

        .details-title {
            margin-bottom: 20px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail {
            background: #f8faf9;
            border: 1px solid #e5e7eb;
            padding: 18px;
            border-radius: 12px;
        }

        .detail-label {
            display: block;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .detail-value {
            font-size: 16px;
            font-weight: bold;
            color: #1e293b;
        }

        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 20px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #374151;
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .logo h2,
            .logo span,
            .menu-title,
            .sidebar a span {
                display: none;
            }

            .main {
                margin-left: 75px;
                width: calc(100% - 75px);
                padding: 25px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .profile-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-content {
                padding: 0 25px 30px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">🎓</div>

            <div>
                <h2>Student Portal</h2>
                <span>Information System</span>
            </div>
        </div>

        <p class="menu-title">MAIN MENU</p>

        <nav>
            <a href="<?= site_url('student'); ?>">
                <span>🏠</span>
                <span>Home</span>
            </a>

            <a href="<?= site_url('student/profile'); ?>" class="active">
                <span>👤</span>
                <span>My Profile</span>
            </a>
        </nav>

    </aside>

    <main class="main">

        <div class="topbar">
            <h1>My Profile</h1>
            <p>View your personal and academic information</p>
        </div>

        <section class="profile-container">

            <div class="profile-banner"></div>

            <div class="profile-content">

                <div class="profile-header">

                    <div class="avatar">
                        <?= strtoupper(substr($name ?? 'S', 0, 1)); ?>
                    </div>

                    <div class="profile-name">
                        <h2><?= $name ?? 'Student Name'; ?></h2>
                        <p><?= $course ?? 'Student'; ?></p>
                    </div>

                </div>

                <h3 class="details-title">Student Information</h3>

                <div class="details-grid">

                    <div class="detail">
                        <span class="detail-label">Student ID</span>
                        <span class="detail-value">
                            <?= $student_id ?? ''; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Full Name</span>
                        <span class="detail-value">
                            <?= $name ?? ''; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Course</span>
                        <span class="detail-value">
                            <?= $course ?? ''; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Year Level</span>
                        <span class="detail-value">
                            <?= $year ?? ''; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Section</span>
                        <span class="detail-value">
                            <?= $section ?? ''; ?>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Email Address</span>
                        <span class="detail-value">
                            <?= $email ?? ''; ?>
                        </span>
                    </div>

                </div>

                <a href="<?= site_url('student'); ?>" class="back-btn">
                    ← Back to Dashboard
                </a>

            </div>

        </section>

    </main>

</div>

</body>
</html>