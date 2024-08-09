<?php include 'conn.php';
  if(isset($_POST['Regester'])){
    $Name=$_POST['Name'];
    $emailid=$_POST['emailid'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    
  // Validate email format
  if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email format';
    exit;
  }
    

  // Hash the password securely
  $costFactor = 12; // Adjust this value as needed
  $hashed_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => $costFactor]);
  

  // Check for existing email (optional, for stricter validation)
  $check_email_sql = "SELECT emailid FROM usermaster WHERE emailid = ?";
  $stmt = $conn->prepare($check_email_sql);
  $stmt->bind_param('s', $emailid);
  $stmt->execute();
  $stmt->store_result();
  $email_exists = $stmt->num_rows > 0;
  $stmt->close();

  if ($email_exists) {
    echo 'Email already exists';
    exit;
  }

  // Insert user data into database
  $insert_query= "INSERT INTO usermaster (Name, emailid, gender, password)
  VALUES ('$Name', '$emailid', '$gender', '$hashed_password')";
  
 if( $insert_query){
 
     if ($conn->query($insert_query) === TRUE) {
         echo "New record created successfully";
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }
       
      $conn->close();
    

 
 }else{
     echo "error"; 
 }


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
    
    
    <!--form section-->
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
    margin-top:0px;">
     
    
        <div>
            <h3 class="heading"> Sign Up</h3>
            <form action = "" class="add-products" method="post" enctype="multipart/form-data">
                <input type="text" name="Name"placeholder="Enter Your Name" class="input-fields" required>
                <input type="text" name="emailid"  placeholder="Enter Your Email Id" class="input-fields" required>
                <input type="text" name="gender"  placeholder="Enter Your gender" class="input-fields" required>
                <input type="text" name="password" placeholder="Enter Password" class="input-fields" required >
                <input type="SUbmit" name="Regester" class="submit-btn" value="Regester" id="registerbtn">
            </form>
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