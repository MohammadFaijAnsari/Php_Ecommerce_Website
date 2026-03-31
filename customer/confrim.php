<?php
 session_start();
//  error_reporting(false);
 include("./include/db.php");
 include("../functions/function.php");
  if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
  }
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
             <a href="#" id="link">Shopping Cart Total Price:₹ <?php price_count();?> Total items <?php item();?></a>
          </div>
          <div class="col-md-6">
            <ul class="menu">
                <li>
                    <a href="../customer_registration.php" id="link">Registator</a>
                </li>
                <li>
                    <a href="customer/my_account.php" id="link">MyAccount</a>
                </li>
                <li>
                    <a href="../card.php" id="link">Go Cart</a>
                </li>
                <li>
                    
                      <?php
                       if(!isset($_SESSION['c_email'])){
                         echo "<a href='../login.php' id='hide' name='hide'>Login</a>";
                       }else{
                        echo "<a href='../logout.php' id='hide' name='hide'>Logout</a>";
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
                        <a href="../index.php" id='hide' name='hide'>Home</a>
                      </li>
                      <li >
                        <a href="../shop.php">Shop</a>
                      </li>
                      <li class="active">
                        <a href="customer/my_account.php" >MyAccount</a>
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
                 <span ><?php item();?> Item in Card</span>
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
                   <li><a href="../index.php" id="hide" name="hide">Home</a></li>
                   <li><a href="my_account.php" id='hide' name='hide'>My Account</a></li>
                </ul>
            </div>
            <!-- Include Sidebar Start-->
            <div class="col-md-3">
                <?php
                 include "include/sidebar.php";
                ?>
            </div>
            <!-- Include Slidebar end -->
             <!-- col-md-9 start -->
               <div class="col-md-9">
                 <div class="box">
                    <h1 class="text-center">Please confrim your payment</h1>
                    <!-- Form Start -->
                    <form action="confrim.php?update_id=<?php echo $order_id;?>" method="post">
                        <div class="form-group">
                            <label for="">Invoice No</label>
                             <input type="text" class='form-control' name="invoice_number" id="invoice_number" required>
                        </div>

                        <div class="form-group">
                            <label for="">Amount</label>
                             <input type="text" class='form-control' name="amount" id="amount" required>
                        </div>

                        <div class="form-group">
                            <label for="">Payment Method</label>
                             <select name="payment" id="payment" class="form-control">
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Paypal">Paypal</option>
                                <option value="Payt">Paytm</option>
                                <option value="PhonePay">PhonePay</option>
                             </select>
                        </div>

                        <div class="form-group">
                            <label for="">Transection Number</label>
                             <input type="text" class='form-control' name="tr_no" id="tr_no" required>
                        </div>

                        <div class="form-group">
                            <label for="">Transection Date</label>
                             <input type="date" class='form-control' name="date" id="date" required>
                        </div>

                        <div class="text-center">
                           <button type="submit" name="confrim_payment" id='confrim_payment' class="btn btn-primary btn-lg">
                              Confrom Payment
                           </button>
                        </div>
                    </form>
                    <!-- Form End -->
                     <?php
                      if(isset($_POST['confrim_payment'])){
                        $update_id=$_GET['update_id'];
                        // echo $update_id;
                        // die;
                        $invoice_number=$_POST['invoice_number'];
                        $amount=$_POST['amount'];
                        $payment_method=$_POST['payment'];
                        $trans_nu=$_POST['tr_no'];
                        $date=$_POST['date'];
                        $complete="Complete";

                        $insert="INSERT INTO payment(invoice_id,amount,payment_mode,trans_number,payment_date) VALUES('$invoice_number','$amount','$payment_method','$trans_nu','$date')";
                        $run=mysqli_query($db,$insert);
                        
                        $update_customer_order="UPDATE customers_order SET order_status='$complete' WHERE order_id='$update_id' ";
                        $run=mysqli_query($db,$update_customer_order);

                        // $update_pending_order="UPDATE pending_order SET order_status='$complete' WHERE order_id='$update_id' ";
                        // $run=mysqli_query($db,$update_pending_order);
                        echo "<script>alert('Payment Has Been Sucessfully');</script>";

                      }
                     ?>
                 </div>
               </div>
              <!-- col-md-9 end -->
         </div>
      </div>
      <!-- Main div end -->
       <!-- Footer Include Start -->
      <?php
      include("../include/footer.php");
      ?>
      <!-- Footer Include End -->
</body>
</html>