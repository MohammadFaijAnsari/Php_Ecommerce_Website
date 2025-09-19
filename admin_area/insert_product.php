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
  <title>Insert Products</title>
  <!-- Link Style Folder -->
  <link rel="stylesheet" href="style/style.css">
  <!-- CSS CDN Link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Bootstrap JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <!-- Row Start -->
  <div class="row">
    <!-- col-lg-12 start -->
    <div class="col-lg-12">
      <div class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard">DashBoard/Insert Product</i>
        </li>
      </div>
    </div>
    <!-- col-lg-12 end -->
  </div>
  <!-- Row End -->
  <!-- Insert Product Panel Start -->
  <div class="row">
    <!-- col-md-3 start -->
    <div class="col-md-2">

    </div>
    <!-- col-md-3 end -->
    <div class="col-lg-8">
      <div class="panel panel-default">
        <!-- Panel Heading Start -->
        <div class="panel heading">
          <h3 class="panel-title" align='center' id='size'>
            <i class="fa fa-money"></i>INSERT PRODUCT
          </h3>
        </div>
        <!-- Panel Heading End -->
        <div class="panel-body">
          <form action="#" class="form-horizental" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-md-3 control-label">Product Title</label>
              <input type="text" placeholder='Enter Product Title' name="product_title" id="product_title" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Product Category</label>
              <select name="product_cat" id="product_cat" class="form-control">
                <option value="0">Select a Product Category</option>
                <?php
                $get_p_cats = "SELECT *FROM product_categories";
                $run_p_cats = mysqli_query($con, $get_p_cats);
                while ($row = mysqli_fetch_array($run_p_cats)) {
                  $c_id = $row['p_cat_Id'];
                  $c_title = $row['p_cat_title'];
                  $c_desc = $row['p_cat_desc'];
                  echo "
                        <option value='$c_id'>$c_title</option>
                       ";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Categories</label>
              <select name="cat" id="cat" class="form-control">
                <option value="0">Select Categories</option>
                <?php
                $get_cats = "SELECT *FROM categories ";
                $run_cats = mysqli_query($con, $get_cats);
                while ($row = mysqli_fetch_array($run_cats)) {
                  $c_id = $row['cat_id'];
                  $c_title = $row['cat_title'];
                  $c_desc = $row['cat_desc'];
                  echo "
                       <option value='$c_id'> $c_title</option>
                       ";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 1</label>
              <input type="file" name="product_img1" id="product_img1" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 2</label>
              <input type="file" name="product_img2" id="product_img2" class="form-control" required>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 3</label>
              <input type="file" name="product_img3" id="product_img3" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Discount Price</label>
              <input type="text" name="product_price" id="product_price" placeholder='Enter Price' class="form-control" required>
            </div> 
            <div class="form-group">
              <label class="col-md-3 control-label">Actual Price</label>
              <input type="text" name="actual_price" id="actual_price" placeholder='Enter Price' class="form-control" required>
            </div>  
            <div class="form-group">
              <label class="col-md-3 control-label">Product Keyword</label>
              <input type="text" name="product_keyword" id="product_keyword" placeholder='Enter Keyword' class="form-control" required>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Product Description</label>
              <textarea name="product_desc" id="product_area" placeholder='Enter Product Description' class="form-control" rows="6" spellcheck="true"></textarea>
            </div>
            
            <div class="form-group">
              <input type="submit" name='submit' id='submit' value="Insert Product" class="form-control btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- col-md-s start -->
    <div class="col-md-2">

    </div>
    <!-- col-md-3 end -->
  </div>
  <!-- Insert Product Panel End -->
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $product_title = $_POST['product_title'];
  $product_cat_id = $_POST['product_cat'];
  $product_cat = $_POST['cat'];
  $product_price = $_POST['product_price'];
  
  $product_desc = $_POST['product_desc'];
  $product_keyword = $_POST['product_keyword'];
  $actual_price=$_POST['actual_price'];
   
  $product_img1 = $_FILES['product_img1']['name'];
  $product_img2 = $_FILES['product_img2']['name'];
  $product_img3 = $_FILES['product_img3']['name'];

  $temp_name1 = $_FILES['product_img1']['tmp_name'];
  $temp_name2 = $_FILES['product_img2']['tmp_name'];
  $temp_name3 = $_FILES['product_img3']['tmp_name'];
  
  move_uploaded_file($temp_name1, "product_images/$product_img1");
  move_uploaded_file($temp_name2, "product_images/$product_img2");
  move_uploaded_file($temp_name3, "product_images/$product_img3");

  $insert_product = "INSERT INTO product (p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_keyword,actual_price) VALUES('$product_cat_id','$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keyword','$actual_price')";

  $run_product = mysqli_query($con, $insert_product);
  if ($run_product) {
    echo "<script>alert('Product Insert Sucessfuly');</script>";
    header("Location:../index.php");
  }
}
?>
<?php }?>