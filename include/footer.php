<?php 
  include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
     integrity="sha512-vZCgFjYvBdZcPyUJ+fOQW6xUEzMZrMSkZDxUqxBpscvqzgzW8R1k1I9U8M3aM1pTQoyVi7u6YB9+Azr6RXk0VQ=="
     crossorigin="anonymous"
     referrerpolicy="no-referrer"
   />
    <style>
      
    </style>
</head>
<body>
    <div id='footer'>
      <!-- Footer Start -->
        <div class="container">
           <div class="row">
             <!--1 col-md-3 start -->
              <div class="col-md-3 col-sm-6">
                 <h4>Pages</h4>
                 <ul>
                    <li><a href="card.php" id="hide" name='hide'>Shopping Cart</a></li>
                    <li><a href="contactus.php" id="hide" name='hide'>Contact</a></li>
                    <li><a href="shop.php" id="hide" name='hide'>Shop</a></li>
                    <li><a href="chechout.php" id="hide" name='hide'>My Account</a></li>
                 </ul>
                 <hr>
                 <h4>Users Section</h4>
                 <ul>
                    <li><a href="checkout.php" id="hide" name='hide'>Login</a></li>
                    <li><a href="customer_registration.php" id="hide" name='hide'>Register</a></li>
                    <li></li>
                 </ul>
                 <hr class="hidden-md hidden-lg hidden-sm">
              </div>
              <!--1 col-md-3 end -->
               <!--2 col-md-3 Start -->
               <div class="col-md-3 col-sm-6">
                  <h4>Top Categories</h4>
                   <ul>
                    <?php
                     $get_p_cats="SELECT *FROM product_categories";
                     $run_p_cats=mysqli_query($con,$get_p_cats);
                     while($row=mysqli_fetch_array($run_p_cats)){
                         $p_cat_id=$row['p_cat_Id'];
                         $p_cat_title=$row['p_cat_title'];
                         echo "
                           <li><a href='shop.php?p_cat_id=$p_cat_id' id='hide' name='hide'>$p_cat_title</a></li>
                         ";
                     }
                    ?>
                     <!-- <li><a href="">Jacket</a></li>
                     <li><a href="">Accessories</a></li>
                     <li><a href="">Shoes</a></li>
                     <li><a href="">Coats</a></li>
                     <li><a href="">T-Shirt</a></li> -->
                   </ul>
                   <hr class="hidden-md hidden-lg" >

               </div>
               <!--2 col-md-3 end -->
               <!--3 col-md-3 start  -->
               <div class="col-md-3 col-sm-6">
                   <h4>Where to find us</h4>
                    <p>
                        <strong>E-Commerce Webite</strong>
                        <br>IICS
                        <br>Prayagraj
                        <br>Uttar Pradesh
                        <br>iics@gmail.com
                        <br>+91 8090835664
                    </p>   
                    <a href="contactus.php" id="hide" name='hide'>Go To ContactUs Page</a>
                    <hr class="col-md-3 hidden-lg">
               </div>
               <!--3 col-md-3 end  -->
               <!--4 col-md-3 start -->
                 <h4>Get the News</h4>
                  <p class="text-muted">
                     Subscribe the channel the of IICS College
                  </p>
                  <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="email" id="email" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" value="Submit" class="btn btn-default">
                        </span>
                    </div>
                  </form>
                  <hr>
                  <!-- <h4>Stay In Touch</h4>
                  <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                  </p> -->
               <!--4 col-md-3 end  -->
           </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- CopyRight Section Start -->
    <div id="copyright">
        <div class="container">
            <div  class="col-md-6">
              <p class="pull-left">
                 &copy; 2022 Er. IICS College
              </p>
            </div class="col-md-6">
              <p class="pull-right">
                Template By : <a href="#">Me</a>
              </p>
            <div>

            </div>
        </div>
    </div>
     <!-- CopyRight Section End -->
</body>
</html>