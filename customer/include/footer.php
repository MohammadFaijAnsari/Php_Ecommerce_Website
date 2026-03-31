<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
    </style>
</head>
<body>
    <div id='footer'>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                   <h4>Pages</h4>
                   <ul>
                     <li><a href="../cart.php">Shopping Card</a></li>
                     <li><a href="../contact.php">Contact</a></li>
                     <li><a href="../shop.php">Shop</a></li>
                     <li><a href="../my_account.php">My Account</a></li>
                   </ul>
                   <hr>
                   <h4>Users Section</h4>
                   <ul>
                    <li><a href="../login.php">Login</a></li>
                    <li><a href="../customer_registration.php">Registor</a></li>
                   </ul>
                   <hr class="hidden-md hodden-lg hidden-sm">
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Top Product Categories</h4>
                    <ul>
                    <?php
                     $get_p_cats="SELECT *FROM product_categories";
                     $run_p_cats=mysqli_query($con,$get_p_cats);
                     while($row=mysqli_fetch_array($run_p_cats)){
                         $p_cat_id=$row['p_cat_Id'];
                         $p_cat_title=$row['p_cat_title'];
                         echo "
                           <li><a href='shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li>
                         ";
                     }
                    ?>
                        <!-- <li><a href="#">Jacket</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Coats</a></li>
                        <li><a href="#">T-Shirt</a></li> -->
                    </ul>
                    <hr class="hidden-sm hidden-lg">
                </div>
                <div class="col-md-3 col-sm-6">
                  <h4>Where to Find Us</h4>
                  <p>
                    <strong>Mohammad Faij Ansari</strong>
                    <br>Address:Mughara Badshapur Jaunpur   
                    <br>Email:faija639@gmail.com
                    <br>Phone_No:+91 8090835664
                  </p>
                  <a href="contact.php">Go to contact us page</a>
                  <hr class="hidden-md hidden-lg">
                </div>
    
                <div class="col-md-3 col-sm-6">
                  <h4>Get the news</h4>
                   <p class="text-mutes">
                    Subscribe here for geting of IICS College
                   </p>
                   <form action="" method="post">
                    <div class="input-group">
                       <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                       <span class="input-group-btn">
                         <input type="submit" value="Subscribe" class="btn btn-default">
                       </span>
                    </div>
                   </form>
                   <hr>
                   <h4>Stay In Touch</h4>
                   <p class="social">
                    <a href="https://www.facebook.com/faij.ansari.1422409/"><i class="fa fa-facebook"></i></a>&nbsp;
                    <a href="https://x.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D"><i class="fa fa-twitter"></i></a>&nbsp;
                    <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>&nbsp;
                  
                    <a href=""><i class="fa fa-envelope"></i></a>&nbsp;
                    <a href="https://www.youtube.com/channel/UCjfBX1RdSBEC2jDG_87mRkA"><i class="fa fa-youtube"></i></a>&nbsp;
                 
                   </p>
                </div>
                

            </div>
        </div>
    </div>

     <div id="copyright">
       <div class="container">
         <div class="col-md-6">
           <p class="pull-left">
             &copy;2024 Er.Mohammad Faij Ansari
           </p>
         </div>
         <div class="col-md-6">
            <p class="pull-right">
              Template By <a href="www.google.com">Google</a>
            </p>
         </div>
       </div>
     </div>


</body>
</html>