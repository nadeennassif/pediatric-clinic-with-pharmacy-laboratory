<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Appointments</title>
  <link rel="stylesheet" href="PatientApp.css">
  <style>
        body {
            background-image: url("App.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
  <header>
    <h1>Patient Appointments</h1>
  </header>
  <main>
    <section>
      <h2>Search for a Patient</h2>
      <form method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <button type="submit" name="submit">Submit</button>
        <li><a href="dashboard.php" class="nav-item back-home">
            <i class=""></i>
            <span>Back to dashboard</span>
          </a></li>
      </form>
    </section>
    <?php
      // Connect to database
      include_once("pages/conn.php");

      // Search for patient record if search query is submitted
      if (isset($_GET['submit'])) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM patient WHERE name LIKE '%$search%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // Output patient information and appointments
          while($row = $result->fetch_assoc()) {
            echo "<section>";
            echo "<h2>Patient Information</h2>";
            echo "<p>Name: " . $row['name'] . "</p>";
            echo "<p>DOB: " . $row['dob'] . "</p>";
            echo "<p>Address: " . $row['address'] . "</p>";
            echo "<p>Phone: " . $row['phone'] . "</p>";
            echo "<h2>Appointments</h2>";
            echo "<h3>Upcoming Appointments</h3>";
            $sql2 = "SELECT * FROM appointment WHERE patient_id=" . $row['id'] . " AND date >= CURDATE() ORDER BY date ASC";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
              echo "<ul>";
              while($row2 = $result2->fetch_assoc()) {
                echo "<li>" . $row2['date'] . " - " . $row2['time'] . " - " . $row2['doctor'] . "</li>";
              }
              echo "</ul>";
            } else {
              echo "<p>No upcoming appointments.</p>";
            }
            echo "</section>";
          }
        } else {
          echo "<p>No results found.</p>";
        }
      }

      // Close database connection
      $conn->close();
    ?>
  </main>
</body>
</html>