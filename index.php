<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DECH_TECH - Home</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  
  
  <header>
    <?php include "navbar.php" ?>
  </header>

  
  <section class="hero-banner">
    <div class="hero-content">
      <h2>Discover Your Style</h2>
      <p>Explore premium fashion, accessories & more. Trendy, affordable, and uniquely you!</p>
      <a href="products.php" class="btn">Shop Now</a>
    </div>
  </section>

  
  <section class="testimonials">
    <h3>What Our Customers Say</h3>
    <div class="testimonial-box">
      <div class="testimonial">
        <p>"Amazing quality! Got my delivery in just 2 days!"</p>
        <h5>- Ithaf</h5>
      </div>
      <div class="testimonial">
        <p>"I love the stylish design. Super comfy and affordable."</p>
        <h5>- Nazif</h5>
      </div>
    </div>
  </section>

  
  <section class="newsletter">
    <h3>Subscribe to Our Newsletter</h3>
    <p>Be the first to hear about offers, updates and trends!</p>
    <form onsubmit="event.preventDefault(); alert('Thank you for subscribing!')">
      <input type="email" placeholder="Enter your email" required />
      <button>Subscribe</button>
    </form>
  </section>


  <footer>
    <p>&copy; 2025 SimpleShop. All rights reserved.</p>
  </footer>

</body>
</html>
