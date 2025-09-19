<?php
 session_start();
//  error_reporting(false);
 include("include/db.php");
 include("functions/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!-- Link Style Folder  -->
     <link rel="stylesheet" href="style/style.css">
    <!-- CSS cdn link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Font Awesome Bootstrap  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- Top Bar Start -->
    <div id='top'>
        <!-- Container Start -->
       <div class="container">
          <div class="col-md-6 offer">
             <a href="#" class="btn btn-success btn-sm">
             <?php
                 if(!isset($_SESSION['c_email'])){
                   echo "Welcome Guest";
                 }else{
                  echo "Welcome : ".$_SESSION['c_email'];
                 }
                ?>
             </a>
             <a href="#" id="link">Shopping Cart Total Price:₹ <?php price_count()?> Total items:<?php item();?></a>
          </div>
          <div class="col-md-6">
            <ul class="menu">
                <li>
                    <a href="customer_registration.php" id="link">Registator</a>
                </li>
                <li>
                    <a href="customer/my_account.php" id="link">MyAccount</a>
                </li>
                <li>
                    <a href="card.php" id="link">Go Cart</a>
                </li>
                <li>
                    <a href="login.php" id="link">
                    <?php
                      if(!isset($_SESSION['c_email'])){
                        echo "<a href='checkout.php' id='hide' name='hide'>Login</a>";
                      }else{
                        echo "<a href='logout.php' id='hide' name='hide'>Logout</a>";
                      }
                     ?>
                    </a>
                </li>
            </ul>
          </div>
       </div>
       <!-- Container End -->
    </div>
    <!-- Top Bar End -->
     <!-- Start Navbar -->
     <div class="navbar navbar-default" id='navbar'>
        <div class="container">
            <div class="navbar-header">
                <!-- <a class="navbar-brand nome" href="index.php">
                    <img src="images/logo.jpeg" alt="Image Not Found" srcset="" class="hidden-xs">
                    <img src="images/small.jpeg" alt="Image Not Found" srcset="" class="visible-xs">
                </a> -->
                <button type="button" class="navbar-toggle" data-toggle='collapse' data-target='#navigation'>
                   <span class="sr-only">Toggle Navigation</span>
                   <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="navbar-toggle" data-target="#search">
                  <span class="sr-only"></span>
                  <i class="fa fa-search"></i>
                </button>    
            </div>

            <div class="navbar-collapse collapse" id='navigation'>
                <!-- Padding Nav Start -->
                <div class="padding-nav">
                   <ul class="nav navbar-nav navbar-left">
                      <li >
                        <a href="index.php" >Home</a>
                      </li>
                      <li >
                        <a href="shop.php">Shop</a>
                      </li>
                      <li >
                        <a href="customer/my_account.php" >MyAccount</a>
                      </li>
                      <li >
                        <a href="card.php" >Shopping cart</a>
                      </li>
                      <li >
                        <a href="about.php" >AboutUs</a>
                      </li>
                      <li >
                        <a href="services.php" >Services</a>
                      </li>
                      <li >
                        <a href="contactus.php" >ContactUs</a>
                      </li>

                   </ul>
                </div>
              <!-- Padding Nav End -->
              
              <a href="card.php" class="btn btn-primary navbar-btn right" id="click">
                 <i class='fa fa-shopping-cart'></i>
                 <!-- <i class="fa-solid fa-cart-flatbed"></i> -->
                 <span > <?php item();?> Items in Card</span>
              </a>
              <div class="navbar-collapse collapse right" >
                 <button type='button' class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search" >
                   <span class="sr-only" >Toggle Search</span>
                   <i class="fa fa-search"></i>
                 </button>
              </div>
              <div class="collapse clearfix" id="search">
                 <form class="navbar-form" method="get" action="result.php">
                    <div class="input-group">
                        <input type="text" name="user_query" id="user_query" placeholder="Search" 
                          class="form-control" required>
                        <span class="input-group-btn">
                          <button type="submit" value="Sreach" name="search" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                          </button>
                          </span>
                    </div>
                 </form>
              </div>

            </div>
        </div>
    </div>
     <!-- End Navbar -->

      <div id='content'>
         <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                   <li><a href="index.php" id='hide' name='hide'>Home</a></li>
                   <li>
                    <?php
                        if(!isset($_SESSION['c_email'])){
                            echo "<a href='checkout.php' id='hide' name='hide'>MyAccount</a>";
                         }else{
                            echo "<a href='customer/my_account.php?my_order' id='hide' name='hide'>MyAccount</a>";
                         }
                    ?>
                   </li>
                </ul>
            </div>
          <!-- 6 Product End -->
           <!-- Col md-9 start -->
             <div class="col-md-9" id="cart">
               <div class="box" >
                  <form action="card.php" method="post" enctype="multipart/form-data">
                     <h1>Shopping Cart</h1>
                     <?php
                      $ip_address = getUserIp();
                      $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_address'";
                      $run_cart = mysqli_query($con, $select_cart);
                      $count = mysqli_num_rows($run_cart);
                      $total = 0;
                     ?>
                     <p class="text-muted ">Currently You have <b><?php echo $count;?></b> item in your cart</p>
                     <!-- Table Start -->
                      <div class="table-responsive">
                         <table class="table table-striped table-bordered">
                           <thead>
                             <tr>
                               <th colspan="2">Product</th> 
                               <th>Quantity</th>
                               <th>Unit Price</th>
                               <th>Size</th>
                               <th >Delete</th>
                               <th >Sub Total</th>
                             </tr>
                           </thead>
                           <?php
                            while($row = mysqli_fetch_array($run_cart)){
                              $pro_id = $row['p_id'];
                              $qty = $row['qty'];
                              $size = $row['size'];

                              $get_product = "SELECT * FROM product WHERE product_id='$pro_id'";
                              $run_product = mysqli_query($con, $get_product);
                              if ($res = mysqli_fetch_array($run_product)) {
                                $product_img1 = $res['product_img1'];
                                $product_title = $res['product_title'];
                                $product_price = $res['product_price'];
                                $sub_total = $product_price * $qty;
                                $total += $sub_total;
                              } else {
                                $product_img1 = '';
                                $product_title = 'Unknown Product';
                                $product_price = 0;
                                $sub_total = 0;
                              }

                    ?>
                           <tr>
                             <td style="width: 80px;"><img src="admin_area/product_images/<?php echo $product_img1; ?>" class="img-responsive img-thumbnail" alt="Product"></td>
                             <td style="vertical-align: middle;">
                               <strong><?php echo $product_title;?></strong>
                             </td>
                             <td style="vertical-align: middle;"><?php echo $qty;?></td>
                             <td style="vertical-align: middle;">₹ <?php echo $product_price;?></td>
                             <td style="vertical-align: middle;"><?php echo $size;?></td>
                             <td style="vertical-align: middle;"><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
                             <td style="vertical-align: middle;">₹ <?php echo $sub_total;?></td>
                           </tr>
                           <?php
                            }
                           ?>
                           <tfoot>
                             <tr>
                               <th colspan="6" class="text-right">Total</th>
                               <th>₹ <?php echo $total;?></th>
                             </tr>
                           </tfoot>
                         </table>
                      </div>
                      <!-- Table End -->
                       <!-- Chevron Button  Start-->
                      <div class="box-footer">
                         <div class="pull-left">
                           <a href="index.php" class="btn btn-default">
                             <i class="fa fa-chevron-left"></i> Continue Shopping
                           </a>
                         </div>
                         <div class="pull-right">
                           <button class="btn btn-default" type="submit" id='update' name='update' value="update Cart" formaction="card.php">
                             <i class="fa fa-refresh"> Update Cart</i>
                           </button>
                           <a href="checkout.php" class="btn btn-primary">
                             Proceed to checkout <i class="fa fa-chevron-right"></i>
                           </a>
                         </div>
                      </div> 
                      <!--Cheron Button End -->
                  </form>
               </div>
                
               <!-- Update Function Start -->
               <?php
                 function update_cart(){
                   global $con;
                    if(isset($_POST['update'])){
                       foreach($_POST['remove'] as $remove_id){
                          $delete_product="DELETE FROM cart WHERE p_id='$remove_id' ";
                          $run_product=mysqli_query($con,$delete_product);
                          if($run_product){
                            header("Location:card.php");
                          }
                       }
                    }
                 }
                 echo $update=update_cart();
               ?>
               <!-- Update Function End -->

               <!-- Box Start -->
               <div id='row same-height-row' >
                   <div class="col-md-3 col-sm-6" id='cart'>
                      <div class="box same-height headline">
                         <h3 class="text-center">You also Like These Products <?php echo $count;?></h3>
                      </div>
                   </div>
                    <!-- center-responsive col-md-3 start -->
                    <?php
                     $get_product="SELECT * FROM product ORDER BY 1 ASC LIMIT 0,3"; 
                     $run_product=mysqli_query($con,$get_product);
                     while($row=mysqli_fetch_array($run_product)){
                     $product_img1=$row['product_img1'];
                     $product_title=$row['product_title'];
                     $product_price=$row['product_price'];
                     $actual_price=$row['actual_price'];

                    ?>
                    
                   <div class="center-responsive col-md-3">
                       <div class="">
                         <a href="">
                            <img src="admin_area/product_images/<?php echo $product_img1;?>" class='img-responsive' alt="" srcset="" id='image' name='image'>
                         </a>
                         <div class="text">
                             <h3><a href="details.php" id='hide'><?php echo $product_title;?></a></h3>
                             <p class="price">₹ <?php echo $product_price;?>&nbsp;&nbsp;&nbsp;₹ <strike><?php echo $actual_price;?></strike></p>
                         </div>
                       </div>
                   </div>
                   <?php
                     }
                   ?>
                   <!-- center-responsive col-md-3 end -->
                </div>
               <!-- Box End -->

              </div>
              <!-- Order Summary Start -->
               <!-- col-md-3 start -->
                <div class="col-md-3">
                   <div class="box" id='ordersummary'>
                      <div class="box-header">
                        <h3>Order Summary</h3>
                      </div>
                      <p class="text-muted">
                         Shopping and additional charges are calculated based on the values you have entered.
                      </p>
                   <table class="table">
                    <tbody>
                      <tr>
                        <td>Order Subtotal</td>
                        <th>₹ <?php echo $total;?></th>
                      </tr>
                      <tr>
                        <td>Shipping and Delivery Charge</td>
                        <?php
                          $charge=99;
                        ?>
                        <td>₹ <?php echo $charge; ?></td>
                      </tr>

                <!-- Display discount if applicable -->
                <?php
                $total_after_discount = $total + $charge;
                if ($total_after_discount > 1000) {
                    $discount = $total_after_discount * 0.05;
                } else {
                    $discount = 0;
                }
                ?>
                <tr>
                    <td>Discount (5%)</td>
                    <td>- ₹ <?php echo $discount;?></td>
                </tr>

                <tr class="total">
                    <td>Total</td>
                    <th>₹ <?php echo $total_after_discount - $discount;?></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Order Summary End -->

               <!-- col-md-3 end -->

               <!-- Order Summary End -->
              <!--  Col-md-end-->
      </div>
      
      
    </div>
    
    <!-- Footer Include -->
     <?php
      include "include/footer.php";
     ?>
      <!-- JavaScript Include -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
