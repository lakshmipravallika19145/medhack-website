<?php
// edit_patient.php
$servername = "localhost";
$username = "root";
$password = "Qazqaz12#";
$dbname = "medhac";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient details
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM registered_patients WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $patient = $result->fetch_assoc();
    } else {
        echo "Patient not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Update patient
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $update_sql = "UPDATE registered_patients SET 
                    name='$name', 
                    email='$email', 
                    mobile='$mobile'
                   WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Patient updated successfully!'); window.location.href='admin.php';</script>";
    } else {
        echo "Error updating patient: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
</head>
<body>
    <h2>Edit Patient</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?php echo $patient['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $patient['email']; ?>" required><br><br>
        Mobile: <input type="text" name="mobile" value="<?php echo $patient['mobile']; ?>" required><br><br>
        <button type="submit" name="update">Update Patient</button>
    </form>
</body>
</html>
