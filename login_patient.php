<?php
$servername = "localhost";
$username = "root";
$password = "Qazqaz12#";
$database = "medhac"; // Replace with your actual DB name

$conn = new mysqli($servername, $username, $password, $database);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$identifier = trim($_POST['identifier']); // Trim spaces
$password = trim($_POST['password']); // Trim spaces

// Check by email or mobile
$sql = "SELECT * FROM registered_patients WHERE (email = ? OR mobile = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify the password using password_verify
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['patient_id'] = $user['id']; // assuming there's an 'id' column
        $_SESSION['patient_name'] = $user['name']; // assuming there's a 'name' column
        echo "Login successful! Welcome, " . $user['name'];
        // header("Location: patient_dashboard.php"); // Redirect after successful login
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid email/mobile.";
}

$stmt->close();
$conn->close();
?>

