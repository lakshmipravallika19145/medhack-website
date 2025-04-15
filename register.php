<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MedHac | Register</title>
  <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
  <div class="container">
    <h1>Register</h1>

    <div style="text-align: right; font-size: 14px; margin-bottom: 10px;">
      <span id="toggleFormText">Are you a doctor?</span>
      <a href="#" id="toggleFormLink" style="color: #00bcd4; text-decoration: none;" onclick="toggleDoctorForm()">Register here</a>
    </div>

    <!-- Patient Registration Form -->
    <form id="patient-form" action="register_patient.php" method="POST">
      <label for="reg-name">Full Name</label>
      <input type="text" id="reg-name" name="reg-name" placeholder="Full Name" required>

      <label for="reg-email">Email</label>
      <input type="email" id="reg-email" name="reg-email" placeholder="Email ID" required>

      <label for="reg-mobile">Mobile Number</label>
      <input type="tel" id="reg-mobile" name="reg-mobile" placeholder="10-digit number" pattern="[0-9]{10}" required>

      <label for="reg-password">Password</label>
      <input type="password" id="reg-password" name="reg-password" placeholder="Password (min 6 characters)" minlength="6" required>

      <button type="submit" class="submit-button" >Register</button>
      <div class="bottom-text">Already have an account? <a href="login.php">Login</a></div>
    </form>

    <!-- Doctor Registration Form -->
    <!-- Doctor Registration Form -->
<form id="doctor-form" action="register_doctor.php" style="display: none;" method="POST">
  <label for="doc-name">Full Name</label>
  <input type="text" id="doc-name" name="doc-name" placeholder="Full Name" required>

  <label for="doc-email">Email</label>
  <input type="email" id="doc-email" name="doc-email" placeholder="Email ID" required>

  <label for="doc-mobile">Mobile Number</label>
  <input type="tel" id="doc-mobile" name="doc-mobile" placeholder="10-digit number" pattern="[0-9]{10}" required>

  <label for="doc-password">Password</label>
  <input type="password" id="doc-password" name="doc-password" placeholder="Password (min 6 characters)" minlength="6" required>

  <label for="doc-speciality">Specialization</label>
  <input type="text" id="doc-speciality" name="doc-speciality" placeholder="e.g., Cardiologist" required>

  <!-- New Fields Start -->
  <label for="doc-hospital_name">Clinic/Hospital Name</label>
  <input type="text" id="doc-hospital_name" name="doc-hospital_name" placeholder="Clinic name" required>

  <label for="doc-experience">Experience (in years)</label>
  <input type="number" id="doc-experience" name="doc-experience" placeholder="e.g., 5" min="0" required><br><br>

  <!--<label for="doc-timings">Available Timings</label>
  <input type="text" id="doc-timings" name="doc-timings" placeholder="e.g., 10AM - 4PM" required>-->
  <!-- New Fields End -->

  <button type="submit" class="submit-button">Register</button>
  <div class="bottom-text">Already have an account? <a href="login.php">Login</a></div>
</form>

  </div>

  <script>
    function toggleDoctorForm() {
      const patientForm = document.getElementById('patient-form');
      const doctorForm = document.getElementById('doctor-form');
      const toggleText = document.getElementById('toggleFormText');
      const toggleLink = document.getElementById('toggleFormLink');

      const isDoctorVisible = doctorForm.style.display === 'block';

      if (isDoctorVisible) {
        doctorForm.style.display = 'none';
        patientForm.style.display = 'block';
        toggleText.textContent = 'Are you a doctor?';
        toggleLink.textContent = 'Register here';
      } else {
        doctorForm.style.display = 'block';
        patientForm.style.display = 'none';
        toggleText.textContent = 'Are you a patient?';
        toggleLink.textContent = 'Register here';
      }
    }

    // Optional: Ensure patient form is shown by default if coming from anchor
    window.onload = () => {
      const hash = window.location.hash;
      if (hash === "#doctor") {
        toggleDoctorForm();
      }
    };
  </script>
</body>
</html>
