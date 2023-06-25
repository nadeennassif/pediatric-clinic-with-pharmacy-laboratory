<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Information</title>
  <link rel="stylesheet" href="PatientMR.css">
  <style>
    body {
      background-image: url("MR.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body>
  <header>
    <h1>Patient Information</h1>
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
      include_once("pages/conn.php");

      // Search for patient record if search query is submitted
      if (isset($_GET['submit'])) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM patient WHERE name LIKE '%$search%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // Output patient information, medical history, test results, medications, and appointments
          while($row = $result->fetch_assoc()) {
            echo "<section>";
            echo "<h2>Patient Information</h2>";
            echo "<p>Name: " . $row['name'] . "</p>";
            echo "<p>DOB: " . $row['dob'] . "</p>";
            echo "<p>Address: " . $row['address'] . "</p>";
            echo "<p>Phone: " . $row['phone'] . "</p>";
            echo "</section>";
            echo "<section>";
            echo "<h2>Medical History</h2>";
            echo "<p>Past Medical History: " . $row['past_medical_history'] . "</p>";
            echo "<p>Current Medical Issues: " . $row['current_medical_issues'] . "</p>";
            echo "<p>Family Medical History: " . $row['family_medical_history'] . "</p>";
            echo "</section>";
            echo "<section>";
            echo "<h2>Test Results</h2>";
            echo "<p>Lab Test Results: " . $row['lab_test_results'] . "</p>";
            echo "<p>Imaging Test Results: " . $row['imaging_test_results'] . "</p>";
            echo "</section>";
            echo "<section>";
            echo "<h2>Medications</h2>";
            echo "<p>Current Medications: " . $row['current_medications'] . "</p>";
            echo "<p>Past Medications: " . $row['past_medications'] . "</p>";
            echo "</section>";
            echo "<section>";
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
            echo "<h3>Schedule an Appointment</h3>";
            echo "<form method='post'>";
            echo "<label for='date'>Date:</label>";
            echo "<input type='date' id='date' name='date' required>";
            echo "<label for='time'>Time:</label>";
            echo "<input type='time' id='time' name='time' required>";
            echo "<label for='doctor'>Doctor:</label>";
            echo "<input type='text' id='doctor' name='doctor' required>";
            echo "<input type='submit' name='submitAppointment' value='Schedule Appointment'>";
            echo "</form>";
            // Insert new appointment into database if form is submitted
            if (isset($_POST['submitAppointment'])) {
              $date = $_POST['date'];
              $time = $_POST['time'];
              $doctor = $_POST['doctor'];
              $patient_id = $row['id'];
              $sql3 = "INSERT INTO appointment (date, time, doctor, patient_id) VALUES ('$date', '$time', '$doctor', '$patient_id')";
              if ($conn->query($sql3) === TRUE) {
                echo "<p>New appointment scheduled successfully.</p>";
              } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
              }
            }
            echo "</section>";
          }
        } else {
          echo "<p>No results found.</p>";
        }
      }
    ?>
  </main>
</body>
</html>