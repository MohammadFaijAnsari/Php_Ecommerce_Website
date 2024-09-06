<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Slide Panel Start -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <center>
              <img src="images/images.jpeg" class='img-responsive' alt="Image Not Found" srcset="">
            </center>
            <br>
            <h3 class="text-center panel-title">Name:Bittu</h3>
        </div>
  
      <!-- Slide Panel End -->
      <div class="panel-body">
       <div class="nav nav-pills nav-stacked">
       <li class="<?php if(isset($_GET['my_order'])) { echo 'active'; } ?>"> 
            <a href="my_account.php?my_order">
             <i class="fa fa-list"></i>
             My Order</a>
        </li>

        <li class="<?php if(isset($_GET['pay_offline'])) { echo 'active'; } ?>"> 
            <a href="my_account.php?pay_offline">
             <i class="fa fa-bolt"></i>
             Pay Offline</a>
        </li>

        <li class="<?php if(isset($_GET['edit_account'])) { echo 'active'; } ?>"> 
            <a href="my_account.php?edit_account">
             <i class="fa fa-pencil"></i>
             Edit Account</a>
        </li>

        <li class="<?php if(isset($_GET['change_pass'])) { echo 'active'; } ?>"> 
            <a href="my_account.php?change_pass">
             <i class="fa fa-edit"></i>
             Change Password</a>
        </li>

        <li class="<?php if(isset($_GET['delete_account'])) { echo 'active'; } ?>"> 
            <a href="my_account.php?delete_account">
             <i class="fa fa-trash"></i>
             Delete Accout</a>
        </li>

        <li class="<?php if(isset($_GET['logout'])) { echo 'active'; } ?>"> 
            <a href="my_account.php?logout">
             <i class="fa fa-sign-out"></i>
             Logout</a>
        </li>

       </div>
     </div>
    </div>
</body>
</html>