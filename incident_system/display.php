<?php
include 'db.php';
$sql = "SELECT * FROM incidents ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Incidents</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f0f0f0; }
        header { background: #1a1a2e; color: white; padding: 20px; text-align: center; }
        nav { background: #16213e; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-size: 16px; }
        nav a:hover { color: #e94560; }
        .container { max-width: 900px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #1a1a2e; color: white; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f5f5f5; }
        .low { color: green; } .medium { color: orange; }
        .high { color: red; } .critical { color: darkred; font-weight: bold; }
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
        <h2>All Incident Reports</h2>
        <table>
            <tr>
                <th>Incident ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Severity</th>
                <th>Reported By</th>
                <th>Date</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['incident_id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td class="<?php echo strtolower($row['severity']); ?>"><?php echo $row['severity']; ?></td>
                <td><?php echo $row['reported_by']; ?></td>
                <td><?php echo $row['date_reported']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
