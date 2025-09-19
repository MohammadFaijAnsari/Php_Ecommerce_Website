<?php 
 session_start();
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
    <!-- Font AwosomeBootstrap  -->
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
             <a href="#" id="link">Shopping Cart Total Price:₹ <?php price_count()?> Total items <?php item();?></a>
          </div>
          <div class="col-md-6">
            <ul class="menu">
                <li>
                    <a href="#" id="link">Registator</a>
                </li>
                <li>
                    <a href="customer/my_account.php" id="link">MyAccount</a>
                </li>
                <li>
                    <a href="card.php" id="link">Go Cart</a>
                </li>
                <li>
                    <!-- <a href="login.php" id="link">Login</a> -->
                     <?php
                      if(!isset($_SESSION['c_email'])){
                        echo "<a href='customer/customer_login.php' id='link'>Login</a>";
                      }else{
                        echo "<a href='logout.php' id='link'>Logout</a>";
                      }
                     ?>
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
                        <a href="card.php" >Shopping Cart</a>
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
            <!-- Sidebar Include Start -->
            <div class="col-md-3">
                <?php
                 include "include/sidebar.php";
                ?>
            </div>
            <!-- Sidebar Include End -->
             <!-- Contact Us Box Start -->
             <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Customer Registration</h2>
                            </center>
                    </div>
                    <!-- Form Start -->
                    <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                         <label for="">Customer Name</label>
                         <input type="text" name="c_name" id="c_name" class='form-control' required>
                       </div>
                       <div class="form-group">
                         <label for="">Customer Email</label>
                         <input type="email" name="c_email" id="c_email" class="form-control" required>
                       </div>
                       <div class="form-group">
                         <label for="">Customer Password</label>
                          <input type="password" name="c_password" id="c_password" class="form-control" required>
                       </div>
                       <div class="form-group">
                         <label for="">Image</label>
                          <input type="file" name="c_image" id="c_image" class="form-control" required>
                       </div>
                       <div class="text-center">
                          <button type="submit" name="submit" id="submit" class="btn btn-primary">
                             <i class="fa fa-user-md"></i> Registartion
                          </button>
                       </div>
                    </form>
                    <!-- Form End -->
                </div>
             </div>
             <!-- Contact Us Box End -->
         </div>
      </div>
      <?php
       include "include/footer.php";
      ?>
</body>
</html>
<?php
 if(isset($_POST['submit'])){
   $name=$_POST['c_name'];
   $email=$_POST['c_email'];
   $pass=$_POST['c_password'];
   $image=$_FILES['c_image']['name'];
   $tmp_name=$_FILES['c_image']['tmp_name'];

   $c_ip=getUserIp();

   move_uploaded_file($tmp_name,"customer/customer_image/$image");
   $insert_data="INSERT INTO registration(c_name,c_email,c_pass,c_image,c_ip) VALUES ('$name','$email','$pass','$image','$c_ip')";
   $run_data=mysqli_query($db,$insert_data);

   $sel_cart="SELECT * FROM cart WHERE ip_add='$c_ip' ";
   $run_cart=mysqli_query($db,$sel_cart);
   $check=mysqli_num_rows($run_cart);
  //  echo $check;
   if($check>0){
      $_SESSION['c_email']=$email;
      echo "<script>alert('You Have Registration Sucessfully')</script>";
      echo "<script>window.open('usermail.php','_self')</script>";
      echo "<script>window.open('index.php','_self')</script>"; 
   }else{
      $_SESSION['c_email']=$email;
      echo "<script>alert('You Have Been Registration Sucessfully')</script>";
      echo "<script>window.open('signupmail.php','_self')</script>";
      echo "<script>window.open('index.php','_self')</script>"; 
   }
 }
?>