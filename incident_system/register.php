<?php
include 'db.php';
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incident_id = $_POST['incident_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $severity = $_POST['severity'];
    $reported_by = $_POST['reported_by'];
    $date_reported = $_POST['date_reported'];
    $sql = "INSERT INTO incidents (incident_id, title, description, severity, reported_by, date_reported) VALUES ('$incident_id', '$title', '$description', '$severity', '$reported_by', '$date_reported')";
    if (mysqli_query($conn, $sql)) {
        $message = "Incident reported successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report Incident</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f0f0f0; }
        header { background: #1a1a2e; color: white; padding: 20px; text-align: center; }
        nav { background: #16213e; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-size: 16px; }
        nav a:hover { color: #e94560; }
        .container { max-width: 600px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; }
        input, textarea, select { width: 100%; padding: 10px; margin: 8px 0 15px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { background: #1a1a2e; color: white; border: none; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background: #e94560; }
        .success { color: green; font-weight: bold; }
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
    <div class="container">
        <h2>Report a Security Incident</h2>
        <?php if($message != "") { echo "<p class='success'>$message</p>"; } ?>
        <form method="POST" action="register.php">
            <label>Incident ID:</label>
            <input type="text" name="incident_id" required placeholder="e.g. INC-001">
            <label>Title:</label>
            <input type="text" name="title" required placeholder="Incident title">
            <label>Description:</label>
            <textarea name="description" rows="4" required placeholder="Describe the incident"></textarea>
            <label>Severity:</label>
            <select name="severity">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Critical">Critical</option>
            </select>
            <label>Reported By:</label>
            <input type="text" name="reported_by" required placeholder="Your name">
            <label>Date Reported:</label>
            <input type="date" name="date_reported" required>
            <input type="submit" value="Submit Incident">
        </form>
    </div>
</body>
</html>
