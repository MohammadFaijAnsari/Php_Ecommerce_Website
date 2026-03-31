<?php
$con = mysqli_connect("localhost", "root", "", "ecommerce_website");

if ($con) {
   // echo "Database Connected";
} else {
    echo "Database Not Connected: " . mysqli_connect_error();
}
?>
