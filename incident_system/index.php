<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Security Incident Reporting System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f0f0f0; }
        header { background: #1a1a2e; color: white; padding: 20px; text-align: center; }
        nav { background: #16213e; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-size: 16px; }
        nav a:hover { color: #e94560; }
        .container { max-width: 900px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; }
        h2 { color: #1a1a2e; }
    </style>
</head>
<body>
    <header>
        <h1>Security Incident Reporting System</h1>
        <p>University of Dodoma - Group 10</p>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Report Incident</a>
        <a href="display.php">View Incidents</a>
        <a href="search.php">Search Incident</a>
    </nav>
