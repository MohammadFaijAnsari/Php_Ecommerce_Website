<?php
include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<!-- 1 Row Start -->
<div class="row" >
  <div class="col-lg-12" >
    <h1 class="page-header" id='header'>Dashboard</h1>
    <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-fw fa-dashboard" id="header1"></i>Dashboard
        </li>
    </ol>
  </div>
</div>
<!-- 1 Row End -->

<!-- 2 Row Start -->
  <div class="row" id="header">
    <!-- 1 Box Start -->
    <!-- col-lg-3 start -->
    <div class="col-lg-3 col-md-6">
     <!-- panel start -->
     <div class="panel panel-primary">
        <!-- panel heading start -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $count;?></div>
                    <div>Product</div>
                </div>
            </div>
        </div>
        <!-- panel heading end -->
        <a href="index.php?View_Product">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
     <!-- panel end -->
    </div>
  <!-- col-lg-3 end -->
<!-- 1 Box End -->
<!--2 Box Start -->
    <!-- col-lg-3 start -->
    <div class="col-lg-3 col-md-6">
     <!-- panel start -->
     <div class="panel panel-green">
        <!-- panel heading start -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $count_cus;?></div>
                    <div>Customers</div>
                </div>
            </div>
        </div>
        <!-- panel heading end -->
        <a href="index.php?View_Customer">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
     <!-- panel end -->
    </div>
    <!-- col-lg-3 end -->  
<!-- 2 Box End -->

<!-- 3 Box Start -->
    <!-- col-lg-3 start -->
    <div class="col-lg-3 col-md-6">
     <!-- panel start -->
     <div class="panel panel-yellow">
        <!-- panel heading start -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $count_pro_cat;?></div>
                    <div>Product Categories</div>
                </div>
            </div>
        </div>
        <!-- panel heading end -->
        <a href="index.php?View_Product_Categories">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
     <!-- panel end -->
    </div>
    <!-- col-lg-3 end -->
  <!-- 3 Box End-->

  <!-- 4 Box Start -->
        <!-- col-lg-3 start -->
    <div class="col-lg-3 col-md-6">
     <!-- panel start -->
     <div class="panel panel-red">
        <!-- panel heading start -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-life-ring fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $count_order;?></div>
                    <div>Orders</div>
                </div>
            </div>
        </div>
        <!-- panel heading end -->
        <a href="index.php?View_Order">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
     <!-- panel end -->
    </div>
  <!-- col-lg-3 end -->
<!-- 4 Box Start -->
  </div>
</div>
<!-- 2 Row End -->
 
<!-- 3 Row Start -->
  <div class="row" style="margin-left:0px;">
    <!-- New Order Start -->
     <!-- col-lg-8 start -->
     <div class="col-lg-8">
        <div class="panel panel-primary">

           <div class="panel-heading">
             <h3 class="panel-title">
               <i class="fa fa-money fa-fw"></i>New Orders
             </h3>
           </div>
           <div class="panel-body">
              <div class="table-responsive">
                 <table class="table table-bordered table-hover table-striped">
                    <thead>
                       <tr>
                         <th>No</th>
                         <th>Customers Email</th>
                         <th>Invoice No</th>
                         <th>Product Id</th>
                         <th>Date</th>
                         <th>Size</th>
                         <th>Stauts</th>
                       </tr>
                    </thead>
                    <?php
                     $i=0;
                     $get_order="SELECT * FROM customers_order ORDER BY order_id DESC LIMIT 0,5";
                     $run_order=mysqli_query($con,$get_order);
                     if($run_order){
                     while($row_order=mysqli_fetch_array($run_order)){
                      $order_id=$row_order['order_id'];
                      $customer_id=$row_order['customer_id'];
                      // echo $customer_id;
                      $product_id=$row_order['product_id'];
                      $invoice_number=$row_order['invoice_number'];
                      $qty=$row_order['qty'];
                      $size=$row_order['size'];
                      $order_status=$row_order['order_status'];
                      $i++;
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                            <?php 
                             $get_cus="SELECT * FROM registration WHERE c_id='$customer_id' ";
                             $run_cus=mysqli_query($con,$get_cus);
                             $data=mysqli_fetch_array($run_cus);
                             if($data){
                                $email=$data['c_email'];
                                echo $email;
                             }
                            ?>
                        </td>
                        <td>
                          <?php echo $invoice_number;?>
                        </td>
                        <td>
                          <?php echo $product_id;?>
                        </td>
                        <td>
                          <?php echo $qty;?>
                        </td>
                        <td>
                          <?php echo $size;?>
                        </td>
                        <td>
                          <?php echo $order_status;?>
                        </td>
                      </tr>
                    </tbody>
                    <?php  } } ?>
                 </table>
              </div>
               <!-- New Order End -->
              <!-- View Order Start -->
               <div class="text-right">
                  <a href="index.php?View_Order">
                    View All Order <i class="fa fa-arrow-circle-right" ></i>
                  </a>
               </div>
              <!-- View Order End -->
           </div>
        </div>
        <!-- col-lg-end -->
        
     </div>
<!-- 3 Row End -->
 <!-- col-lg-4 start -->
  
 <div class="col-md-4 card-box">
            <div class="panel ">
              <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="admin_image/<?php echo $admin_image?>" alt="Image Not Found" class="rounded img-responsive" srcset="">
                      <div class="thumb-info-title">
                         <strong class="thumb-info-inner">Admin Name:<?php echo $admin_name;?></strong><br>
                         
                  </div>
                </div>

                <div class="mb-md">
                   <div class="weight-content-expends">
                      <i class="fa fa-user"></i><strong>Admin Email: </strong><?php echo $admin_email;?>  <br>
                      
                   </div>
                </div>
              </div>
            </div>
          </div>
        <!-- col-lg-4 end -->
  </div>
<?php } ?>