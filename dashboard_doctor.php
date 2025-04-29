<?php
session_start();

// Check if doctor is logged in
if (!isset($_SESSION['doctor_id'])) {
    header("Location: index.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "Qazqaz12#";
$database = "medhac";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor details
$doctor_id = $_SESSION['doctor_id'];
$sql = "SELECT name, email, mobile FROM doctors WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedHac | Doctor Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 100px;
        }

        .container {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 150, 150, 0.3);
            padding: 40px;
            width: 80%;
            max-width: 1200px;
        }

        h1 {
            text-align: center;
            color: #00838f;
            font-size: 32px;
            margin-bottom: 30px;
            text-shadow: 0 2px 6px rgba(0, 131, 143, 0.2);
        }

        .welcome-message {
            text-align: center;
            color: #007c91;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .dashboard-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            padding: 20px;
            flex: 1;
            min-width: 300px;
            box-shadow: 0 8px 25px rgba(0, 150, 150, 0.25);
        }

        .card h3 {
            color: #00838f;
            margin-bottom: 15px;
        }

        .card p {
            color: #007c91;
            font-size: 16px;
            margin: 10px 0;
        }

        .logout-button {
            background: linear-gradient(145deg, #00bcd4, #00838f);
            border: none;
            padding: 12px;
            width: 100%;
            max-width: 200px;
            color: white;
            font-size: 16px;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 6px 14px rgba(0, 150, 150, 0.4);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: block;
            margin: 20px auto;
            text-align: center;
            text-decoration: none;
        }

        .logout-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(0, 150, 150, 0.5);
        }

        .navbar {
            background-color: #00bcd4;
            padding: 15px 30px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            box-shadow: 0 4px 8px rgba(0, 131, 143, 0.3);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: auto;
        }

        .nav-logo {
            font-size: 22px;
            font-weight: bold;
            color: white;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            transition: color 0.3s;
        }

        .nav-links li a:hover {
            color: #004d57;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">MedHac</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="view_appointments.php">Appointments</a></li>
                <li><a href="patient_records.php">Patient Records</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Doctor Dashboard</h1>
        <div class="welcome-message">Welcome, Dr. <?php echo htmlspecialchars($doctor['name']); ?>!</div>
        <div class="dashboard-content">
            <div class="card">
                <h3>Profile Information</h3>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($doctor['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($doctor['email']); ?></p>
                <p><strong>Mobile:</strong> <?php echo htmlspecialchars($doctor['mobile']); ?></p>
            </div>
            <div class="card">
                <h3>Appointments</h3>
                <p>No upcoming appointments.</p>
                <p><a href="view_appointments.php" style="color: #007c91; text-decoration: none;">View Appointments</a></p>
            </div>
            <div class="card">
                <h3>Patient Records</h3>
                <p>Access and update patient medical records.</p>
                <p><a href="patient_records.php" style="color: #007c91; text-decoration: none;">View Records</a></p>
            </div>
        </div>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>
</body>
</html>
