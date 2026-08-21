<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Home</title>

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
            padding: 35px 20px;
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 45px;
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

        .home-card {
            width: 100%;
            max-width: 570px;
            margin: 0 auto;
            padding: 48px 45px;
            text-align: center;
            background: rgba(255, 253, 248, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 28px;
            box-shadow: 0 20px 55px rgba(31, 61, 51, 0.12);
            backdrop-filter: blur(8px);
        }

        .symbol {
            width: 76px;
            height: 76px;
            margin: 0 auto 28px;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            font-size: 30px;
            box-shadow: 0 12px 25px rgba(23, 107, 91, 0.2);
        }

        .eyebrow {
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 34px;
            line-height: 1.25;
            margin-bottom: 18px;
            color: var(--text);
        }

        .welcome-text {
            max-width: 420px;
            margin: 0 auto;
            color: var(--muted);
            line-height: 1.7;
            font-size: 16px;
        }

        .divider {
            width: 55px;
            height: 3px;
            border-radius: 10px;
            background: var(--accent);
            margin: 26px auto;
        }

        .profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 24px;
            text-decoration: none;
            background: var(--primary);
            color: white;
            font-weight: 600;
            border-radius: 14px;
            box-shadow: 0 10px 22px rgba(23, 107, 91, 0.2);
            transition: 0.3s ease;
        }

        .profile-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 15px 28px rgba(23, 107, 91, 0.25);
        }

        @media (max-width: 600px) {
            body {
                padding: 25px 15px;
            }

            nav {
                margin-bottom: 30px;
            }

            .home-card {
                padding: 40px 25px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a href="<?= site_url('student'); ?>" class="active">Home</a>

        <a href="<?= site_url('student/profile'); ?>">
            Student Profile
        </a>
    </nav>

    <main class="home-card">

        <div class="symbol">✦</div>

        <p class="eyebrow">Student Space</p>

        <h1>Welcome to your<br>student page</h1>

        <p class="welcome-text">
            This page gives you a simple and convenient way to access
            your student information and view your profile.
        </p>

        <div class="divider"></div>

        <a href="<?= site_url('student/profile'); ?>" class="profile-btn">
            View My Profile
            <span>→</span>
        </a>

    </main>

</body>

</html>