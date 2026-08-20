<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        .profile { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 500px; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= site_url('student'); ?>">Home</a>
        <a href="<?= site_url('student/profile'); ?>">Profile</a>
    </nav>
    <div class="profile">
        <h1>Student Profile</h1>
        <p><strong>Student ID:</strong> <?= $student_id ?? ''; ?></p>
        <p><strong>Name:</strong> <?= $name ?? ''; ?></p>
        <p><strong>Course:</strong> <?= $course ?? ''; ?></p>
        <p><strong>Year Level:</strong> <?= $year ?? ''; ?></p>
        <p><strong>Section:</strong> <?= $section ?? ''; ?></p>
        <p><strong>Email:</strong> <?= $email ?? ''; ?></p>
    </div>
</body>
</html>