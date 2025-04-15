<?php
include 'db_connect.php'; // adjust the path if needed

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["doc-name"];
    $email = $_POST["doc-email"];
    $mobile = $_POST["doc-mobile"];
    $password = password_hash($_POST["doc-password"], PASSWORD_DEFAULT);
    $speciality = $_POST["doc-speciality"];
    $hospital_name = $_POST['doc-hospital_name'];
    $experience = $_POST['doc-experience'];

    // Check if email or mobile already exists
    $checkQuery = "SELECT * FROM doctors WHERE email = ? OR mobile = ?";
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

    // Insert new doctor
    $insertQuery = "INSERT INTO doctors (name, email, mobile, password, speciality, hospital_name, experience) VALUES (?, ?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssssss", $name, $email, $mobile, $password, $speciality, $hospital_name,$experience);

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
