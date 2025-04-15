<?php
$host = "localhost";
$user = "root"; // replace with your MySQL username
$pass = "Qazqaz12#";     // replace with your MySQL password
$db   = "medhac";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

