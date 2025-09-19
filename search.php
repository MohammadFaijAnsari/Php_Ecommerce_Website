<?php
 include("common_index.php");
?>
    <!-- Slider Start -->
    <!-- Slider Start -->
<div class="container" id="slider">
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $get_slider = "SELECT * FROM slider LIMIT 0, 1"; // Adjusted limit for multiple slides
                $run_slider = mysqli_query($con, $get_slider);
                while ($row = mysqli_fetch_array($run_slider)) {
                    $slider_name = $row['slider_name'];
                    $slider_image = $row['slider_image'];
                    $slider_url=$row['slider_url'];
                    echo "
                        <div class='item active'>
                        <a href='$slider_url'><img src='admin_area/slider_images/$slider_image' id='images'/></a>
                        </div>
                    ";
                }
                ?>
                <?php
                 $get_slider="SELECT *FROM slider LIMIT 1,4";
                 $run_slider=mysqli_query($con,$get_slider);
                 while($row=mysqli_fetch_array($run_slider)){
                   $slider_name=$row['slider_name'];
                   $slider_image=$row['slider_image'];
                   echo "
                     <div class='item'>
                       <a href='$slider_url'><img src='admin_area/slider_images/$slider_image' id='images'/></a>
                     </div>
                   ";
                 }
                ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- Slider End -->


    <!-- Slider End -->

    <!-- Three Boxes Start -->
    <div id="advantage">
        <div class="container">
            <div class="row same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3 id="text">Best Prices</h3>
                        <p>You can check on all other sites about prices and then compare with us.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3 id="text">100% Satisfaction </h3>
                        <p>Free Return on everything for 3 months relaible Website</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3 id="text">Welcome Customers</h3>
                        <p>We value all our customers free website in the Prayagraj</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Three Boxes End -->

    <!-- Latest This Week Start -->
    <div class="container" id="latest-box">
        <div class="box">
            <div class="row">
                <div class="col-md-12">
                    <h2>Latest This Week</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Start -->
    <div class="container">
        <div class="row">
            <!-- 1 Product Start -->
             <?php
              if(isset($_GET['search'])){
                search();
              }
               
             ?>
            <!-- 1 Product End -->

            <!-- 2 Product Start -->
            <!-- <div class="col-sm-4 col-md-3">
                <div class="product">
                    <a href="details.php">
                        <img src="admin_area/product_images/laptop1.jpeg" alt="Image Not Found" class="img-responsive" id="images1">
                    </a>
                    <div class="text">
                        <h3><a href="details.php" id="hide">MacBook Laptop</a></h3>
                        <p class="price">₹ 1,50,000</p>
                        <p class="button">
                            <a href="details.php" class="btn btn-default">View Details</a>
                            <a href="details.php" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </a>
                        </p>
                    </div>
                </div>
            </div> -->
            <!-- 2 Product End -->
             

            
        </div>
    </div>
    <!-- Products End -->

    <!-- Pagination Start  -->
     
    <!-- Footer Include Start-->
        <div class="md-12">
            <?php include "include/footer.php"; ?>
        </div>

    <!-- Footer Include End-->

    <!-- JavaScript Include -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
