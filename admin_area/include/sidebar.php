<?php
session_start();
include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('../login.php','_self')</script>";
 }else{

 
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #555555;font-size:18px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php?Admin Panel" class="navbar-brand"  style="background-color:#555555;">Admin Panel</a>
    </div>
    <!-- nav bar start -->
    <ul class="nav navbar-right top-nav">
      <li class="dropdown">
        <a href="#" data-toggle="collapse" data-target="#dropdown">
          <i class="fa fa-user">&nbsp;&nbsp;</i><?php echo $admin_name;?><b class="caret"></b>
        </a>
        <ul class="dropdown-menu" id='dropdown'>
          <li>
            <a href="index.php?User_Profile_id=<?php echo $admin_id?>">
              <i class="fa fa-fw fa-user"></i> Profile
            </a>
          </li>
          <li>
            <a href="index.php?View_Product">
              <i class="fa fa-fw fa-envelope"></i> Product &nbsp;
              <span class="badge"><?php echo $count;?></span>
            </a>
          </li>
          <li>
            <a href="index.php?View_Customer">
              <i class="fa fa-fw fa-users"></i> Customer &nbsp;
              <span class="badge"><?php echo $count_cus;?></span>
            </a>
          </li>
          <li>
            <a href="index.php?Pro_Cat">
              <i class="fa fa-fw fa-gear"></i> Product Categories &nbsp;
              <span class="badge"><?php echo $count_pro_cat;?></span>
            </a>
          </li>
           <!-- Line Draw Start -->
          <li class='divider'></li>
           <!-- Line Draw End -->
          <li>
            <a href="logout.php?Logout">
              <i class="fa fa-fw fa-sign-out"></i> Logout
            </a>
          </li>

        </ul>
      </li>
    </ul>

    <!--nav bar end-->
    
    <div class='collapse navbar-collapse navbar-ex1-collapse'>
      <ul class='nav sidebar-nav'>
        <!-- Dashboard Text Start-->
        <li>
          <a href="index.php?Dashboard">
            <i class="fa fa-fw fa-dashboard" ></i>&nbsp;Dashboard
          </a>
        </li>
        <!-- Dashboard Text End-->
        <!-- Product DropDown Start -->
          <li>
            <a href="#" data-toggle="collapse" data-target="#product">
              <i class="fa fa-fw fa-table"></i>&nbsp;Product <i class='fa fa-fw fa-caret-down'></i>
            </a>
           <ul  id="product" class="collapse">
              <li>
                <a href="index.php?Insert_Product" id="hide">Insert Product</a>
              </li>
              <li>
                <a href="index.php?View_Product">View Product</a>
              </li>
           </ul>
          </li>
        <!-- Product DropDown End -->
         <!-- Product Categories DropDown Start -->
         <li>
            <a href="#" data-toggle="collapse" data-target="#product_categories">
              <i class="fa fa-fw fa-table"></i>&nbsp;Product Categories <i class='fa fa-fw fa-caret-down'></i>
            </a>
           <ul  id="product_categories" class="collapse">
              <li>
                <a href="index.php?Insert Product Categories">Insert Product Categories</a>
              </li>
              <li>
                <a href="index.php?View Product Categories">View Product Categories</a>
              </li>
           </ul>
          </li>
        <!-- Product Categories DropDown End -->
        <!--  Categories DropDown Start -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#product_cat">
              <i class="fa fa-fw fa-table"></i>&nbsp;Categories <i class='fa fa-fw fa-caret-down'></i>
            </a>
           <ul  id="product_cat" class="collapse">
              <li>
                <a href="index.php?Insert Categories">Insert Categories</a>
              </li>
              <li>
                <a href="index.php?View Categories">View Categories</a>
              </li>
           </ul>
          </li>
        <!-- Categories DropDown End -->
        <!-- Slider DropDown Start -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#slider">
              <i class="fa fa-fw fa-table"></i>&nbsp;Slider<i class='fa fa-fw fa-caret-down'></i>
            </a>
           <ul  id="slider" class="collapse">
              <li>
                <a href="index.php?Insert Slider">Insert Slider</a>
              </li>
              <li>
                <a href="index.php?View Slider">View Slider</a>
              </li>
           </ul>
          </li>
        <!-- Slider DropDown End -->
        <!-- View Customer Start -->
         <li>
           <a href="index.php?View Customer">
             <i class="fa fa-fw fa-edit"></i>&nbsp;View Customer
           </a>
         </li>
        <!-- View Customer End -->
        <!-- View Order Start -->
        <li>
           <a href="index.php?View Order">
             <i class="fa fa-fw fa-list"></i>&nbsp;View Order
           </a>
         </li>
        <!-- View Order End -->
         <!-- View Order Start -->
        <li>
           <a href="index.php?View Payment">
             <i class="fa fa-fw fa-pencil"></i>&nbsp;View Payment
           </a>
         </li>
        <!-- View Order End -->
         <!-- User DropDown Start -->
        <li>
            <a href="#" data-toggle="collapse" data-target="#user">
              <i class="fa fa-fw fa-table"></i>&nbsp;Admin Profile<i class='fa fa-fw fa-caret-down'></i>
            </a>
           <ul  id="user" class="collapse">
              <li>
                <a href="index.php?Insert Admin">Insert Profile</a>
              </li>
              <li>
                <a href="index.php?View Admin">View Profile</a>
              </li>
              <li>
                <a href="index.php?Edit Admin=<?php echo $admin_id;?>">Edit Profile</a>
              </li>
           </ul>
          </li>
          <!-- User DropDown End -->
          <!-- Email Sidebar Start -->
          <li>
           <a href="index.php?Client_Problem">
           <i class="fa-solid fa-circle-xmark"></i>&nbsp;Client Problem
           </a>
         </li>
          <!-- Email Sidebar End-->
        <!-- Slider DropDown End -->
      </ul>
    </div> 
  </nav>
<?php } ?>
