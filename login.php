<?php
// Start the session
session_start();
include 'connection.php';

$message = ""; // To display messages

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Check password (assuming plain text for now)
        if ($password === $row['password']) {
            $_SESSION['email'] = $email;
            // Redirect or show message
            header("Location: index.php");
            // $message = "Login successful! Welcome, " . $row['name'];
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <?php if (!empty($message)): ?>
      <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
      <input type="email" name="email" placeholder="Email" required /><br />
      <input type="password" name="password" placeholder="Password" required /><br />
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </div>
</body>
</html>
