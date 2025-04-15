<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>3D Patient Appointment System</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #e0f7fa;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      background: #e0f7fa;
      padding: 40px;
      border-radius: 30px;
      box-shadow: 20px 20px 60px #c0d9db, -20px -20px 60px #ffffff;
      width: 90%;
      max-width: 600px;
      transition: all 0.3s ease;
    }

    h1 {
      text-align: center;
      color: #0277bd;
      margin-bottom: 30px;
      text-shadow: 1px 1px 3px #b3e5fc;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: 600;
      color: #01579b;
    }

    input, select {
      width: 100%;
      padding: 15px;
      margin-bottom: 25px;
      border: none;
      border-radius: 15px;
      background: #ffffff;
      box-shadow: inset 8px 8px 15px #b3d1d3,
                  inset -8px -8px 15px #ffffff;
      font-size: 1rem;
      outline: none;
      transition: 0.3s ease;
    }

    input:focus, select:focus {
      box-shadow: inset 2px 2px 5px #b0d4d6, inset -2px -2px 5px #ffffff, 0 0 0 2px #4fc3f7;
    }

    .btn {
      width: 100%;
      padding: 15px;
      border: none;
      margin-top: 15px;
      border-radius: 15px;
      font-size: 1rem;
      font-weight: bold;
      color: #0277bd;
      background: #e0f7fa;
      box-shadow: 8px 8px 15px #b3d1d3,
                  -8px -8px 15px #ffffff;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .btn:hover {
      transform: translateY(-3px);
      background-color: #b3e5fc;
    }

    .output {
      margin-top: 30px;
      padding: 20px;
      border-radius: 15px;
      background: #e0f7fa;
      box-shadow: inset 8px 8px 15px #b3d1d3,
                  inset -8px -8px 15px #ffffff;
      font-size: 1rem;
      color: #004d40;
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>🩺 Patient Appointment System</h1>

    <label for="name">Patient Name:</label>
    <input type="text" id="name" placeholder="Enter your name"/>

    <label for="problem">Problem / Disease:</label>
    <input type="text" id="problem" placeholder="e.g. fever, chest pain" oninput="suggestDoctor()"/>

    <label for="doctor">Suggested Specialist:</label>
    <select id="doctor" onchange="fetchDoctors()">
      <option value="">Select a specialist</option>
    </select>

    <label for="doctorName">Available Doctors:</label>
    <select id="doctorName">
      <option value="">Select a doctor</option>
    </select>

    <label for="date">Appointment Date:</label>
    <input type="datetime-local" id="date"/>

    <button class="btn" onclick="bookAppointment()">📅 Book Appointment</button>
    <button class="btn" onclick="rescheduleAppointment()">🔁 Reschedule</button>
    <button class="btn" onclick="cancelAppointment()">❌ Cancel</button>

    <div class="output" id="output"></div>
  </div>

  <script>
    let appointment = {};

    const doctorMap = {
      "fever": "General Physician",
      "cold": "General Physician",
      "cough": "General Physician",
      "chest pain": "Cardiologist",
      "skin rash": "Dermatologist",
      "anxiety": "Psychiatrist",
      "depression": "Psychiatrist",
      "diabetes": "Endocrinologist",
      "eye pain": "Ophthalmologist",
      "headache": "Neurologist",
      "stomach pain": "Gastroenterologist",
      "back pain": "Orthopedic",
      "toothache": "Dentist",
      "ear pain": "ENT Specialist",
      "asthma": "Pulmonologist",
      "kidney pain": "Nephrologist",
      "urine infection": "Nephrologist",
      "swelling ankles": "Nephrologist",
      "frequent urination": "Nephrologist",
      "proteinuria": "Nephrologist",
      "joint pain": "Rheumatologist",
      "arthritis": "Rheumatologist",
      "swelling joints": "Rheumatologist",
      "lupus": "Rheumatologist",
      "stiffness": "Rheumatologist",
      "tumor": "Oncologist",
      "cancer": "Oncologist",
      "abnormal growth": "Oncologist",
      "biopsy report": "Oncologist",
      "chemotherapy": "Oncologist",
      "menstrual pain": "Gynecologist",
      "pregnancy": "Gynecologist",
      "pcos": "Gynecologist",
      "infertility": "Gynecologist",
      "vaginal infection": "Gynecologist",
      "blood in urine": "Urologist",
      "urinary blockage": "Urologist",
      "bladder pain": "Urologist",
      "kidney stones": "Urologist",
      "frequent urge": "Urologist",
      "anemia": "Hematologist",
      "low hemoglobin": "Hematologist",
      "blood clot": "Hematologist",
      "leukemia": "Hematologist",
      "platelet disorder": "Hematologist",
      "allergy": "Immunologist",
      "autoimmune disease": "Immunologist",
      "low immunity": "Immunologist"
    };

    function suggestDoctor() {
      const problemInput = document.getElementById("problem").value.trim().toLowerCase();
      const doctorSelect = document.getElementById("doctor");
      doctorSelect.innerHTML = '<option value="">Select a specialist</option>';

      if (problemInput && doctorMap[problemInput]) {
        const specialist = doctorMap[problemInput];
        const option = document.createElement("option");
        option.value = specialist;
        option.text = specialist;
        option.selected = true;
        doctorSelect.appendChild(option);
        fetchDoctors(); // Fetch doctors when specialist is suggested
      } else {
        document.getElementById("doctorName").innerHTML = '<option value="">Select a doctor</option>';
      }
    }

    function fetchDoctors() {
      const specialist = document.getElementById("doctor").value;
      const doctorNameSelect = document.getElementById("doctorName");
      doctorNameSelect.innerHTML = '<option value="">Select a doctor</option>';

      if (specialist) {
        fetch(`fetch_doctors.php?speciality=${encodeURIComponent(specialist)}`)
          .then(response => response.json())
          .then(data => {
            if (data.length > 0) {
              data.forEach(doctor => {
                const option = document.createElement("option");
                option.value = doctor;
                option.text = doctor;
                doctorNameSelect.appendChild(option);
              });
            } else {
              const option = document.createElement("option");
              option.value = "";
              option.text = "No doctors available";
              doctorNameSelect.appendChild(option);
            }
          })
          .catch(error => {
            console.error("Error fetching doctors:", error);
            doctorNameSelect.innerHTML = '<option value="">Error loading doctors</option>';
          });
      }
    }

    function bookAppointment() {
      const name = document.getElementById("name").value;
      const problem = document.getElementById("problem").value;
      const specialist = document.getElementById("doctor").value;
      const doctorName = document.getElementById("doctorName").value;
      const date = document.getElementById("date").value;
      const output = document.getElementById("output");

      if (!name || !problem || !specialist || !doctorName || !date) {
        output.innerText = "❗ Please fill in all the fields to book an appointment.";
        output.style.display = "block";
        return;
      }

      appointment = { name, problem, specialist, doctorName, date };
      output.innerHTML = `✅ Appointment booked!<br><br><strong>Name:</strong> ${name}<br><strong>Problem:</strong> ${problem}<br><strong>Specialist:</strong> ${specialist}<br><strong>Doctor:</strong> ${doctorName}<br><strong>Date:</strong> ${new Date(date).toLocaleString()}`;
      output.style.display = "block";
    }

    function rescheduleAppointment() {
      const date = document.getElementById("date").value;
      const output = document.getElementById("output");

      if (!appointment.name) {
        output.innerText = "⚠ No existing appointment to reschedule.";
        output.style.display = "block";
        return;
      }

      if (!date) {
        output.innerText = "📅 Please select a new date to reschedule.";
        output.style.display = "block";
        return;
      }

      appointment.date = date;
      output.innerHTML = `🔁 Appointment rescheduled!<br><br><strong>Name:</strong> ${appointment.name}<br><strong>Problem:</strong> ${appointment.problem}<br><strong>Specialist:</strong> ${appointment.specialist}<br><strong>Doctor:</strong> ${appointment.doctorName}<br><strong>New Date:</strong> ${new Date(date).toLocaleString()}`;
      output.style.display = "block";
    }

    function cancelAppointment() {
      const output = document.getElementById("output");

      if (!appointment.name) {
        output.innerText = "❌ No appointment to cancel.";
        output.style.display = "block";
        return;
      }

      output.innerText = `❌ Appointment for ${appointment.name} has been cancelled.`;
      output.style.display = "block";
      appointment = {};
    }
  </script>
</body>
</html>