<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home | Student Information System</title>

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

        /* MAIN CONTENT */
        .main {
            margin-left: 260px;
            width: calc(100% - 260px);
            padding: 35px 50px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 45px;
        }

        .topbar h1 {
            font-size: 28px;
        }

        .topbar p {
            color: #64748b;
            margin-top: 5px;
        }

        .student-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* WELCOME CARD */
        .welcome-card {
            background: linear-gradient(135deg, #15803d, #22c55e);
            border-radius: 20px;
            padding: 40px;
            color: white;
            margin-bottom: 30px;
        }

        .welcome-card h2 {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .welcome-card p {
            color: #dcfce7;
            font-size: 16px;
            max-width: 600px;
            line-height: 1.6;
        }

        .profile-btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: white;
            color: #15803d;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

        /* CARDS */
        .section-title {
            margin: 25px 0 20px;
            font-size: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background: #dcfce7;
            color: #16a34a;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .card h3 {
            margin-bottom: 8px;
        }

        .card p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
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
            <a href="<?= site_url('student'); ?>" class="active">
                <span>🏠</span>
                <span>Home</span>
            </a>

            <a href="<?= site_url('student/profile'); ?>">
                <span>👤</span>
                <span>My Profile</span>
            </a>
        </nav>

    </aside>

    <main class="main">

        <div class="topbar">

            <div>
                <h1>Dashboard</h1>
                <p>Welcome to the Student Information System</p>
            </div>

            <div class="student-icon">
                ST
            </div>

        </div>

        <section class="welcome-card">
            <h2>Welcome, Student! 👋</h2>

            <p>
                Manage and view your student information through your
                Student Information System dashboard.
            </p>

            <a href="<?= site_url('student/profile'); ?>" class="profile-btn">
                View My Profile →
            </a>
        </section>

        <h2 class="section-title">Quick Access</h2>

        <section class="cards">

            <div class="card">
                <div class="card-icon">👤</div>
                <h3>My Profile</h3>
                <p>View your personal and academic information.</p>
            </div>

            <div class="card">
                <div class="card-icon">🎓</div>
                <h3>Academic Information</h3>
                <p>Check your course, year level, and section.</p>
            </div>

            <div class="card">
                <div class="card-icon">📧</div>
                <h3>Contact Details</h3>
                <p>View your registered email information.</p>
            </div>

        </section>

    </main>

</div>

</body>
</html>