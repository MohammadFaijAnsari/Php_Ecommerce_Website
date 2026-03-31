<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
</head>
<body>
    <!-- First Slide Bar Start -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Product Categories</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pill nav-stacked category-menu">
                <?php 
                  getPcat(); 
                ?>
                
                <!-- <li><a href="shop.php">Jackets</a></li>
                <li><a href="shop.php">Accessories</a></li>
                <li><a href="shop.php">Shoes</a></li>
                <li><a href="shop.php">Coats</a></li>
                <li><a href="shop.php">T-Shirts</a></li>
                -->
            </ul>
        </div>
    </div>
    <!-- First Slide Bar End -->

    <!-- Second Slide Bar Start -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-body">
            
            <ul class="nav nav-pill nav-stacked category-menu">
            <?php
              getCat();
            ?>
                <!-- <li><a href="shop.php">Man</a></li>
                <li><a href="shop.php">Woman</a></li>
                <li><a href="shop.php">Kids</a></li>
                <li><a href="shop.php">Others</a></li> -->
            </ul>
        </div>
    </div>
    <!-- Second Slide Bar End -->
</body>
</html>
