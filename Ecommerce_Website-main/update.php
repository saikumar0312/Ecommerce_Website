<?php include 'connect.php';
// update logic if the update button is clicked whatever changes done inside the input field to access it


if (isset($_POST['update_product'])) { // Check if update button is submitted

  $update_product_id = $_POST['update_product_id'];
  $update_product_name = $_POST['update_product_name']; 
  $update_product_items = $_POST['update_product_items'];
  $update_product_price = $_POST['update_product_price'];
  $update_product_brand = mysqli_real_escape_string($conn, $_POST['update_product_brand']); // takes  characters in string for use in SQL statement

  // Construct the update query using prepared statements
  $sql = "UPDATE products 
          SET product_name = ?, product_items = ?, product_price = ?, product_brand = ? 
          WHERE id = ?";//we us question mark so that we can subsitude int char string 

  $stmt =$conn->prepare($sql);
  $stmt->bind_param('sssss',$update_product_name, $update_product_items, $update_product_price, $update_product_brand, $update_product_id);
  //tells the database what perameter are used
  $stmt->execute();

  // Check for errors and affected rows
  if ($stmt->error) {
    echo "Error: " . $stmt->error;
  } else {
    echo "Product updated successfully!";
  }

  $stmt->close();

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
    <div style="background-image: url('images/login-background.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    width: 100%;
    " >
    

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
                
                <p><span><a href="login.html">SingIn</a></span></p>
                
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

    
    <section class="edit_container">
         <!-- php code -->
         <?php
 //get method is used to get the id number
    if (isset($_GET['edit'])){
        $edit_id=$_GET['edit'];
        //echo $edit_id;
        //fetch the data
        //select all the data from the database but $edit_id should be same only then fetch the data
         $edit_query=mysqli_query($conn,"Select * from products where id=$edit_id");
         // checking if the number of rows is greater than 1 or not if greater than 1 only then fetch
         // only to edit one product
        if(mysqli_num_rows($edit_query)>0){
          $fetch_data=mysqli_fetch_assoc($edit_query);
          //fech the date in assocative array
         ?>
   <!-- creating a form & enctype is used to fetch the data, hidden is written to get id from db but will not be visible-->
    
   
     
    <form action=""  class="update_product"  method="post" enctype="multipart/form-data"
         class="update_product product_container_box">
            <input type="hidden" value="<?php echo $fetch_data['id']?>"name="update_product_id">
            <input type="text" class="input-field" required value="<?php echo $fetch_data['product_name']?>" name="update_product_name">
            <input type="number" class="input-field" required value="<?php echo $fetch_data['product_items']?>" name="update_product_items">
            <input type="number" class="input-field" required value="<?php echo $fetch_data['product_price']?>" name="update_product_price">
            <input type="text" class="input-field" required value="<?php echo $fetch_data['product_brand']?>" name="update_product_brand">
            <div class="btns">
                <input type="submit" class="edit_btn" value="Update Product"name="update_product">
                <input type="reset" id="close_edit" value="Cancel" class="cancel_btn">
                
                
            </div>
    </form>
  <?php
        }
    }   
  ?> 
 </section>
</body>
</html>