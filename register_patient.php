<?php
include 'db_connect.php'; // adjust the path based on your folder structure

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["reg-name"];
    $email = $_POST["reg-email"];
    $mobile = $_POST["reg-mobile"];
    $password = password_hash($_POST["reg-password"], PASSWORD_DEFAULT); // Securely hash the password

    // Check if email or mobile already exists
    $checkQuery = "SELECT * FROM patients WHERE email = ? OR mobile = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $email, $mobile);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Already registered
        echo "<script>
            alert('This email or mobile number is already registered!');
            window.history.back();
        </script>";
        exit();
    }

    // If not registered, insert the new patient
    $insertQuery = "INSERT INTO patients (name, email, mobile, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssss", $name, $email, $mobile, $password);

    if ($stmt->execute()) {
        echo "<script>
            alert('Registration successful! You can now login.');
            window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
            alert('Something went wrong. Please try again.');
            window.history.back();
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
