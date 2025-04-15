<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-yCkD1+...your-integrity-key..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Responsive Navigation Menu Bar</title>
  
  <style>
    .card h3 {
      font-size: 1.1rem;
      white-space: normal;
      text-align: center;
      padding: 0 5px;
      word-break: break-word;
      line-height: 1.3;
      height: 3em;
      overflow: hidden;
    }
  </style>
</head>
<body>
  <div>
    <nav>
      <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="logo navLogo"><a href="#">MedHack</a></span>
        <div class="menu">
          <div class="logo-toggle">
            <span class="logo"><a href="#">MedHack</a></span>
            <i class='bx bx-x siderbarClose'></i>
          </div>
          <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="doctorslist.php">Find Doctors</a></li>
            <li><a href="video.php">Video Consult</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="login.php">Login/SignUp</a></li>
            <li><a href="bookappointment.php">Book Appointment</a></li>
          </ul>
        </div>
        <div class="darkLight-searchBox">
          <div class="dark-light">
            <i class='bx bx-moon moon'></i>
            <i class='bx bx-sun sun'></i>
          </div>
          <div class="searchBox">
            <div class="searchToggle">
              <i class='bx bx-x cancel'></i>
              <i class='bx bx-search search'></i>
            </div>
            <div class="search-field">
              <input type="text" placeholder="Search..." />
              <i class='bx bx-search'></i>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <main>
      <div class="container">
        <div class="consult-section">
          <h2>Consult top doctors online</h2>
          <p>Private online consultations with verified doctors</p><br><br>
          <div class="consult-grid">
            <div class="consult-card">
              <img src="https://img.icons8.com/ios/100/uterus.png" alt="Pregnancy" height="18px" width="18px" />
              <br><br>
              <p>Period doubts or Pregnancy</p><br>
              <a href="#">CONSULT NOW</a>
            </div>
            <div class="consult-card">
              <i class="fas fa-face-frown fa-5x"></i><br><br><br>
              <p>Acne, pimple or skin issues</p><br><br>
              <a href="dermatologist.html">CONSULT NOW</a>
            </div>
            <div class="consult-card">
              <i class="fas fa-head-side-virus fa-5x"></i><br><br><br>
              <p>Cold, cough or fever</p><br><br>
              <a href="#">CONSULT NOW</a>
            </div>
            <div class="consult-card">
              <i class="fas fa-baby fa-5x"></i><br><br><br>
              <p>Child not feeling well</p><br><br>
              <a href="#">CONSULT NOW</a>
            </div>
            <div class="consult-card">
              <i class="fas fa-smile-beam fa-5x"></i><br><br><br>
              <p>Depression & Anxiety</p><br><br>
              <a href="#">CONSULT NOW</a>
            </div>
          </div>
        </div>
        <div style="text-align: center; margin-top: 30px;">
          <button class="allspecialities">View All Specialities</button>
        </div>
      </div>

      <section class="container">
        <h1>Book an appointment for an in-clinic consultation</h1>
        <p class="subtitle">Find experienced doctors across all specialties</p>

        <div class="scroll-wrapper">
          <button class="scroll-btn scroll-left" onclick="scrollPrev()">&#8249;</button>

          <div class="cards" id="cardList">
            <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJSRQiMsk7AGDhxOCNRpYKbFc0yw_4YqdmLw&s" alt="Dentist" />
              <h3 class="hover-blue">Dentist</h3>
              <p>Teeth Cleaning, Braces & more</p>
            </div>

            <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQYMyhCBVYwKPEwVSBIHeuXE_Y6ul6ukVIVA&s" alt="Gynecologist" />
              <h3 class="hover-blue">Gynecologist/Obstetrician</h3>
              <p>Painful Periods, Pregnancy & more</p>
            </div>

            <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS59fHScXmUa66gc7qgXyuTdn4WppVHGAFa5g&s" alt="Dietitian" />
              <h3 class="hover-blue">Dietitian/Nutrition</h3>
              <p>Weight loss, Eating Disorders & more</p>
            </div>

            <div class="card">
              <img src="https://t4.ftcdn.net/jpg/02/57/00/79/360_F_257007919_4J2jQTuOlxXBxCu4gj1at3BS3PHdb9LV.jpg" alt="Physiotherapist" />
              <h3 class="hover-blue">Physiotherapist</h3>
              <p>Back Pain, Joint Issues & more</p>
            </div>

            <div class="card">
              <img src="https://meghrajhospital.com/wp-content/uploads/2024/01/General-Surgery.jpg" alt="General Surgeon" />
              <h3 class="hover-blue">General Surgeon</h3>
              <p>Need to get operated? Find the right surgeon</p>
            </div>

            <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFCNhC8sRV-DGkhmJH3GCn27Mg3OIXZ5n1pQ&s" alt="Orthopedist" />
              <h3 class="hover-blue">Orthopedist</h3>
              <p>For Bone and Joint issues, spinal injuries and more</p>
            </div>

            <div class="card">
              <img src="https://hillviewhospital.in/assets/img/blog/thumbnails/6.jpg" alt="General Physician" />
              <h3 class="hover-blue">General Physician</h3>
              <p>Find the right family doctor in your area</p>
            </div>

            <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVycbj25UQpeTqH_v8_9RqQhQ3xvxyuUHOauKYuF2DUPHZuMG7uR56mu4&s" alt="Pediatrician" />
              <h3 class="hover-blue">Pediatrician</h3>
              <p>Child Specialists and Doctors for Infant</p>
            </div>

            <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK5fZQutSojg7OdnNFYvThygVIE1NDWBteEw&s" alt="Gastroenterologist" />
              <h3 class="hover-blue">Gastroenterologist</h3>
              <p>Explore for issues related to digestive system, liver and pancreas</p>
            </div>
          </div>

          <button class="scroll-btn scroll-right" onclick="scrollNext()">&#8250;</button>
        </div>
      </section>
    </main>
    <footer>
    <div class="footer">
    <div class="footer-column">
      <h4>MedHack</h4>
      <a href="about.html">About</a>
      <a href="contactus.html">Contact Us</a>
    </div>
    
    <div class="footer-column">
      <h4>For patients</h4>
      <a href="doctorslist.html">Search for doctors</a>
      <a href="search-clinics.html">Search for clinics</a>
      <a href="search-hospitals.html">Search for hospitals</a>
      <a href="medhack-plus.html">MedHack Plus</a>
      <a href="covid-hospitals.html">Covid Hospital listing</a>
      <a href="care-clinics.html">MedHack Care Clinics</a>
      <a href="health-articles.html">Read health articles</a>
      <a href="medicines.html">Read about medicines</a>
      <a href="medhack-drive.html">MedHack drive</a>
      <a href="health-app.html">Health app</a>
    </div>

    <div class="footer-column">
      <h4>For doctors</h4>
      <a href="D.html">MedHack Profile</a>
      <h4>For clinics</h4>
      <a href="ray.html">Ray by MedHack</a>
      <a href="reach.html">MedHack Reach</a>
      <a href="ray-tab.html">Ray Tab</a>
      <a href="pro.html">MedHack Pro</a>
    </div>

    <div class="footer-column">
      <h4>For hospitals</h4>
      <a href="insta.html">Insta by MedHack</a>
      <a href="qikwell.html">Qikwell by MedHack</a>
      <a href="hospital-profile.html">MedHack Profile</a>
      <a href="hospital-reach.html">MedHack Reach</a>
      <a href="hospital-drive.html">MedHack Drive</a>
      <h4>For Corporates</h4>
      <a href="wellness.html">Wellness Plans</a>
    </div>

    <div class="footer-column">
      <h4>More</h4>
      <a href="help.html">Help</a>
      <a href="developers.html">Developers</a>
      <a href="privacy.html">Privacy Policy</a>
      <a href="tc.html">Terms & Conditions</a>
      <a href="pcs-tnc.html">PCS T&C</a>
      <a href="directory.html">Healthcare Directory</a>
      <a href="wiki.html">MedHack Health Wiki</a>
    </div>

    <div class="footer-column">
      <h4>Social</h4>
      <a href="https://facebook.com">Facebook</a>
      <a href="https://twitter.com">Twitter</a>
      <a href="https://linkedin.com">LinkedIn</a>
      <a href="https://youtube.com">Youtube</a>
      <a href="https://github.com">Github</a>
    </div>
  </div>

  <div class="logo">med<span>hack</span></div>

  <div class="footer-bottom">
    Copyright © 2025, MedHack. All rights reserved.
  </div>
    </footer>
  </div>

  <script>
    const cardList = document.getElementById("cardList");

    function scrollNext() {
      cardList.scrollBy({ left: 300, behavior: 'smooth' });
    }

    function scrollPrev() {
      cardList.scrollBy({ left: -300, behavior: 'smooth' });
    }

    const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark-mode") {
      body.classList.add("dark");
    }

    modeToggle.addEventListener("click", () => {
      modeToggle.classList.toggle("active");
      body.classList.toggle("dark");
      if (!body.classList.contains("dark")) {
        localStorage.setItem("mode", "light-mode");
      } else {
        localStorage.setItem("mode", "dark-mode");
      }
    });

    searchToggle.addEventListener("click", () => {
      searchToggle.classList.toggle("active");
    });

    sidebarOpen.addEventListener("click", () => {
      nav.classList.add("active");
    });
  </script>
</body>
</h.php