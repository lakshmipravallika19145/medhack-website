<?php
include 'db_connect.php';

$searchTerm = '';
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM doctors WHERE name LIKE ? OR speciality LIKE ? ORDER BY name ASC");
    $likeSearch = "%" . $searchTerm . "%";
    $stmt->bind_param("ss", $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM doctors ORDER BY name ASC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctors List</title>
  <link rel="stylesheet" href="style.css">
  <style>
    :root {
      --body-color: #E4E9F7;
      --nav-color: #4FC3F7;
      --side-nav: #B3E5FC;
      --text-color: #FFF;
      --search-bar: #0288D1;
      --search-text: #010718;
    }

    body {
      background-color: var(--body-color);
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 900px;
      margin: 50px auto;
      background-color: #fff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: var(--search-bar);
      margin-bottom: 30px;
    }

    a {
      display: inline-block;
      margin-bottom: 20px;
      color: var(--search-bar);
      text-decoration: none;
      font-weight: bold;
    }

    .search-bar {
      display: flex;
      justify-content: center;
      margin-bottom: 30px;
    }

    .search-bar input {
      width: 300px;
      padding: 10px 15px;
      border: 1px solid #ccc;
      border-radius: 8px 0 0 8px;
      font-size: 16px;
    }

    .search-bar button {
      padding: 10px 20px;
      border: none;
      background-color: var(--search-bar);
      color: var(--text-color);
      border-radius: 0 8px 8px 0;
      font-size: 16px;
      cursor: pointer;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      background-color: var(--side-nav);
      margin-bottom: 20px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    li strong {
      font-size: 20px;
      color: var(--search-text);
    }

    li span {
      display: block;
      margin-top: 5px;
      color: var(--search-text);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Registered Doctors</h1>
    <a href="register.php">← Add Another Doctor</a>

    <form class="search-bar" method="GET">
      <input type="text" name="search" placeholder="Search by name or specialization..." value="<?php echo htmlspecialchars($searchTerm); ?>">
      <button type="submit">Search</button>
    </form>

    <ul>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <li>
            <strong><?php echo htmlspecialchars($row['name']); ?></strong>
            <span>Specialization: <?php echo htmlspecialchars($row['speciality']); ?></span>
            <span>Email: <?php echo htmlspecialchars($row['email']); ?></span>
            <span>Phone: <?php echo htmlspecialchars($row['mobile']); ?></span>
            <span>Hospital: <?php echo htmlspecialchars($row['hospital_name']); ?></span>
            <span>Experience: <?php echo htmlspecialchars($row['experience']); ?> years</span>
          </li>
        <?php endwhile; ?>
      <?php else: ?>
        <li>No doctors found matching your search.</li>
      <?php endif; ?>
    </ul>
  </div>
</body>
</html>
