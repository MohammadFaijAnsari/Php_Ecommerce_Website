<?php
 $db=mysqli_connect("localhost","root","","php_ecommerce_website");
 if($db){
   //  echo "DataBase Connect";
 }else{
    echo "DataBase Not Connect";
 }
?>