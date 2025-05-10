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
    <style>
        h2 {
            text-align: center;
        }
    </style>
    <!-- Link Style Folder -->
    <link rel="stylesheet" href="style/style.css">
    <!-- CSS CDN Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <!-- Top Bar Start -->
    <div id='top'>
        <!-- Container Start -->
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php

                    if (!isset($_SESSION['c_email'])) {
                        echo "Welcome Guest";
                    } else {
                        echo "Welcome : " . $_SESSION['c_email'];
                    }
                    ?>
                </a>
                <a href="#" id="link">Shopping Cart Total Price:₹ <?php price_count() ?> Total items:<?php item(); ?> </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="customer_registration.php" id="link">Register</a></li>
                    <li>
                        <?php
                        if (!isset($_SESSION['c_email'])) {
                            echo "<a href='checkout.php' id='hide' name='hide'>MyAccount</a>";
                        } else {
                            echo "<a href='customer/my_account.php?my_order' id='hide' name='hide'>MyAccount</a>";
                        }
                        ?>
                    </li>
                    <li><a href="card.php" id="link">Go Cart</a></li>
                    <li><a href="login.php" id="link">
                            <?php
                            if (!isset($_SESSION['c_email'])) {
                                echo "<a href='checkout.php' id='link'>Login</a>";
                            } else {
                                echo "<a href='logout.php' id='link'>Logout</a>";
                            }
                            ?>
                        </a>
                    </li>
                    <li>
                        <?php
                        if (!isset($_GET['index.php'])) {
                            echo "<a href='./admin_area/login.php' id='hide' name='hide' target='_self'>Admin Login</a>";
                        } else {
                        }
                        ?>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Top Bar End -->

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
                <!-- Padding Nav Start -->
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li>
                            <?php
                            if (!isset($_SESSION['c_email'])) {
                                echo "<a href='checkout.php' id='hide' name='hide'>MyAccount</a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_order' id='hide' name='hide'>MyAccount</a>";
                            }
                            ?>
                        </li>
                        <li><a href="card.php">Shopping Cart</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Padding Nav End -->

                <a href="card.php" class="btn btn-primary navbar-btn right" id="click">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> Items in Cart</span>
                </a>

                <div class="navbar-collapse collapse right">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

                <div class="collapse clearfix" id="search">
                    <!-- Form Start -->
                    <form class="navbar-form" method="get" action="index.php">
                        <div class="input-group">
                            <input type="text" name="search" id="search" placeholder="Search" class="form-control" required>
                            <span class="input-group-btn">
                                <button type="submit" value="Search" name="submit" id='submit' class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    

                    <!-- <form method="get" action="index.php">
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit" name="submit">Search</button>
                    </form> -->

                    <!-- Form End -->
                </div>
            </div>
        </div>
        <!-- Navbar End -->