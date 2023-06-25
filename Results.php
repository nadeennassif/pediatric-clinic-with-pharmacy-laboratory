<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient's Results</title>
  <link rel="stylesheet" href="Results.css">
  <style>
    body {
      background-image: url("resultsbck.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="kidsville(2).png" alt="Logo">
    </div>
  </header>
  <main>
    <h1>Patient's Results</h1>
    <?php
    // Connect to database
    include_once("pages/conn.php");

    // Handle search
    $results = [];
    if (isset($_POST['search'])) {
      $search_term = $_POST['search'];
      $query = "SELECT * FROM test_results WHERE patient_name LIKE '%$search_term%';";
      // echo $query."<br>";
      if($result = mysqli_query($conn, $query)){
        if (mysqli_num_rows($result) > 0) {
          $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
      }else{
        if(empty($_POST['search'])){
          echo "empty search<br>";
        }else{
          echo "error: ".mysqli_error($conn);
        }
      }
    }
    
    ?>
    <section class="search">
      <form method="post">
        <label for="search">Search for Patient:</label>
        <input type="text" id="search" name="search">
        <button type="submit">Search</button>
      </form>
    </section>
    <?php if (!empty($results)): ?>
    <section class="test-results">
      <h2>Lab Test Results</h2>
      <table>
        <thead>
          <tr>
            <th>Patient Name</th>
            <th>Test Name</th>
            <th>Result</th>
            <th>Reference Range</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($results as $result): ?>
          <tr>
            <td><?php echo $result['patient_name']; ?></td>
            <td><?php echo $result['test_name']; ?></td>
            <td><?php echo $result['result']; ?></td>
            <td><?php echo $result['reference_range']; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <p>Based on these test results, the patient should schedule a follow-up appointment with their doctor to discuss their cholesterol levels and any potential treatment options.</p>
    </section>
    <?php endif; ?>
    <section class="notes">
      <h2>Doctor's Notes</h2>
      <textarea placeholder="Enter notes here..."></textarea>
      <button>Save Notes</button>
    </section>
    <section class="follow-up">
      <h2>Follow-Up</h2>
      <p>Based on these test results, the doctor may recommend the following:</p>
      <ul>
        <li><a href="#">Schedule a follow-up appointment with your doctor</a></li>
        <li><a href="#">Schedule additional lab tests</a></li>
        <li><a href="#">Make lifestyle changes (e.g. exercise, diet)</a></li>
        <li><a href="#">Consider medication options</a></li>
        <li><a href="dashboard.php" class="nav-item back-home">
            <i class=""></i>
            <span>Back to dashboard</span>
          </a></li>
      </ul>
    </section>
  </main>
</body>
</html>