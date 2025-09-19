<?php
error_reporting(false);
session_start();
include("include/db.php");
include("functions/function.php");
// Check if the product ID is set
if (isset($_GET['pro_id'])) {
    global $con;
    $pro_id = $_GET['pro_id'];

    // Fetch product details
    $get_product = "SELECT * FROM product WHERE product_id = '$pro_id' ";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);

    // Assign product details to variables
    $p_title = $row_product['product_title'];
    $p_img1 = $row_product['product_img1'];
    $p_img2 = $row_product['product_img2'];
    $p_img3 = $row_product['product_img3'];
    $p_price = $row_product['product_price'];
    $p_actual_price=$row_product['actual_price'];
    $p_desc = $row_product['product_desc'];
    $p_cat_id = $row_product['cat_id'];

    // Fetch category title based on the product category ID
    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $p_title;?> - E-Commerce Website</title>
    <style>
        #carousel-image { 
            height: 400px; 
        }
        .product-info-box { 
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px; 
            background-color: #f9f9f9;
         }
        .product-info-box h1 {
             margin-bottom: 20px; 
            }
    </style>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Top Bar Start -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">Welcome Guest</a>
                <a href="#" id="link">Shopping Cart Total Price:₹ <?php price_count();?> Total items:<?php item();?></a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="customer_registration.php" id="link">Register</a></li>
                    <li><a href="checkout.php" id="link">My Account</a></li>
                    <li><a href="card.php" id="link">Cart</a></li>
                    <li><a href="login.php" id="link">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navbar Start -->
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="shop.php">Shop</a></li>
                        <li><a href="checkout.php">My Account</a></li>
                        <li><a href="card.php">Shopping Cart</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </div>
                <a href="cart.php" class="btn btn-primary navbar-btn right" id="click">
                    <i class="fa fa-shopping-cart"></i> <span><?php item();?> Items in Cart</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="result.php">
                        <div class="input-group">
                            <input type="text" name="user_query" id="user_query" placeholder="Search" class="form-control" required>
                            <span class="input-group-btn">
                                <button type="submit" value="Search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Content Start -->
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Shop</li>
                    <li><a href="shop.php?p_cat=<?php echo $p_cat_id;?>"><?php echo $p_cat_title; ?></a></li>
                    <li><?php echo $p_title; ?></li>
                </ul>
            </div>

            <!-- Sidebar Start -->
            <div class="col-md-3">
                <?php include_once "include/sidebar.php"; ?>
            </div>
            <!-- Sidebar End -->

            <div class="col-md-9">
                <!-- Product Images Carousel Start -->
                <div class="row" id="productmain">
                    <div class="col-sm-6">
                        <div id="mainimage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img src="admin_area/product_images_downloads/<?php echo $p_img1;?>" alt="Product Image 1" class="img-responsive" id="carousel-image"></center>
                                    </div>
                                    <div class="item">
                                        <center><img src="admin_area/product_images_downloads/<?php echo $p_img2;?>" alt="Product Image 2" class="img-responsive" id="carousel-image"></center>
                                    </div>
                                    <div class="item">
                                        <center><img src="admin_area/product_images_downloads/<?php echo $p_img3;?>" alt="Product Image 3" class="img-responsive" id="carousel-image"></center>
                                    </div>
                                </div>
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="product-info-box">
                            <h1 class="text-center"><?php echo $p_title; ?></h1>
                            <?php
                              addcart();
                            ?>
                            <form action="details.php?add_cart=<?php echo $pro_id;  ?>" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Product Quantity</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" id="product_qty" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Product Size</label>
                                    <div class="col-md-7">
                                        <select name="product_size" id="product_size" class="form-control">
                                            <option value="0">Select a Size</option>
                                            <option value="Small">Small (S)</option>
                                            <option value="Medium">Medium (M)</option>
                                            <option value="Large">Large (L)</option>
                                            <option value="Extra Large">Extra Large (XL)</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price">₹ <?php echo $p_price;  ?>&nbsp;&nbsp;&nbsp;₹ <strike><?php echo $p_actual_price?></strike></p>
                                <p class="text-center button">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product Details Start -->
                <div class="box" id="details">
                    <h4 class="text-center">Product Details</h4>
                    <p><?php ?></p>
                    <h4 class="text-center">Available Sizes</h4>
                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                        <li>Extra Large</li>
                    </ul>
                </div>
                <!-- Product Details End -->

                <!-- You may also like products -->
                <div id="row same-height-row">
                    <!-- col-sm-3 start -->
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">You may also like these products</h3>
                        </div>
                    </div>
                    <!-- col-sm-3 end -->
                     <?php
                       $get_product="SELECT *FROM product ORDER BY 1 LIMIT 0,3";
                       $run_product=mysqli_query($con,$get_product);
                       while($res=mysqli_fetch_array($run_product)){
                          $pro_id=$res['product_id'];
                          $product_title=$res['product_title'];
                          $product_price=$res['product_price'];
                          $product_img1=$res['product_img1'];
                          echo "
                           <div class='center-responsive col-md-3'>
                            <div class='product  same-height'>
                             <a href='details.php?pro_id='$pro_id' '>
                              <img src='admin_area/product_images/$product_img1' id='image' class='img-responsive' height='200px' width='200px'/>
                             </a>
                             <div class='text'>
                               <h3><a href='details.php?pro_id=$pro_id' id='hide'>$product_title</a></h3>
                               <p class='price'>₹ $product_price</p>
                             </div>
                            </div>
                           </div>
                          
                          ";
                       }                     
                     ?>
                    
                    
                    <!-- <div class="center-responsive col-md-3">
                        <div class="product same-height">
                            <a href="#">
                                <img src="admin_area/product_images_downloads/laptop2.jpeg" class="img-responsive" alt="Laptop2">
                            </a>
                            <div class="text">
                                <h3><a href="#">Laptop Mackbook</a></h3>
                                <p class="price">₹ 1,90,000</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

    <!-- Footer Include -->
    <?php include "include/footer.php"; ?>

    <!-- JavaScript Include -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
