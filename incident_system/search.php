<?php
include 'db.php';
$result = null;
$searched = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incident_id = $_POST['incident_id'];
    $sql = "SELECT * FROM incidents WHERE incident_id = '$incident_id'";
    $result = mysqli_query($conn, $sql);
    $searched = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Incident</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f0f0f0; }
        header { background: #1a1a2e; color: white; padding: 20px; text-align: center; }
        nav { background: #16213e; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-size: 16px; }
        nav a:hover { color: #e94560; }
        .container { max-width: 700px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; }
        input[type="text"] { width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background: #1a1a2e; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px; }
        input[type="submit"]:hover { background: #e94560; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #1a1a2e; color: white; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        .not-found { color: red; font-weight: bold; }
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
        <h2>Search Incident by ID</h2>
        <form method="POST" action="search.php">
            <input type="text" name="incident_id" placeholder="Enter Incident ID e.g. INC-001" required>
            <input type="submit" value="Search">
        </form>
        <?php if ($searched) { ?>
            <?php if (mysqli_num_rows($result) > 0) { ?>
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
                    <td><?php echo $row['severity']; ?></td>
                    <td><?php echo $row['reported_by']; ?></td>
                    <td><?php echo $row['date_reported']; ?></td>
                </tr>
                <?php } ?>
            </table>
            <?php } else { ?>
                <p class="not-found">No incident found with that ID.</p>
            <?php } ?>
        <?php } ?>
    </div>
</body>
</html>
