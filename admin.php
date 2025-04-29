<?php
// admin_dashboard.php
session_start(); // Make sure sessions are handled if you plan to use login/logout

$servername = "localhost";
$username = "root";
$password = "Qazqaz12#";
$dbname = "medhac"; // CHANGE THIS IF NEEDED

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctors
$doctors_sql = "SELECT * FROM doctors";
$doctors_result = $conn->query($doctors_sql);

// Fetch patients
$patients_sql = "SELECT * FROM registered_patients";
$patients_result = $conn->query($patients_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(to right, #0077b6, #90e0ef); /* Blue gradient */
    font-family: 'Poppins', sans-serif;
    display: flex;
    flex-direction: column;
    color: #023047;
}

header {
    background: #023e8a;
    text-align: center;
    padding: 30px;
    font-size: 32px;
    font-weight: bold;
    border-bottom: 3px solid #0077b6;
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    position: relative;
}

.logout-btn {
    position: absolute;
    right: 30px;
    top: 30px;
    background: linear-gradient(135deg, #0077b6, #023e8a);
    border: none;
    padding: 10px 22px;
    font-size: 16px;
    color: white;
    border-radius: 30px;
    cursor: pointer;
    box-shadow: 0 6px 12px rgba(0,0,0,0.3);
    transition: all 0.4s ease;
}

.logout-btn:hover {
    background: linear-gradient(135deg, #0096c7, #0077b6);
    transform: scale(1.1) translateY(-3px);
}

main {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 20px;
}

.buttons {
    margin-top: 30px;
}

.buttons button {
    background: linear-gradient(145deg, #48cae4, #00b4d8);
    border: none;
    border-radius: 12px;
    padding: 15px 35px;
    margin: 10px;
    font-size: 20px;
    font-weight: bold;
    color: #ffffff;
    cursor: pointer;
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
    transition: all 0.4s ease;
}

.buttons button:hover {
    background: linear-gradient(145deg, #00b4d8, #0077b6);
    transform: translateY(-6px) scale(1.05);
}

.content-section {
    display: none;
    margin-top: 30px;
    width: 90%;
    max-width: 1200px;
    background: #ffffff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 12px 24px rgba(0,0,0,0.4);
    animation: fadeIn 0.5s ease;
    color: #023047;
}

@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95);}
    to { opacity: 1; transform: scale(1);}
}

.search-bar {
    margin-bottom: 25px;
    text-align: center;
}

.search-bar input {
    width: 320px;
    padding: 15px 25px;
    font-size: 18px;
    border: none;
    border-radius: 30px;
    background: #e0f7fa;
    color: #023047;
    outline: none;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.2);
}

.search-bar input::placeholder {
    color: #777;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background: #f0f8ff;
    border-radius: 12px;
    overflow: hidden;
}

th, td {
    padding: 18px;
    border-bottom: 1px solid #ccc;
    text-align: center;
    color: #023047;
}

th {
    background: #0077b6;
    color: #ffffff;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

tr:hover {
    background: #caf0f8;
    transition: background 0.3s;
}

.section-image {
    width: 110px;
    height: 110px;
    object-fit: contain;
    margin: 25px 0;
    animation: float 3s ease-in-out infinite;
}

.image-container {
    text-align: center;
}

@keyframes float {
    0% { transform: translateY(0px);}
    50% { transform: translateY(-10px);}
    100% { transform: translateY(0px);}
}

footer {
    background: #023e8a;
    text-align: center;
    padding: 20px;
    font-size: 15px;
    color: #ffffff;
    border-top: 3px solid #0077b6;
    margin-top: 40px;
    box-shadow: 0 -4px 12px rgba(0,0,0,0.4);
}
.action-links a {
    display: inline-block;
    padding: 8px 16px;
    margin: 5px;
    border-radius: 8px;
    font-weight: bold;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
}

.action-links a.edit-btn {
    background: linear-gradient(135deg, #4caf50, #81c784);
    color: white;
    box-shadow: 0 4px 8px rgba(76, 175, 80, 0.4);
}

.action-links a.edit-btn:hover {
    background: linear-gradient(135deg, #388e3c, #66bb6a);
    transform: translateY(-3px) scale(1.05);
}

.action-links a.delete-btn {
    background: linear-gradient(135deg, #e53935, #ef5350);
    color: white;
    box-shadow: 0 4px 8px rgba(229, 57, 53, 0.4);
}

.action-links a.delete-btn:hover {
    background: linear-gradient(135deg, #c62828, #e57373);
    transform: translateY(-3px) scale(1.05);
}

</style>


    <script>
    function showSection(sectionId) {
        document.getElementById('doctors-section').style.display = 'none';
        document.getElementById('patients-section').style.display = 'none';
        document.getElementById(sectionId).style.display = 'block';
    }

    function searchTable(inputId, tableId) {
        const input = document.getElementById(inputId);
        const filter = input.value.toLowerCase();
        const table = document.getElementById(tableId);
        const trs = table.getElementsByTagName('tr');

        for (let i = 1; i < trs.length; i++) {
            let match = false;
            const tds = trs[i].getElementsByTagName('td');
            for (let j = 0; j < tds.length; j++) {
                if (tds[j] && tds[j].innerText.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }
            trs[i].style.display = match ? '' : 'none';
        }
    }
    </script>
</head>

<body>

<header>
    Welcome Admin
    <form method="POST" action="logout.php" style="display:inline;">
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</header>

<main>
    <div class="buttons">
        <button onclick="showSection('doctors-section')">Doctors</button>
        <button onclick="showSection('patients-section')">Patients</button>
    </div>

    <!-- Doctors Section -->
    <div id="doctors-section" class="content-section">
        <h2>Doctors List</h2>
        <div class="image-container">
            <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png" alt="Doctors Image" class="section-image">
        </div>
        <div class="search-bar">
            <input type="text" id="doctorSearch" onkeyup="searchTable('doctorSearch', 'doctorsTable')" placeholder="Search Doctors...">
        </div>
        <table id="doctorsTable">
        <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Speciality</th>
    <th>Hospital</th>
    <th>Experience</th>
    <th>Action</th> <!-- NEW -->
</tr>
<?php
if ($doctors_result->num_rows > 0) {
    while($row = $doctors_result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['speciality']}</td>
                <td>{$row['hospital_name']}</td>
                <td>{$row['experience']} years</td>
                <td>
                    <a href='edit_doctor.php?id={$row['id']}' style='margin-right:10px;'>Edit</a>
                    <a href='delete_doctor.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this doctor?\")'> Delete</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No doctors found.</td></tr>";
}
?>

        </table>
    </div>

    <!-- Patients Section -->
    <div id="patients-section" class="content-section">
        <h2>Patients List</h2>
        <div class="image-container">
            <img src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png" alt="Patients Image" class="section-image">
        </div>
        <div class="search-bar">
            <input type="text" id="patientSearch" onkeyup="searchTable('patientSearch', 'patientsTable')" placeholder="Search Patients...">
        </div>
        <table id="patientsTable">
        <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Action</th> <!-- NEW -->
</tr>
<?php
if ($patients_result->num_rows > 0) {
    while($row = $patients_result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['mobile']}</td>
                <td>
                    <a href='edit_patient.php?id={$row['id']}' style='margin-right:10px;'> Edit</a>
                    <a href='delete_patient.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this patient?\")'> Delete</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No patients found.</td></tr>";
}
?>

        </table>
    </div>
 
</main>

<footer>
    &copy; 2025 Your Company Name. All rights reserved.
</footer>

<?php
$conn->close();
?>
</body>
</html>
