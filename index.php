<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $roll = htmlspecialchars($_POST['roll']);
    $course = htmlspecialchars($_POST['course']);
    $year = htmlspecialchars($_POST['year']);

   
    $data = "Name: $name | Roll No: $roll | Course: $course | Year: $year\n";
    file_put_contents("students.txt", $data, FILE_APPEND);

    $message = "✅ Student record saved successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Info Form - BCA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Student Information Form</h1>

  <?php if (!empty($message)) { echo "<p class='success'>$message</p>"; } ?>

  <form method="post" action="">
    <label for="name">Full Name:</label>
    <input type="text" name="name" required>

    <label for="roll">Roll Number:</label>
    <input type="text" name="roll" required>

    <label for="course">Course:</label>
    <input type="text" name="course" value="BCA" required>

    <label for="year">Year:</label>
    <select name="year" required>
      <option value="1st">1st Year</option>
      <option value="2nd">2nd Year</option>
      <option value="3rd">3rd Year</option>
    </select>

    <button type="submit">Save</button>
  </form>

  <h2>Saved Records</h2>
  <pre>
  <?php
  if (file_exists("students.txt")) {
      echo file_get_contents("students.txt");
  } else {
      echo "No records found yet.";
  }
  ?>
  </pre>
</body>
</html>
