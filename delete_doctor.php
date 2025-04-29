<?php
// delete_doctor.php
$servername = "localhost";
$username = "root";
$password = "Qazqaz12#";
$dbname = "medhac";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // safer

    $sql = "DELETE FROM doctors WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Doctor deleted successfully!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
