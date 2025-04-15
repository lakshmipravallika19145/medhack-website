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

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Use correct field names based on your form
    $identifier = isset($_POST['doc-identifier']) ? trim($_POST['doc-identifier']) : '';
    $password = isset($_POST['doc-password']) ? trim($_POST['doc-password']) : '';

    if (!empty($identifier) && !empty($password)) {
        // Check by email or mobile
        $sql = "SELECT * FROM doctors WHERE (email = ? OR mobile = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $identifier, $identifier);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the password using password_verify
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['doctor_id'] = $user['id']; // assuming there's an 'id' column
                $_SESSION['doctor_name'] = $user['name']; // assuming there's a 'name' column
                echo "Login successful! Welcome Dr. " . $user['name'];
                // header("Location: doctor_dashboard.php"); // Uncomment to redirect after login
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Invalid email/mobile.";
        }

        $stmt->close();
    } else {
        echo "Please fill in all fields.";
    }
}

$conn->close();
?>
