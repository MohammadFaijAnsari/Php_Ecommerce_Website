<?php
 session_start();
 if(!isset($_SESSION['c_email'])){
  echo "<script>window.open('../checkout.php','_self')</script>";
 }else{
 include("../include/db.php");
 include("../functions/function.php");
 
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
    <!-- Font AwosomeBootstrap  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>

</style>
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
             <a href="#" id="link">Shopping Cart Total Price:₹ <?php price_count();?> Total items <?php item();?></a>
          </div>
          <div class="col-md-6">
            <ul class="menu">
                <li>
                    <a href="../customer_registration.php" id="link">Registator</a>
                </li>
                <li>
                    <a href="my_account.php" id="link">MyAccount</a>
                </li>
                <li>
                    <a href="../card.php" id="link">Go Cart</a>
                </li>
                <li>
                    <a href="../login.php" id="link">
                     <?php
                      if(!isset($_SESSION['c_email'])){
                        echo "<a href='../checkout.php' id='link'>Login</a>";
                      }else{
                        echo "<a href='../logout.php' id='link'>Logout</a>";
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
                    <img src="../images/flipkart.jpeg" height='40px' width='60px' alt="Image Not Found" id='logo' name='logo' class='logo' srcset="" class="hidden-xs" >
                    <img src="../images/small.jpeg" alt="Image Not Found" srcset="" class="visible-xs">
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
                        <a href="../index.php" >Home</a>
                      </li>
                      <li >
                        <a href="../shop.php">Shop</a>
                      </li>
                      <li >
                        <a href="my_account.php?my_order" >MyAccount</a>
                      </li>
                      <li >
                        <a href="../card.php" >Shopping Cart</a>
                      </li>
                      <li >
                        <a href="../about.php" >AboutUs</a>
                      </li>
                      <li >
                        <a href="../services.php" >Services</a>
                      </li>
                      <li >
                        <a href="../contactus.php" >ContactUs</a>
                      </li>

                   </ul>
                </div>
              <!-- Padding Nav End -->
              
              <a href="card.php" class="btn btn-primary navbar-btn right" id="click">
                 <i class='fa fa-shopping-cart'></i>
                 <!-- <i class="fa-solid fa-cart-flatbed"></i> -->
                 <span ><?php item();?> Items in Card</span>
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
                   <li><a href="../index.php" id='hide' name='hide'>Home</a></li>
                   <li>
                    <?php
                         if(!isset($_SESSION['c_email'])){
                            echo "<a href='../checkout.php' id='hide' name='hide'>MyAccount</a>";
                         }else{
                            echo "<a href='my_account.php?my_order' id='hide' name='hide'>MyAccount</a>";
                         }
                         ?>
                   </li>
                </ul>
            </div>
            <!-- Include Sidebar Start-->
            <div class="col-md-3">
                <?php
                 include "include/sidebar.php";
                ?>
            </div>
            <!-- Include Sidebar End -->
             <!-- col-md-9 start -->
               <div class="col-md-9">
                  <?php
                  // Including my_order page start
                  if(isset($_GET['my_order'])){
                     include("my_order.php");
                  }
                  // Including my_order page end
                  ?>
                  
                  <?php
                  // Including pay_offline start
                  if(isset($_GET['pay_offline'])){
                     include("pay_offline.php");
                  }
                  // Includeing pay_offline end
                  ?>
                  <?php
                  // Including Edit Account Page start
                   if(isset($_GET['edit_account'])){
                     include("edit_account.php");
                   }
                  // Including Edit Account Page End
                  ?>

                  <?php
                  // Including the Change Password Page Start
                   if(isset($_GET['change_pass'])){
                     include("change_pass.php");
                   }
                  // Including the Change Password Page End
                  ?>
                  
                  <?php
                  // Includeing the Delete Account Page Start
                   if(isset($_GET['delete_account'])){
                     include("delete_account.php");
                   }
                  // Includeing the Delete Account Page End
                  ?>
               </div>
             <!-- col-md-9 end -->
         </div>
      </div>
      <?php
      include "include/footer.php";
      ?>
</body>
</html>
<?php
}
?>