<?php
include 'db.php';
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incident_id = $_POST['incident_id'];
    $sql = "DELETE FROM incidents WHERE incident_id = '$incident_id'";
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $message = "Incident deleted successfully!";
        } else {
            $message = "No incident found with that ID.";
        }
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Incident</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f0f0f0; }
        header { background: #1a1a2e; color: white; padding: 20px; text-align: center; }
        nav { background: #16213e; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-size: 16px; }
        nav a:hover { color: #e94560; }
        .container { max-width: 600px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; }
        input[type="text"] { width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background: #e94560; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px; }
        input[type="submit"]:hover { background: #c0392b; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
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
        <a href="delete.php">Delete Incident</a>
    </nav>
    <div class="container">
        <h2>Delete a Security Incident</h2>
        <?php if($message != "") { echo "<p class='success'>$message</p>"; } ?>
        <form method="POST" action="delete.php">
            <input type="text" name="incident_id" placeholder="Enter Incident ID e.g. INC-001" required>
            <input type="submit" value="Delete Incident">
        </form>
    </div>
</body>
</html>
