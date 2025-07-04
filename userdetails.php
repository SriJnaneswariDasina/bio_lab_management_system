<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Panel View</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
    }

    .sidebar {
      background: -webkit-linear-gradient(rgba(19, 134, 117, 0.73), #ac873624);
      width: 80px;
      color: white;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      gap: 30px;
      position: fixed;
    }

    .sidebar a {
      color: white;
      font-size: 24px;
      text-decoration: none;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .sidebar a:hover {
      color: #b7e4c7;
    }

    .label {
      font-size: 11px;
      color: white;
      text-align: center;
      margin-top: 5px;
    }

    .title {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 10px 20px;
      background: -webkit-linear-gradient(#ac873624, rgba(19, 134, 117, 0.6));
      margin-left: 80px;
    }

    .title .logo {
      width: 50px;
      height: 50px;
    }

    h1 {
      margin: 0;
      font-size: 24px;
      color: rgb(119, 164, 146);
    }

    .student-section {
      display: flex;
      gap: 24px;
      margin-left: 85px;
      padding: 24px;
    }

    .student-list, .student-detail {
      flex: 1;
      background: white;
      border-radius: 8px;
      padding: 16px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .student-list h2 {
      margin-top: 0;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .student-item {
      padding: 10px;
      border-bottom: 1px solid #e5e7eb;
    }

    a {
      margin: 0;
      font-size: 24px;
      color: rgb(0, 0, 0);
      text-decoration: initial;
    }

    a:hover {
      color: white;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <a href="#" title="Manage Students">
      <i class="fas fa-user-graduate"></i>
      <div class="label">Students</div>
    </a>
    <a href="lab.html" title="Lab Components">
      <i class="fas fa-microscope"></i>
      <div class="label">Lab</div>
    </a>
    <a href="timetable.html" title="Edit Timetable">
      <i class="fas fa-calendar-alt"></i>
      <div class="label">Timetable</div>
    </a>
  </div>

  <div class="title">
    <img class="logo" src="images/logo.png" alt="Logo">
    <h1><a href="admin.php">Evergreen Ridge University</a> </h1>
  </div>

  <div class="student-section">
    <?php
      @include 'database.php';
      $conn = mysqli_connect("localhost", "root", "", "bio_lab_management");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $id = $_GET['id'] ?? '';

      $sql = "SELECT * FROM student_registration WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
    ?>

    <div class="student-list">
      <h2>Student</h2>
      <?php
        if ($result && mysqli_num_rows($result) > 0) {
          $student = mysqli_fetch_assoc($result);
          echo "<div class='student-item'>{$student['Name']}</div>";
        } else {
          echo "<div class='student-item'>Student not found</div>";
        }
      ?>
    </div>

    <div class="student-detail" id="student-detail">
      <?php
        if (isset($student)) {
          echo "<h3>{$student['Name']}</h3>";
          echo "<p><strong>Email:</strong> {$student['Email']}</p>";
          echo "<p><strong>Registration Number:</strong> {$student['Registration_number']}</p>";
          echo "<p><strong>Phone Number:</strong> {$student['Phone']}</p>";
          echo "<p><strong>Degree:</strong> {$student['Degree']}</p>";
        } else {
          echo "<h3>No student data available</h3>";
        }
        mysqli_close($conn);
      ?>
    </div>
  </div>
</body>
</html>
        