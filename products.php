<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Our Products</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>

  
  <header>
      <?php include "navbar.php" ?>
  </header>

  
  <section class="products-section">
    <div class="overlay">
      <h2>Explore Our Latest Collection</h2>
      <div class="product-grid">

        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '
              <div class="product-card">
                <img src="' . $row["image"] . '" alt="' . $row["name"] . '" />
                <h3>' . $row["name"] . '</h3>
                <p>' . $row["description"] . '</p>
                <span>$' . $row["price"] . '</span>
                <button onclick="addToCart(\'' . addslashes($row["name"]) . '\', ' . $row["price"] . ')">Add to Cart</button>
              </div>
            ';
          }
        } else {
          echo "<p>No products available.</p>";
        }

        $conn->close();
        ?>

      </div>
    </div>
  </section>

  <script>
    function addToCart(name, price) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.push({ name, price, qty: 1 });
      localStorage.setItem('cart', JSON.stringify(cart));
      alert(name + " added to cart!");
    }
  </script>

</body>
</html>
