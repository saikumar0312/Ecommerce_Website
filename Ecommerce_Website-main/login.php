<?php include 'conn.php';

// Escape user input to prevent SQL injection
if(isset($_POST['login'])){


$email = mysqli_real_escape_string($conn, $_POST['emailid']);
$password= mysqli_real_escape_string($conn, $_POST['password']);

// Prepare a SELECT statement to prevent SQL injection
$sql = "SELECT * FROM usermaster WHERE emailid = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn));
}

// Bind values to for prepared statement
mysqli_stmt_bind_param($stmt, "s", $email);

// Execute the prepared statement
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
 
// Check if a user with the provided email exists
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    echo $row['password'];
    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Login successful
        session_start();
        $_SESSION['emailid'] = $row['emailid'];
        header('Location: project.php'); 
    } else {
        // Invalid password
        echo "Invalid email or password.";
    }
} else {
    // Email not found
    echo "Invalid email or password.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"href="project.css">
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
                
                <p><span><a href="regesterinfo.php">SingUp</a></span></p>
                
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
            <div class="panel-option">
                <a href="project.php" >Home</a>
                <a href="project.php" >New</a>
                <a href="project.php">Shop</a>
                <a href="about_contact.html">About</a>
                <a href="about_contact.html">Contact</a>
                <a href="index.php">Add product</a>
                <a href="view_product.php">view product</a>
            </div>
        </div>

       
    </header>
    

    <div style="background-image: url('images/login-background.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    width: 100%;
    " >
    <div class="product-container" style="
    background: rgb(225, 225, 225, 0.2);
    color: #fff;
    box-shadow: 1px 1px 23px #1f1f1f;
    position: relative;
    top: 20%;
    margin-top:0px;
    margin-bottom:0px;">
        <div>
            <h3 class="heading">Login</h3>
            <form action = "" class="add-products" name="login" method="post" enctype="multipart/form-data">
                <input type="text" name="emailid"  placeholder="emailid" class="input-fields" required>
                <input type="text" name="password" placeholder=" Password" class="input-fields" required >
                <input type="submit" name="login" class="submit-btn" value="Login">
                Don't have account? <a href="regesterinfo.php">Sign Up Now</a>
            </form>
        </div>
    </div>
    </div>
    
    <footer>
        <div class="foot-panel1">
            <ul class="list-container">
                <a class="footer-head">ABOUT US</a>
                <a>Team</a>
                <a>Delivery and Returns</a>
                <a>FAQ</a>
            </ul>
            <ul class="list-container">
                <a class="footer-head">LINK INFO</a>
                <a>Skin care</a>
                <a>Makeup</a>
                <a>New Product</a>
            </ul>
            <ul class="list-container">
                <a class="footer-head">SUPPORT</a>
                <a>Contact US</a>
                <a>Privacy&Policy </a>
                
            </ul>
            <ul class="list-container">
                <a class="footer-head">CONTACT US</a>
                <a>Allure@gmail.com</a>
                <a>phone:9894567219</a>
               
            </ul>
            
               

                
            
        </div>
    </footer>


    
</body>
</html>