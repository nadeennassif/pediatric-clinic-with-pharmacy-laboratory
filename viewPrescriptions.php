<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Prescriptions</title>
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
    <h1>Patient Prescriptions</h1>
  </header>
  <main>
    <section>
      <h2>Search by Patient name</h2>
      <form method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <button type="submit" name="submit">Submit</button>
      </form>
    </section>
    <?php
      // Connect to database
      include_once("pages/conn.php");

      // Search for patient record if search query is submitted
      if (isset($_GET['submit'])) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM prescription WHERE patient_name LIKE '%$search%'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
          // Output patient information and appointments
          while($row = $result->fetch_assoc()) {
            echo "<section>";
            echo "<h2>Prescription Information</h2>";
            echo "<p>id: " . $row['id'] . "</p>";
            echo "<p>patient_name: " . $row['patient_name'] . "</p>";
            echo "<p>medication_name: " . $row['medication_name'] . "</p>";
            echo "<p>dosage: " . $row['dosage'] . "</p>";
            echo "<p>frequency: " . $row['frequency'] . "</p>";
            echo "<p>instructions: " . $row['instructions'] . "</p>";
            echo "</section>";
          }
        } else {
          echo "<p>No results found.</p>";
        }
      }
    ?>
    <li><a href="index.php" class="nav-item back-home">
            <i class=""></i>
            <span>Back to home</span>
          </a></li>
  </main>
</body>
</html>