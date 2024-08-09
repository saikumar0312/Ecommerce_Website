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
                <a href="#home" class="nav-link">Home</a>
                <a href="#new" class="nav-link">New</a>
                <a href="#shop" class="nav-link">Shop</a>
                <a href="about_contact.html">About</a>
                <a href="about_contact.html">Contact</a>
                <a href="index.php">Add product</a>
                <a href="view_product.php">view product</a>
            </div>
        </div>
    </header>
    
    <div class="home">
        <div class="header-slider">
            <a href="" class="control-pre">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a href="" class="control-next">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <ul >
                <img src="images/slider1.jpg" class="header-img" alt="">
                <img src="images/slider2.jpg" class="header-img" alt="">
                <img src="images/slider3.jpg" class="header-img" alt="">
                <img src="images/slider6.jpg" class="header-img" alt="">
            </ul>
        </div>
        <div class="box-row header-box">
            <div class="box-col">
                <h3>Lakme EID Special</h3>
                <img src="images/box1.jpeg">
                <a href="/">Shop More</a>
            </div>
            <div class="box-col">
                <h3>Lakme Under $25</h3>
                <img src="images/box2.jpeg">
                <a href="/">Shop More</a>
            </div>
            <div class="box-col">
                <h3>MAC Deal Of The Day</h3>
                <img src="images/box3.jpeg">
                <a href="/">Shop More</a>
            </div>
            <div class="box-col">
                <h3>Fitme Free Delevery</h3>
                <img src="images/box4.png">
                <a href="/">Shop More</a>
            </div>
            <div class="box-col">
                <h3>Skin Care For Morning Glow</h3>
                <img src="images/box5.jpeg">
                <a href="/">Shop More</a>
            </div>
            <div class="box-col">
                <h3>Kesh King For Hair Growth</h3>
                <img src="images/box6.jpeg">
                <a href="/">Shop More</a>
            </div>
            <div class="box-col">
                <h3>Hair Oli</h3>
                <img src="images/box7.jpeg">
                <a href="/">Shop More</a>
            </div>
            <div class="box-col">
                <h3>Skin Care</h3>
                <img src="images/box8.jpeg">
                <a href="/">Shop More</a>
            </div>
        </div>
    </div>
    <div class="new">
        <div class="product-slider">
            <h2>New Products</h2>
            <div class="Product">
                <img src="images/new1.jpg">
                <img src="images/new2.jpg">
                <img src="images/new3.jpg">
                <img src="images/new4.jpg">
                <img src="images/new5.jpg">
                <img src="images/new6.jpg">
                <img src="images/new7.jpg">
            </div>
        </div>
    </div>
    <div class="shop">
        <div class="deal-product">
            <h2>Deals under  ₹200</h2>
            <div class="Product">
                <div class="Product-card">
                    <div class="img-container">
                        <img src="images/box6.jpeg">
                    </div>
                    <div class="product-offer">
                        <p>30% off</p>
                    </div>
                    <p>₹200 List price: ₹117</p>
                    <h4>Offer till Midnight </h4>
                </div>
                <div class="Product-card">
                    <div class="img-container">
                        <img src="images/new1.jpg">
                    </div>
                    <div class="product-offer">
                        <p>25% off</p>
                    </div>
                    <p>₹300 List price: ₹150</p>
                    <h4>Offer till Midnight</h4>
                </div>
                <div class="Product-card">
                    <div class="img-container">
                        <img src="images/box7.jpeg">
                    </div>
                    <div class="product-offer">
                        <p>40% off</p>
                    </div>
                    <p>₹250 List price: ₹130</p>
                    <h4>Offer till Midnight </h4>
                </div>
                <div class="Product-card">
                    <div class="img-container">
                        <img src="images/new6.jpg">
                    </div>
                    <div class="product-offer">
                        <p>45% off</p>
                    </div>
                    <p>₹400 List price: ₹127</p>
                    <h4>Offer till midnight </h4>
                </div>
                <div class="Product-card">
                    <div class="img-container">
                        <img src="images/new5.jpg">
                    </div>
                    <div class="product-offer">
                        <p>60% off</p>
                    </div>
                    <p>500 List price: ₹190</p>
                    <h4>Offer till midnight </h4>
                </div>
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

    <script src="project.js"></script> 
</body>
</html>