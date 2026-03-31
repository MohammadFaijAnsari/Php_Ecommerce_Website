<?php
include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <h1>View Product Page</h1> -->
</head>
<body>
    <!--1 Row Start -->
    <div class="row">
      <div class="col-lg-12">
         <ol class="breadcrumb" style="margin-top: 40px;">
          <li class="active">
             <i class="fa fa-dsahboard"></i> Dashboard/View Product
          </li>
         </ol>
      </div>
    </div>
    <!--1 Row End -->
    <!--2 Row Start -->
     <div class="row">
          <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i>View Products
                     </h3>
                 </div>

                 <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>Product Id</th>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Actual Price</th>
                                    <th>Product Keyword</th>
                                    <th>Product Date</th>
                                    <th>Product Edit</th>
                                    <th>Product Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $get_product="SELECT * FROM product";
                                 $run_product=mysqli_query($con,$get_product);
                                 while($row_product=mysqli_fetch_array($run_product)){
                                   $pro_id=$row_product['product_id'];
                                   $pro_title=$row_product['product_title'];
                                   $pro_img1=$row_product['product_img1'];
                                   $pro_price="₹ ".$row_product['product_price'];
                                   $actual_price="₹ ".$row_product['actual_price'];
                                   $pro_keyword=$row_product['product_keyword'];
                                   $pro_date=$row_product['date'];
                                
                                ?>
                                <tr align="center">
                                    <td><?php echo $pro_id;?></td>
                                    <td><?php echo $pro_title;?></td>
                                    <td><img src="product_images/<?php echo $pro_img1;?>" alt="Image Not Found" height="35px" width="80px" srcset=""></td>
                                    <td><?php echo $pro_price;?></td>
                                    <td><?php echo $actual_price;?></td>
                                    <td><?php echo $pro_keyword;?></td>
                                    <td><?php echo $pro_date;?></td>
                                    <td>
                                        <a href="index.php?Edit_Product=<?php echo $pro_id;?>" align='center'>
                                            <i class="fa fa-pencil fa-2x"></i></a>
                                    </td>
                                    <td>
                                        <a href="index.php?Delete_Product=<?php echo $pro_id;?>" align='center'> 
                                            <i class="fa fa-trash-o fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                     </div>
                 </div>
             </div>
          </div>
     </div>
     <!--2 Row End -->
</body>
</html>
<?php } ?>