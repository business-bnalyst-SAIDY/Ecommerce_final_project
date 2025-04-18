<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Cart</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
  <?php include "navbar.php" ?>
    <!-- <h1>My Cart</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="products.html">Products</a>
      <a href="checkout.html">Checkout</a>
    </nav> -->
  </header>

  <section class="cart-container">
    <h2>Your Selected Items</h2>
    <table id="cart-table">
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
      </tr>
    </table>
    <h3 id="cart-total"></h3>
  </section>

  <script>
  const cartTable = document.getElementById("cart-table");
  const totalTag = document.getElementById("cart-total");
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  function renderCart() {
    
    cartTable.innerHTML = `
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    `;

    let grandTotal = 0;

    cart.forEach((item, index) => {
      const total = item.price * item.qty;
      grandTotal += total;

      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${item.name}</td>
        <td>$${item.price.toFixed(2)}</td>
        <td>${item.qty}</td>
        <td>$${total.toFixed(2)}</td>
        <td><button onclick="deleteItem(${index})">Delete</button></td>
      `;

      cartTable.appendChild(row);
    });

    totalTag.innerText = `Grand Total: $${grandTotal.toFixed(2)}`;
  }

  function deleteItem(index) {
    cart.splice(index, 1); // remove item at index
    localStorage.setItem("cart", JSON.stringify(cart)); // update storage
    renderCart(); // re-render cart
  }

  // Initial render
  renderCart();
</script>


  <!-- <script>
    const cartTable = document.getElementById("cart-table");
    const totalTag = document.getElementById("cart-total");
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let grandTotal = 0;

    cart.forEach((item, index) => {
      const row = document.createElement("tr");
      const total = item.price * item.qty;
      grandTotal += total;

      row.innerHTML = `
        <td>${item.name}</td>
        <td>$${item.price.toFixed(2)}</td>
        <td>${item.qty}</td>
        <td>$${total.toFixed(2)}</td>
      `;

      cartTable.appendChild(row);
    });

    totalTag.innerText = `Grand Total: $${grandTotal.toFixed(2)}`;
  </script> -->
</body>
</html>
