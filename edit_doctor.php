<?php
// edit_doctor.php
$servername = "localhost";
$username = "root";
$password = "Qazqaz12#";
$dbname = "medhac";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor details
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM doctors WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $doctor = $result->fetch_assoc();
    } else {
        echo "Doctor not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Update doctor
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $speciality = $_POST['speciality'];
    $hospital_name = $_POST['hospital_name'];
    $experience = $_POST['experience'];

    $update_sql = "UPDATE doctors SET 
                    name='$name', 
                    email='$email', 
                    mobile='$mobile', 
                    speciality='$speciality', 
                    hospital_name='$hospital_name', 
                    experience='$experience'
                   WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Doctor updated successfully!'); window.location.href='admin.php';</script>";
    } else {
        echo "Error updating doctor: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Doctor</title>
</head>
<body>
    <h2>Edit Doctor</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?php echo $doctor['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $doctor['email']; ?>" required><br><br>
        Mobile: <input type="text" name="mobile" value="<?php echo $doctor['mobile']; ?>" required><br><br>
        Speciality: <input type="text" name="speciality" value="<?php echo $doctor['speciality']; ?>" required><br><br>
        Hospital Name: <input type="text" name="hospital_name" value="<?php echo $doctor['hospital_name']; ?>" required><br><br>
        Experience (years): <input type="number" name="experience" value="<?php echo $doctor['experience']; ?>" required><br><br>
        <button type="submit" name="update" >Update Doctor</button>
    </form>
</body>
</html>
