<?php
 session_start();
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<?php
// Select Admin 
error_reporting(false);
 $admin_email=$_SESSION['admin_email'];
 $select_admin="SELECT * FROM admin_login WHERE admin_email='$admin_email' ";
 $run_admin=mysqli_query($con,$select_admin);
 if($run_admin){
   $row_admin=mysqli_fetch_array($run_admin);
   $admin_id=$row_admin['admin_id'];
   $admin_name=$row_admin['admin_name'];
   $admin_email=$row_admin['admin_email'];
   $admin_image=$row_admin['admin_image'];

 }

// Select Product
$get_pro = "SELECT * FROM product";
$run_pro = mysqli_query($con, $get_pro);
if ($run_pro) {
    $count = mysqli_num_rows($run_pro);
} else {
    die("Product query failed: " . mysqli_error($con));
}

// Select Customer
$get_cus = "SELECT * FROM registration";
$run_cus = mysqli_query($con, $get_cus);
if ($run_cus) {
    $count_cus = mysqli_num_rows($run_cus);
} else {
    die("Customer query failed: " . mysqli_error($con));
}

// Select Product Categories
$get_pro_cat = "SELECT * FROM product_categories";
$run_pro_cat = mysqli_query($con, $get_pro_cat);
if ($run_pro_cat) {
    $count_pro_cat = mysqli_num_rows($run_pro_cat);
} else {
    die("Product categories query failed: " . mysqli_error($con));
}

// Customer Order
$get_order = "SELECT * FROM customers_order";
$run_order = mysqli_query($con, $get_order);
if ($run_order) {
    $count_order = mysqli_num_rows($run_order);
} else {
    die("Product categories query failed: " . mysqli_error($con));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Link Style Folder -->
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS CDN Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
   <div id="wrapper">
     <?php 
       include("../admin_area/include/sidebar.php");
     ?>
     <div id='page-wrapper'>
       <div class='container-fluid'>
         <?php
          if(isset($_GET['Dashboard'])){
            include("dashboard.php");
          }
          if(isset($_GET['Insert_Product'])){
            include("insert_product.php");
          }
          if(isset($_GET['View_Product'])){
            include("view_product.php");
          }
          if(isset($_GET['Delete_Product'])){
            include("delete_product.php");
          }
          if(isset($_GET['Edit_Product'])){
            include("edit_product.php");
          }
          // Product Categories Dropdown 
          if(isset($_GET['Insert_Product_Categories'])){
            include("insert_product_categories.php");
          }
          if(isset($_GET['View_Product_Categories'])){
            include("view_product_categories.php");
          }
          if(isset($_GET['Delete_Product_Categories'])){
            include("delete_product_categories.php");
          }
          if(isset($_GET['Edit_Product_Categories'])){
            include("edit_product_categories.php");
          }
          // Categories Drop Down
          if(isset($_GET['Insert_Categories'])){
            include("insert_categories.php");
          }
          if(isset($_GET['View_Categories'])){
            include("view_categories.php");
          }
          if(isset($_GET['Edit_Categories'])){
            include("edit_categories.php");
          }
          if(isset($_GET['Delete_Categories'])){
            include("delete_categories.php");
          }
          // Slider DropDown
          if(isset($_GET['Insert_Slider'])){
            include("insert_slider.php");
          }
          if(isset($_GET['View_Slider'])){
            include("view_slider.php");
          }
          if(isset($_GET['Delete_Slider'])){
            include("delete_slider.php");
          }
          if(isset($_GET['Edit_Slider'])){
            include("edit_slider.php");
          }
          // View Customer
          if(isset($_GET['View_Customer'])){
            include("view_customer.php");
          }
          if(isset($_GET['Deleted_Customer'])){
            include("delete_customer.php");
          }
          if(isset($_GET['Vleted_Customer'])){
            include("delete_customer.php");
          }
          // View Order 
          if(isset($_GET['View_Order'])){
            include("view_order.php");
          }
          if(isset($_GET['Deleted_Order'])){
            include("delete_order.php");
          }
          // View Payment
          if(isset($_GET['View_Payment'])){
            include("view_payment.php");
          }
          if(isset($_GET['Delete_Payment'])){
            include("delete_payment.php");
          }
          // user
          
          if(isset($_GET['Insert_Admin'])){
            include("insert_admin.php");
          }
          if(isset($_GET['View_Admin'])){
            include("view_admin.php");
          }
          if(isset($_GET['Admin_Delete'])){
            include("admin_delete.php");
          }
          if(isset($_GET['Edit_Admin'])){
            include("edit_admin.php");
          }
          // Client Problem

          if(isset($_GET['Client_Problem'])){
            include('client_problem.php');
          }
          if(isset($_GET['Deleted_Client'])){
            include('deleted_client.php');
          }

          
          ?>
       </div>
     </div>
   </div>
    <!-- JavaScript Include -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
</body>
</html>
<?php 
}
 ?>