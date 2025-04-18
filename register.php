<?php

session_start();
include 'connection.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    
    $checkQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo "Email already registered. Please use another.";
    } else {
        
        $insertQuery = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful! <a href='../login.php'>Login here</a>";
        } else {
            echo "Something went wrong. Please try again.";
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="form-container">
    <h2>Register</h2>
    <form action="register.php" method="POST">
      <input type="text" name="name" placeholder="Full Name" /><br />
      <input type="email" name="email" placeholder="Email" /><br />
      <input type="password" name="password" placeholder="Password"  /><br />
      <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
</body>
</html>
