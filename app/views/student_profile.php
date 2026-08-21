<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        :root {
            --primary: #176b5b;
            --primary-dark: #0d4f43;
            --accent: #79c8b4;
            --cream: #f7f5ef;
            --card: #fffdf8;
            --text: #25342f;
            --muted: #6b7772;
            --border: #e4e1d8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 15% 20%, rgba(121, 200, 180, 0.25), transparent 25%),
                radial-gradient(circle at 85% 80%, rgba(23, 107, 91, 0.12), transparent 25%),
                linear-gradient(135deg, #f4f1e9, #eef5f1);
            padding: 35px 20px 60px;
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
        }

        nav a {
            text-decoration: none;
            color: var(--muted);
            font-weight: 600;
            font-size: 15px;
            padding: 11px 20px;
            border-radius: 50px;
            transition: 0.3s ease;
        }

        nav a:hover {
            color: var(--primary);
            background: rgba(23, 107, 91, 0.08);
        }

        nav a.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 8px 20px rgba(23, 107, 91, 0.2);
        }

        .profile-card {
            width: 100%;
            max-width: 620px;
            margin: 0 auto;
            overflow: hidden;
            background: var(--card);
            border-radius: 28px;
            box-shadow: 0 20px 55px rgba(31, 61, 51, 0.13);
        }

        .profile-header {
            padding: 38px 30px 70px;
            text-align: center;
            color: white;
            background:
                linear-gradient(135deg, rgba(13, 79, 67, 0.85), rgba(23, 107, 91, 0.75)),
                linear-gradient(135deg, var(--primary), var(--accent));
        }

        .profile-header p {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #c5f0e3;
            margin-bottom: 8px;
        }

        .profile-header h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 32px;
        }

        .profile-body {
            padding: 0 38px 40px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            margin: -50px auto 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--cream);
            border: 6px solid var(--card);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            color: var(--primary);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 42px;
            font-weight: 700;
        }

        .student-name {
            text-align: center;
            margin-bottom: 30px;
        }

        .student-name h2 {
            font-size: 22px;
            margin-bottom: 6px;
        }

        .student-name p {
            color: var(--muted);
            font-size: 14px;
        }

        .information {
            border-top: 1px solid var(--border);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
            padding: 16px 5px;
            border-bottom: 1px solid var(--border);
        }

        .info-label {
            color: var(--muted);
            font-size: 14px;
            font-weight: 600;
            flex-shrink: 0;
        }

        .info-value {
            color: var(--text);
            font-size: 14px;
            font-weight: 500;
            text-align: right;
            word-break: break-word;
        }

        .back-btn {
            display: block;
            width: fit-content;
            margin: 32px auto 0;
            padding: 12px 22px;
            border: 1px solid var(--primary);
            border-radius: 14px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 600;
            transition: 0.3s ease;
        }

        .back-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            body {
                padding: 25px 15px;
            }

            nav {
                margin-bottom: 30px;
            }

            .profile-header {
                padding: 35px 20px 65px;
            }

            .profile-body {
                padding: 0 25px 35px;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .info-value {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a href="<?= site_url('student'); ?>">Home</a>

        <a href="<?= site_url('student/profile'); ?>" class="active">
            Student Profile
        </a>
    </nav>

    <main class="profile-card">

        <div class="profile-header">
            <p>Personal Details</p>
            <h1>Student Profile</h1>
        </div>

        <div class="profile-body">

            <div class="avatar">
                <?= strtoupper(substr($name ?? 'S', 0, 1)); ?>
            </div>

            <div class="student-name">
                <h2><?= $name ?? 'Student Name'; ?></h2>
                <p><?= $course ?? 'Student'; ?></p>
            </div>

            <div class="information">

                <div class="info-row">
                    <span class="info-label">Student ID</span>
                    <span class="info-value">
                        <?= $student_id ?? ''; ?>
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Name</span>
                    <span class="info-value">
                        <?= $name ?? ''; ?>
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Course</span>
                    <span class="info-value">
                        <?= $course ?? ''; ?>
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Year Level</span>
                    <span class="info-value">
                        <?= $year ?? ''; ?>
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Section</span>
                    <span class="info-value">
                        <?= $section ?? ''; ?>
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">
                        <?= $email ?? ''; ?>
                    </span>
                </div>

            </div>

            <a href="<?= site_url('student'); ?>" class="back-btn">
                ← Back to Home
            </a>

        </div>

    </main>

</body>

</html>