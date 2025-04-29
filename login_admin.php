<?php
session_start();

// Hardcoded admin credentials
$admin_username = "admin"; // Your default username
$admin_password = "12345"; // Your default password

// Get username and password from form
$entered_username = trim($_POST['admin-username']);
$entered_password = trim($_POST['admin-password']);

// Check if entered credentials match the hardcoded ones
if ($entered_username === $admin_username && $entered_password === $admin_password) {
    // Credentials matched, start session
    $_SESSION['admin_username'] = $admin_username;
    echo "Login successful! Welcome, " . $admin_username;
    header("Location: admin.php"); // Redirect to Admin Dashboard page
    exit();
} else {
    // Credentials did not match
    echo "Invalid username or password.";
}
?>
