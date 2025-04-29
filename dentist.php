<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modern Dental Care | About Dentists</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #1a73e8;
      --primary-light: #e8f0fe;
      --secondary: #34a853;
      --accent: #fbbc05;
      --dark: #202124;
      --light: #f8f9fa;
      --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
      color: var(--dark);
      line-height: 1.6;
      overflow-x: hidden;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* Animated Background */
    .bg-animation {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }

    .bg-bubble {
      position: absolute;
      border-radius: 50%;
      background: rgba(26, 115, 232, 0.1);
      animation: float 15s infinite ease-in-out;
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
      }
      50% {
        transform: translateY(-20px) rotate(5deg);
      }
    }

    /* Header */
    header {
      background: linear-gradient(135deg, var(--primary) 0%, #0d47a1 100%);
      color: white;
      padding: 60px 0 80px;
      margin-bottom: 60px;
      clip-path: ellipse(100% 100% at 50% 0%);
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      bottom: -50px;
      left: 0;
      width: 100%;
      height: 100px;
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M1200 0L0 0 0 7.5C150 35 350 65 600 65 850 65 1050 35 1200 7.5L1200 0Z' fill='%23f5f7fa'%3E%3C/path%3E%3C/svg%3E");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .header-content {
      max-width: 800px;
      margin: 0 auto;
      position: relative;
      z-index: 2;
    }

    header h1 {
      font-family: 'Playfair Display', serif;
      font-size: 3.5rem;
      font-weight: 600;
      margin-bottom: 20px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      animation: fadeInUp 1s ease-out;
    }

    header p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 0 auto 30px;
      opacity: 0.9;
      animation: fadeInUp 1s ease-out 0.2s forwards;
      opacity: 0;
    }

    /* Button */
    .consult-button {
      background: white;
      color: var(--primary);
      border: none;
      padding: 15px 40px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 50px;
      cursor: pointer;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      animation: fadeInUp 1s ease-out 0.4s forwards;
      opacity: 0;
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }

    .consult-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
      transition: 0.5s;
    }

    .consult-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .consult-button:hover::before {
      left: 100%;
    }

    .consult-button svg {
      width: 20px;
      height: 20px;
      fill: var(--primary);
    }

    /* Sections */
    main {
      padding-bottom: 80px;
    }

    .section-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 30px;
      margin-bottom: 60px;
    }

    section {
      background: white;
      border-radius: 20px;
      box-shadow: var(--shadow);
      padding: 40px;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      transform-style: preserve-3d;
    }

    section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
    }

    section:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    section h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      color: var(--primary);
      margin-bottom: 20px;
      position: relative;
      display: inline-block;
    }

    section h2::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 50px;
      height: 3px;
      background: var(--accent);
      border-radius: 3px;
    }

    section p, section li {
      color: #555;
      font-size: 1rem;
    }

    ul {
      list-style: none;
    }

    ul li {
      margin-bottom: 12px;
      position: relative;
      padding-left: 30px;
    }

    ul li::before {
      content: '';
      position: absolute;
      left: 0;
      top: 8px;
      width: 15px;
      height: 15px;
      background-color: var(--primary-light);
      border: 2px solid var(--primary);
      border-radius: 50%;
    }

    /* Tip Boxes */
    .tip-box {
      background: white;
      border-left: 4px solid var(--secondary);
      padding: 20px;
      border-radius: 10px;
      margin: 20px 0;
      box-shadow: var(--shadow);
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .tip-box:hover {
      transform: translateX(5px);
    }

    .tip-icon {
      width: 40px;
      height: 40px;
      background: var(--secondary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      color: white;
      font-size: 1.2rem;
    }

    .tip-content {
      flex: 1;
    }

    /* Footer */
    footer {
      background: var(--dark);
      color: white;
      padding: 40px 0;
      text-align: center;
    }

    footer p {
      opacity: 0.8;
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      header h1 {
        font-size: 2.5rem;
      }
      
      .section-grid {
        grid-template-columns: 1fr;
      }
      
      section {
        padding: 30px;
      }
    }

    /* 3D Tooth Animation */
    .tooth-model {
      width: 150px;
      height: 150px;
      margin: 30px auto;
      position: relative;
      perspective: 1000px;
    }

    .tooth {
      width: 100%;
      height: 100%;
      position: relative;
      transform-style: preserve-3d;
      animation: rotateTooth 15s infinite linear;
    }

    .tooth-face {
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border: 2px solid #dee2e6;
      border-radius: 20% 20% 40% 40%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      backface-visibility: hidden;
      box-shadow: inset 0 0 20px rgba(0,0,0,0.1);
    }

    .tooth-face.front {
      transform: translateZ(75px);
    }
    .tooth-face.back {
      transform: rotateY(180deg) translateZ(75px);
    }
    .tooth-face.right {
      transform: rotateY(90deg) translateZ(75px);
    }
    .tooth-face.left {
      transform: rotateY(-90deg) translateZ(75px);
    }
    .tooth-face.top {
      transform: rotateX(90deg) translateZ(75px);
      border-radius: 50%;
      width: 80%;
      height: 80%;
      margin: 0 auto;
    }
    .tooth-face.bottom {
      transform: rotateX(-90deg) translateZ(75px);
      border-radius: 50%;
      width: 80%;
      height: 80%;
      margin: 0 auto;
    }

    @keyframes rotateTooth {
      from { transform: rotateY(0) rotateX(20deg); }
      to { transform: rotateY(360deg) rotateX(20deg); }
    }

    /* Stats Counter */
    .stats-section {
      background: linear-gradient(135deg, var(--primary) 0%, #0d47a1 100%);
      color: white;
      padding: 60px 0;
      margin: 60px 0;
      text-align: center;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 30px;
      max-width: 1000px;
      margin: 0 auto;
    }

    .stat-item {
      padding: 20px;
    }

    .stat-number {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 10px;
      font-family: 'Playfair Display', serif;
    }

    .stat-label {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    /* Tooltip */
    .tooltip {
      position: relative;
      display: inline-block;
      border-bottom: 1px dotted var(--primary);
      cursor: help;
    }

    .tooltip .tooltiptext {
      visibility: hidden;
      width: 200px;
      background-color: var(--dark);
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 10px;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      transform: translateX(-50%);
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 0.9rem;
    }

    .tooltip:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.7);
      backdrop-filter: blur(5px);
      animation: fadeIn 0.3s;
    }

    .modal-content {
      background: white;
      margin: 10% auto;
      padding: 30px;
      border-radius: 15px;
      max-width: 500px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      position: relative;
      animation: slideDown 0.4s;
    }

    .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 1.5rem;
      cursor: pointer;
      color: #777;
      transition: var(--transition);
    }

    .close-btn:hover {
      color: var(--dark);
      transform: rotate(90deg);
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideDown {
      from { 
        opacity: 0;
        transform: translateY(-50px);
      }
      to { 
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <!-- Animated Background -->
  <div class="bg-animation">
    <div class="bg-bubble" style="width: 200px; height: 200px; top: 10%; left: 5%; animation-delay: 0s;"></div>
    <div class="bg-bubble" style="width: 150px; height: 150px; top: 70%; left: 80%; animation-delay: 2s;"></div>
    <div class="bg-bubble" style="width: 100px; height: 100px; top: 40%; left: 30%; animation-delay: 4s;"></div>
    <div class="bg-bubble" style="width: 250px; height: 250px; top: 60%; left: 40%; animation-delay: 1s;"></div>
  </div>

  <header>
    <div class="header-content">
      <h1>Modern Dental Care</h1>
      <p>Expert dental services with cutting-edge technology and compassionate care for your perfect smile</p>
      <button class="consult-button" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
        </svg>
        Book Consultation
      </button>
    </div>
  </header>

  <div class="container">
    <main>
      <div class="section-grid">
        <section>
          <h2>What is a Dentist?</h2>
          <p>A dentist is a healthcare professional specialized in oral health. Their responsibilities include:</p>
          <ul>
            <li>Diagnosing and treating dental issues</li>
            <li>Performing surgical procedures on teeth and gums</li>
            <li>Providing preventive care and education</li>
            <li>Creating treatment plans for oral health maintenance</li>
          </ul>
          <div class="tooth-model">
            <div class="tooth">
              <div class="tooth-face front">🦷</div>
              <div class="tooth-face back">🦷</div>
              <div class="tooth-face right">🦷</div>
              <div class="tooth-face left">🦷</div>
              <div class="tooth-face top">🦷</div>
              <div class="tooth-face bottom">🦷</div>
            </div>
          </div>
        </section>

        <section>
          <h2>Common Dental Conditions</h2>
          <ul>
            <li><strong>Tooth Decay:</strong> Caused by bacteria and plaque buildup <span class="tooltip">ℹ<span class="tooltiptext">Plaque is a sticky film of bacteria that forms on teeth</span></span></li>
            <li><strong>Gum Disease:</strong> Inflammation and infection of the gums</li>
            <li><strong>Tooth Abscess:</strong> Infection at the root or between gum and tooth</li>
            <li><strong>Cracked/Broken Teeth:</strong> Result of trauma or hard foods</li>
            <li><strong>Tooth Sensitivity:</strong> Pain triggered by temperature or pressure</li>
            <li><strong>Oral Cancer:</strong> Detected early during dental checkups</li>
            <li><strong>Halitosis:</strong> Persistent bad breath</li>
            <li><strong>Impacted Wisdom Teeth:</strong> Require extraction to prevent complications</li>
          </ul>
        </section>
      </div>

      <div class="section-grid">
        <section>
          <h2>Our Services</h2>
          <ul>
            <li>Comprehensive oral examinations</li>
            <li>Tooth-colored fillings and restorations</li>
            <li>Root canal therapy</li>
            <li>Professional teeth cleaning</li>
            <li>Cosmetic dentistry (veneers, whitening)</li>
            <li>Dental implants and prosthetics</li>
            <li>Orthodontic treatments</li>
            <li>Pediatric dentistry</li>
            <li>Emergency dental care</li>
          </ul>
        </section>

        <section>
          <h2>Advanced Technology</h2>
          <ul>
            <li>Digital X-rays with 90% less radiation</li>
            <li>Intraoral cameras for precise diagnosis</li>
            <li>Laser dentistry for minimally invasive treatments</li>
            <li>3D printing for crowns and bridges</li>
            <li>CAD/CAM same-day restorations</li>
            <li>Painless injection systems</li>
            <li>Sleep dentistry options</li>
          </ul>
        </section>
      </div>

      <section>
        <h2>Dental Care Tips</h2>
        <div class="tip-box">
          <div class="tip-icon">🪥</div>
          <div class="tip-content">Brush twice daily with fluoride toothpaste using proper technique for 2 minutes each time.</div>
        </div>
        <div class="tip-box">
          <div class="tip-icon">🧵</div>
          <div class="tip-content">Floss daily to remove plaque between teeth where brushes can't reach.</div>
        </div>
        <div class="tip-box">
          <div class="tip-icon">🥤</div>
          <div class="tip-content">Limit sugary snacks and acidic drinks that erode enamel.</div>
        </div>
        <div class="tip-box">
          <div class="tip-icon">🦷</div>
          <div class="tip-content">Schedule professional cleanings every 6 months to prevent tartar buildup.</div>
        </div>
        <div class="tip-box">
          <div class="tip-icon">💧</div>
          <div class="tip-content">Stay hydrated to maintain saliva production that protects teeth.</div>
        </div>
        <div class="tip-box">
          <div class="tip-icon">🚫</div>
          <div class="tip-content">Avoid smoking and excessive alcohol which increase oral cancer risk.</div>
        </div>
      </section>
    </main>
  </div>

  <div class="stats-section">
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-number" id="stat1">0</div>
        <div class="stat-label">Years Experience</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" id="stat2">0</div>
        <div class="stat-label">Happy Patients</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" id="stat3">0</div>
        <div class="stat-label">Procedures</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" id="stat4">100</div>
        <div class="stat-label">% Satisfaction</div>
      </div>
    </div>
  </div>

  <div class="container">
    <section style="text-align: center;">
      <h2>Ready for a Healthier Smile?</h2>
      <p style="margin-bottom: 30px;">Our team of certified dental professionals is committed to providing exceptional care in a comfortable environment.</p>
      <button class="consult-button" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
        </svg>
        Schedule Your Visit
      </button>
    </section>
  </div>

  <footer>
    <div class="container">
      <p>© 2023 Modern Dental Care. All rights reserved.</p>
    </div>
  </footer>

  <!-- Modal -->
  <div id="consultModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <h2 style="margin-bottom: 20px;">Book Your Consultation</h2>
      <form>
        <div style="margin-bottom: 20px;">
          <label style="display: block; margin-bottom: 8px; font-weight: 500;">Your Name</label>
          <input type="text" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 20px;">
          <label style="display: block; margin-bottom: 8px; font-weight: 500;">Email Address</label>
          <input type="email" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 20px;">
          <label style="display: block; margin-bottom: 8px; font-weight: 500;">Phone Number</label>
          <input type="tel" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 20px;">
          <label style="display: block; margin-bottom: 8px; font-weight: 500;">Preferred Date</label>
          <input type="date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <button type="submit" class="consult-button" style="width: 100%; justify-content: center;">
          Submit Request
        </button>
      </form>
    </div>
  </div>

  <script>
    // Stats counter animation
    function animateStats() {
      const stats = [
        { element: document.getElementById('stat1'), target: 25, duration: 2000 },
        { element: document.getElementById('stat2'), target: 10000, duration: 2000 },
        { element: document.getElementById('stat3'), target: 50000, duration: 2000 },
      ];
      
      stats.forEach(stat => {
        let start = 0;
        const increment = stat.target / (stat.duration / 16);
        const timer = setInterval(() => {
          start += increment;
          if (start >= stat.target) {
            clearInterval(timer);
            stat.element.textContent = stat.target.toLocaleString();
          } else {
            stat.element.textContent = Math.floor(start).toLocaleString();
          }
        }, 16);
      });
    }

    // Intersection Observer for animations
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          if (entry.target.classList.contains('stats-section')) {
            animateStats();
          }
          entry.target.style.opacity = 1;
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('section').forEach(section => {
      section.style.opacity = 0;
      section.style.transform = 'translateY(20px)';
      section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(section);
    });

    // Modal functions
    function openModal() {
      document.getElementById('consultModal').style.display = 'block';
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      document.getElementById('consultModal').style.display = 'none';
      document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
      const modal = document.getElementById('consultModal');
      if (event.target == modal) {
        closeModal();
      }
    }

    // Create bubbles for background
    function createBubbles() {
      const bgAnimation = document.querySelector('.bg-animation');
      for (let i = 0; i < 8; i++) {
        const bubble = document.createElement('div');
        bubble.classList.add('bg-bubble');
        const size = Math.random() * 150 + 50;
        bubble.style.width = ${size}px;
        bubble.style.height = ${size}px;
        bubble.style.top = ${Math.random() * 100}%;
        bubble.style.left = ${Math.random() * 100}%;
        bubble.style.animationDelay = ${Math.random() * 5}s;
        bgAnimation.appendChild(bubble);
      }
    }

    window.onload = createBubbles;
  </script>
</body>
</html>.            dentist