<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'doctor'){
    header("Location: index.php?dashboard=unauthorized");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="DoctorStyle.css">
    <style>
        body {
            background-image: url("doccc.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="container">
    <li><a href="index.php" class="nav-item back-home">
            <i class=""></i>
            <span>Back to Home</span>
          </a></li>
        <div class="card">
            <div class="cover">
                <h1>Write Prescription</h1>
                <h1>Write Prescription</h1>
            </div>
            <div class="content">
                <h3>More Details</h3>
                <p>Click On 'Click Me' To Navigate To Write Prescription</p>
                <a href="Pres.html">Click Me</a>
            </div>
        </div>
        <div class="card">
            <div class="cover">
                <h1>Patient's Appointments</h1>
                <h1>Patient's Appointments</h1>
            </div>
            <div class="content">
                <h3>More Details</h3>
                <p>Click On 'Click Me' To Navigate To Patient's Appointments</p>
                <a href="PatientApp.php">Click Me</a>
            </div>
        </div>
        <div class="card">
            <div class="cover">
                <h1>Patient's  Results</h1>
                <h1>Patient's  Results</h1>
            </div>
            <div class="content">
                <h3>More Details</h3>
                <p>Click On 'Click Me' To Navigate To Patient's Lab Tests And Results</p>
                <a href="Results.php">Click Me</a>
            </div>
        </div>
        <div class="card">
            <div class="cover">
                <h1>Patient's Medical Record</h1>
                <h1>Patient's Medical Record</h1>
            </div>
            <div class="content">
                <h3>More Details</h3>
                <p>Click On 'Click Me' To Navigate To View Patient's Medical Record</p>
                <a href="PatientMR.php">Click Me</a>
            </div>
        </div>
        <div class="logo">
            <img src="kidsville(2).png" alt="Logo">
        </div>
    </div>
</body>
</html>