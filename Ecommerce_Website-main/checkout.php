<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        
        /* General Styles */
        body {
          font-family: 'Roboto', sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f5f5f5;
        }
        h2{
          text-align: center;
        }
        
        .checkout_container {
          max-width: 1200px;
          margin: 0 auto;
          padding: 40px;
          background-color: rgb(237, 246, 249);
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
          border-radius: 8px;
        }
        /* Product Display Styles */
        .products {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
          margin-bottom: 30px;
        }
        
        .product {
          width: 100%;
          margin-bottom: 30px;
          padding: 20px;
          background-color: darkcyan;
          color: white;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
          display: flex;
          align-items: center;
        }
        
        .product img {
          width: 200px;
          height: 150px;
          border-radius: 15px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          margin-right: 20px;
        }
        
        .product-info {
          flex-grow: 1;
        }
        
        .product-info h3 {
          margin: 0 0 10px;
          font-size: 24px;
        }
        
        .quantity input {
          width: 50px;
          padding: 8px;
          text-align: center;
          border: 1px solid #ccc;
          border-radius: 4px;
          font-size: 16px;
        }
        
        /* Total Amount Styles */
        #total {
          font-size: 24px;
          font-weight: bold;
          margin-top: 30px;
          text-align: right;
          color: darkcyan;
        }
        
        /* Form Styles */
        form {
          margin-top: 10px;
        }
        
        form label {
          margin-bottom: 10px;
          font-size: 16px;
          font-weight: bold;
        }
        
        form input {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          font-size: 16px;
        }
        
        /* Button Styles */
        button {
          background-color: darkcyan;
          color: #fff;
          border: none;
          padding: 12px 24px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          cursor: pointer;
          border-radius: 4px;
          transition: background-color 0.3s ease;
        }
        input[type="text"],
        input[type="radio"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        }

       /* Radio buttons */
        .radio{
          width:10px;
          margin-right: 10px;
          
        }
       button:hover {
          background-color:rgb(0, 109, 119);
        }
        </style>
</head>
<body>

    <div class="checkout_container">
     <h2>CheckOut</h2>

      <?php
        // Fetch product details from the database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        // Display product details
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo " <div class='product'>";
                echo " <img src='images/" . $row["product_image"] . "' alt='Product Image'>";
                echo " <div class='product-info'>";
                echo " <h3>" . $row["product_name"] . "</h3>";
                echo " Amount: $<span id='amount_" . $row["id"] . "'>" . $row["product_price"] . "</span><br>";
                echo " Quantity: <input type='number' id='quantity_" . $row["id"] . "' value='1' min='1' onchange='calculateAmount(" . $row["id"] . ")'>";
                echo " </div>";
                echo " </div>";
            }
        } else {
            echo "0 results";
        }
      ?>

        <div id="total">Total Amount: $0</div>
        <h2>Contact Information</h2>

        <form action="project.php" method="post">
           <label for="username">Username:</label>
           <input type="text" id="username" name="username"><br><br>
    
           <label for="phone">Phone Number:</label>
           <input type="text" id="phone" name="phone"><br><br>
    
           <label for="address">Address:</label>
           <input type="text" id="address" name="address"><br><br>
    
           <label for="payment">Please select your Payment Option:</label><br>
           <input type="radio" id="paytm" name="payment" value="Paytm" class="radio">
           <label for="paytm">Paytm</label><br>
    
           <input type="radio" id="gpay" name="payment" value="GPay" class="radio">
           <label for="gpay">GPay</label><br>
    
           <input type="radio" id="cod" name="payment" value="Cash on Delivery" class="radio">
           <label for="cod">Cash on Delivery</label><br><br>
    
           <button type="submit" style="float: right;">Place Order</button>
        </form>
    </div>

    <script>
        function calculateAmount(id) {
            var quantity = document.getElementById('quantity_' + id).value;
            var price = parseFloat(document.getElementById('amount_' + id).innerHTML);
            var amount = quantity * price;
            document.getElementById('amount_' + id).innerHTML = amount.toFixed(2);
            updateTotal();
        }

        function updateTotal() {
            var total = 0;
            var amounts = document.querySelectorAll('[id^="amount_"]');
            amounts.forEach(function(item) {
                total += parseFloat(item.innerHTML);
            });
            document.getElementById('total').innerHTML = "Total Amount: $" + total.toFixed(2);
        }

        // Call the updateTotal function after all the products are loaded
        window.onload = function() {
            updateTotal();
        };
    </script>
</body>
</html>