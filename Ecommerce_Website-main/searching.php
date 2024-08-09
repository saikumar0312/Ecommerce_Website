<?php
include 'connect.php';

// Fetch products based on search keyword
if (isset($_GET['search'])) {
    $keyword = filter_var($_GET['search'],FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$keyword%' OR product_brand LIKE '%$keyword%'";
} else {
    $sql = "SELECT * FROM products";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="project.css">
    <style>
        /* project.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.search-list-container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.search-list-container h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.search-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
}

.search-card {
    width: 250px;
    background-color: #f9f9f9;
    border-radius: 5px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    margin-top: 50px;
}

.search-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.search-card h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.search-card p {
    margin: 5px 0;
    color: #666;
}

.product-image {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo border">
                <div class="logo"></div>
            </div>
            <div class="nav-address border">
                <p class="address-first">delever to</p>
                <div class="add-icon">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class="address-second">india</p>
                </div>
            </div> 
            <form action="searching.php" method="get" class="nav-search border">
                <input type="text" name="search" placeholder="Search products" class="search-input">
                <button type="submit" class="search-icon">
                   <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form> 
            <div class="nav-singIn border">
                <p><span><a href="login.php">SingIn</a></span></p>
                <div class="account-icon ">
                    <i class="fa-regular fa-circle-user"></i>
                    <p class="nav-second">Account</p>
                </div>
            </div> 
            <div class="nav-brands border">
                <p><span>Product</span></p>
                <p class="nav-second">&Brands</p>
            </div>
            <div class="nav-cart border">
                <a href="view_product.php"><i class="fa-solid fa-cart-shopping"></i></a>
                Cart
            </div> 
        </div>
        <div class="panel">
            <div class="panel-all">
                <i class="fa-solid fa-bars"></i>
                All
            </div>
            <div class="panel-option">
                <a href="project.php" class="nav-link">Home</a>
                <a href="project.php" class="nav-link">New</a>
                <a href="project.php" class="nav-link">Shop</a>
                <a href="about_contact.html">About</a>
                <a href="about_contact.html">Contact</a>
                <a href="index.php">Add product</a>
                <a href="view_product.php">view product</a>
            </div>
        </div>
    </header>

        
        <!-- Display products -->
        <div class="search-grid">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='search-card'>";
                    echo "<h3>" . $row['product_name'] . "</h3>";
                    echo "<p>Brand: " . $row['product_brand'] . "</p>";
                    echo "<p>Price: $" . $row['product_price'] . "</p>";
                    echo "<p>Items: " . $row['product_items'] . "</p>";
                    echo "<img src='images/" . $row['product_image'] . "' alt='" . $row['product_name'] . "' class='product-image'>";
                    echo "</div>";
                }
            } else {
                echo "No products found.";
            }
            ?>
        </div>
    </div>
</body>
</html>