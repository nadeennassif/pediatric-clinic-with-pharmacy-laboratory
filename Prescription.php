<?php
session_start();
include_once("pages/conn.php");
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $patient_name = $_POST['patient_name'];
  $medication_name = $_POST['medication_name'];
  $dosage = $_POST['dosage'];
  $frequency = $_POST['frequency'];
  $instructions = $_POST['instructions'];

  // Insert prescription data into database
  $query = "INSERT INTO prescription (patient_name, medication_name, dosage, frequency, instructions) VALUES ('$patient_name', '$medication_name', '$dosage', '$frequency', '$instructions');";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Prescription added successfully, show success message
    header("Location: dashboard.php?prescription=success");
    exit();
  } else {
    // Prescription not added, show error message
    header("Location: dashboard.php?prescription=error_query");
    exit();
  }
}

mysqli_close($conn);
?>