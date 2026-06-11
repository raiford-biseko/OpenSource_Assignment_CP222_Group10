<?php
$host = "localhost";
$user = "incident_user";
$password = "password123";
$database = "incident_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
