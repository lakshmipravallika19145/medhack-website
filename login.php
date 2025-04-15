<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MedHac | Login</title>
  <style>
    /* your full CSS from above here */
    body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(135deg, #e0f7fa, #ffffff);
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 100vh;
  padding-top: 50px;
}

.container {
  background: rgba(255, 255, 255, 0.25);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 150, 150, 0.3);
  padding: 40px;
  width: 60%;
  max-width: 1000px;
}

h1 {
  text-align: center;
  color: #00838f;
  font-size: 32px;
  margin-bottom: 30px;
  text-shadow: 0 2px 6px rgba(0, 131, 143, 0.2);
}

/* Role Selector */
.role-selector {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin: 20px 0;
}

.role-selector input[type="radio"] {
  display: none;
}

.role-selector label {
  padding: 12px 24px;
  background-color: rgba(255, 255, 255, 0.4);
  color: #007c91;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(0, 150, 150, 0.1);
  font-weight: bold;
  border: 2px solid transparent;
}

.role-selector input[type="radio"]:checked + label {
  background-color: #00bcd4;
  color: white;
  border-color: #007c91;
  box-shadow: 0 6px 16px rgba(0, 188, 212, 0.4);
  transform: scale(1.05);
}

.role-selector label:hover {
  background-color: rgba(255, 255, 255, 0.6);
}

/* Form Styling */
.form-wrapper {
  display: none;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 8px 25px rgba(0, 150, 150, 0.25);
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {
  width: 100%;
  padding: 12px 15px;
  border: none;
  margin: 10px 0 20px;
  border-radius: 12px;
  background: rgba(255, 255, 255, 0.6);
  box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
  transition: all 0.2s ease;
  font-size: 14px;
}

input:focus {
  outline: none;
  background: #ffffff;
  box-shadow: 0 0 10px rgba(0, 150, 150, 0.4);
}

.submit-button {
  background: linear-gradient(145deg, #00bcd4, #00838f);
  border: none;
  padding: 12px;
  width: 100%;
  color: white;
  font-size: 16px;
  border-radius: 12px;
  cursor: pointer;
  box-shadow: 0 6px 14px rgba(0, 150, 150, 0.4);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.submit-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 20px rgba(0, 150, 150, 0.5);
}

.bottom-text {
  text-align: center;
  margin-top: 15px;
  font-size: 14px;
}

.bottom-text a {
  color: #007c91;
  text-decoration: none;
}

.bottom-text a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>

  <div class="container">
  <div class="bottom-text">Don't have an account? <a href="register.php">Register</a></div>
    <h1>Login</h1>

    <label>Login as:</label>
    <div class="role-selector">
      <input type="radio" name="role" id="patient" value="patient" required>
      <label for="patient">Patient</label>

      <input type="radio" name="role" id="doctor" value="doctor">
      <label for="doctor">Doctor</label>
    </div>

    <!-- Patient Login Form -->
    <div class="form-wrapper" id="pat-login-form" >
      <form method="POST" action="login_patient.php">
        <label for="pat-login-identifier">Email or Mobile</label>
        <input type="text" name="pat-identifier" id="pat-login-identifier" placeholder="Email or 10-digit number" required>

        <label for="pat-login-password">Password</label>
        <input type="password" name="pat-password" id="pat-login-password" placeholder="Password" required>

        <input type="submit" class="submit-button" value="Login">
        <div class="message pat-message"></div>
        
      </form>
    </div>

    <!-- Doctor Login Form -->
    <div class="form-wrapper" id="doc-login-form" >
      <form method="POST" action="login_doctor.php">
        <label for="doc-login-identifier">Email or Mobile</label>
        <input type="text" name="doc-identifier" id="doc-login-identifier" placeholder="Email or 10-digit number" required>

        <label for="doc-login-password">Password</label>
        <input type="password" name="doc-password" id="doc-login-password" placeholder="Password" required>

        <input type="submit" class="submit-button" value="Login">
        <div class="message doc-message"></div>
        
      </form>
    </div>
  </div>

  <script>
    const patientRadio = document.getElementById('patient');
    const doctorRadio = document.getElementById('doctor');
    const patForm = document.getElementById('pat-login-form');
    const docForm = document.getElementById('doc-login-form');

    // Hide both initially
    patForm.style.display = "none";
    docForm.style.display = "none";

    // Toggle forms based on selection
    patientRadio.addEventListener('change', () => {
      if (patientRadio.checked) {
        patForm.style.display = "block";
        docForm.style.display = "none";
      }
    });

    doctorRadio.addEventListener('change', () => {
      if (doctorRadio.checked) {
        docForm.style.display = "block";
        patForm.style.display = "none";
      }
    });
  </script>
</body>
</html>

