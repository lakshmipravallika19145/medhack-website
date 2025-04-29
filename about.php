<?php
// about.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | MedHack</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
  <style>
    :root {
      --deep-blue: #0052CC; /* Deep Royal Blue */
      --medium-blue: #0088CC; /* Medium Blue */
      --sky-blue: #4AC0FF; /* Lighter Sky Blue */
      --light-sky: #A7E9FF; /* Pale Blue */
      --icy-blue: #E5F9FF; /* Ice-like White */
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: white;
      color: var(--deep-blue);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: start;
    }

    header {
      background: linear-gradient(135deg, var(--medium-blue), var(--deep-blue));
      color: white;
      width: 100%;
      padding: 30px 20px;
      text-align: center;
      font-size: 32px;
      font-weight: 600;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
      border-bottom-left-radius: 30px;
      border-bottom-right-radius: 30px;
      letter-spacing: 1px;
    }

    .about-container {
      margin-top: 50px;
      max-width: 1100px;
      background: rgba(255, 255, 255, 0.65);
      backdrop-filter: blur(25px) saturate(180%);
      -webkit-backdrop-filter: blur(25px) saturate(180%);
      border-radius: 20px;
      padding: 50px 40px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      animation: fadeSlideUp 1s ease forwards;
      margin-bottom: 50px;
    }

    .about-container h2 {
      font-size: 30px;
      color: var(--medium-blue);
      margin-bottom: 20px;
    }

    .about-container p {
      font-size: 17px;
      line-height: 1.8;
      margin-bottom: 30px;
      text-align: justify;
      color: var(--deep-blue);
    }

    .features {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      margin-top: 30px;
    }

    .feature-card {
      background: var(--icy-blue);
      border-radius: 18px;
      padding: 30px;
      width: 280px;
      border: 2px solid var(--light-sky);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      transition: transform 0.4s, box-shadow 0.4s;
    }

    .feature-card:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.2);
      background: var(--sky-blue);
      color: white;
    }

    .feature-card i {
      font-size: 45px;
      color: var(--medium-blue);
      margin-bottom: 20px;
      transition: color 0.3s;
    }

    .feature-card:hover i {
      color: white;
    }

    .feature-card h3 {
      font-size: 22px;
      margin-bottom: 15px;
      color: var(--medium-blue);
    }

    .feature-card p {
      font-size: 15px;
      color: var(--deep-blue);
      line-height: 1.5;
    }

    footer {
      margin-top: auto;
      padding: 20px;
      background-color: var(--deep-blue);
      color: white;
      text-align: center;
      width: 100%;
      font-size: 14px;
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
    }

    @keyframes fadeSlideUp {
      0% {
        opacity: 0;
        transform: translateY(50px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      .about-container {
        padding: 30px 20px;
      }
      .feature-card {
        width: 90%;
      }
    }
  </style>
</head>
<body>

  <header>
    About Us
  </header>

  <main class="about-container">
    <h2>Welcome to MedHack</h2>
    <p>
      MedHack is a trusted healthcare appointment platform, connecting patients to top doctors with just a few clicks. 
      We use the power of technology to bring medical services closer, faster, and more personalized for you.
    </p>

    <div class="features">
      <div class="feature-card">
        <i class="fas fa-heartbeat"></i>
        <h3>Our Mission</h3>
        <p>Empowering healthcare through innovative appointment management solutions for everyone, everywhere.</p>
      </div>

      <div class="feature-card">
        <i class="fas fa-globe"></i>
        <h3>Our Vision</h3>
        <p>Building a world where accessing healthcare is seamless, efficient, and universally available.</p>
      </div>

      <div class="feature-card">
        <i class="fas fa-user-md"></i>
        <h3>Our Team</h3>
        <p>Passionate medical experts, engineers, and designers working together to improve lives globally.</p>
      </div>
    </div>
  </main>

  <footer>
    &copy; 2025 MedHack Technologies Pvt Ltd | All rights reserved.
  </footer>

</body>
</html>
