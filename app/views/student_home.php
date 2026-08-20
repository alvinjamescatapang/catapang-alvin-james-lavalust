<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Home</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= site_url('student'); ?>">Home</a>
        <a href="<?= site_url('student/profile'); ?>">Profile</a>
    </nav>
    <h1>Welcome to the Student Information System</h1>
    <p>This is the home page.</p>
</body>
</html>