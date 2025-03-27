<?php
 include("common_index.php");
?>
<style>
    #images{
      width: 328px;
      height: 200px;
    }
    #hide{
      text-decoration: none;
    }
</style>
    <div id='content'>
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php" id='hide' name='hide'>Home</a></li>
                    <li>
                    <?php
                     if(!isset($_SESSION['c_email'])){
                      echo "<a href='checkout.php' id='hide' name='hide'>MyAccount</a>";
                     }else{
                      echo "<a href='customer/my_account.php?my_order' id='hide' name='hide'>MyAccount</a>";
                     }
                    ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php include "include/sidebar.php"; ?>
            </div>
            <!-- Shop Box Start -->
            <div class="col-md-9">
                <?php
                if ((!isset($_GET['p_cat']))) {
                    if((!isset($_GET['cat_id']))){
                       echo "
                        <div class='box'>
                             <h1>Shop</h1>
                          <p>You can purchase any product and apply offers</p>
                        </div>
                    ";
                   }
                }
                ?>
                <!-- Row Start -->
                <div class="row">
                    <?php
                    if ((!isset($_GET['p_cat'])) && (!isset($_GET['cat_id']))) {
                        $per_page = 6; 
                        if(isset($_GET['page'])){
                            $page=$_GET['page'];
                        }else{
                            $page=1;
                        }
                        // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start_from = ($page - 1) * $per_page;

                        $get_product = "SELECT * FROM product ORDER BY 1 ASC LIMIT $start_from, $per_page";
                        $run_product = mysqli_query($con, $get_product);

                        while ($row = mysqli_fetch_array($run_product)) {
                            $pro_id = $row['product_id'];
                            $pro_title = $row['product_title'];
                            $pro_price = $row['product_price'];
                            $pro_img1 = $row['product_img1'];
                            $actual_price=$row['actual_price'];
                            echo "
                            <div class='col-md-4 col-sm-6 center-responsive'>
                                <div class='product'>
                                    <a href='details.php?pro_id=$pro_id'>
                                      <img src='admin_area/product_images_downloads/$pro_img1' class='img-responsive' id='images' name='images'/>
                                    </a>
                                
                                <div class='text'>
                                    <h3><a href='details.php?pro_id=$pro_id' id='hide'>$pro_title</a></h3>
                                    <p class='price' id='price'>₹ $pro_price &nbsp;&nbsp; ₹ <strike> $actual_price </strike></p>
                                    <p class='buttons'>
                                      <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                      <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>  Add to Cart</a>
                                    </p>
                                </div>
                                </div>
                            </div>
                            ";
                        }
                    }
                    ?>
                </div>
                <!-- Row End -->
                 <!-- Product Filter Function Start -->
                  <?php
                    getPcatPro();
                  ?>
                <!-- Product Filter Function End -->
                <!-- Product Filter Category Wise Start -->
                  <?php
                   getCatPro();
                  ?>
                <!-- Product Filter Category Wise End -->
                <!-- Pagination Start -->
                <center>
                    <ul class="pagination">
                     <?php
                        GLOBAL $con;
                        $per_page=1;
                        $query="SELECT *FROM product";
                        $run=mysqli_query($con,$query);
                        $total_record=mysqli_num_rows($run);
                        $total_pages=ceil($total_record / $per_page);
                        echo "
                          <li><a href='shop.php?page=1'>".'First Page'."</a></li>
                        ";
                        for($i=1;$i<=$total_pages;$i++){
                           echo "<li><a href='shop.php?page=".$i."'>".$i."</a></li>";
                        }
                        echo "
                          <li><a href='shop.php?page=$total_pages'>".'Last Page'."</a></li>
                        ";
                
                     ?>
                    </ul>
                </center>
                <!-- Pagination End -->
            </div>
            <!-- Shop Box End -->
        </div>
    </div>

    <!-- Footer Include -->
    <?php include ("include/footer.php"); ?>

    <!-- JavaScript Include -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
