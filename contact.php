<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <?php include "navbar.php" ?>
  </header>

  <div class="form-container">
    <h2>Contact Me</h2>
    <form action="php/contact.php" method="POST">
      <input type="text" name="name" placeholder="Your Name" /><br />
      <input type="email" name="email" placeholder="Your Email"  /><br />
      <textarea name="message" placeholder="Your Message" rows="5" ></textarea><br />
      <button type="submit">Send Message</button>
    </form>
  </div>
</body>
</html>
