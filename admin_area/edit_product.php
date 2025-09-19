<?php
include("include/db.php");
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
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
    <!-- Edit Product Panel Start -->
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
              <i class="fa fa-edit"></i> EDIT PRODUCT
            </h3>
          </div>
          <!-- Panel Heading End -->
          <?php
          if (isset($_GET['Edit_Product'])) {
            $edit_id = $_GET['Edit_Product'];
            $select_product = "SELECT * FROM product WHERE product_id='$edit_id' ";
            $run_product = mysqli_query($con, $select_product);
            $row_product = mysqli_fetch_array($run_product);

            $p_id = $row_product['product_id'];
            $p_title = $row_product['product_title'];
            $p_cat_id = $row_product['p_cat_Id'];
            // echo $p_cat_id;
            $cat_id = $row_product['cat_id'];
            $p_img1 = $row_product['product_img1'];
            $p_img2 = $row_product['product_img2'];
            $p_img3 = $row_product['product_img3'];
            $p_price = $row_product['product_price'];
            $p_desc = $row_product['product_desc'];
            $p_keyword = $row_product['product_keyword'];
          }
          // Fetch Data Product Categories Table
          $pro_c_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id' ";
          $run_c_cat = mysqli_query($con, $pro_c_cat);
          $row_c_cat = mysqli_fetch_array($run_c_cat);
          if ($row_c_cat) {
            $pro_c_title = $row_c_cat['p_cat_title'];
            // echo $pro_title;
          }
          //  Fetch The data in Categories Table
          $pro_cat = "SELECT * FROM categories WHERE cat_id='$cat_id' ";
          $run_cat = mysqli_query($con, $pro_cat);
          $row_cat = mysqli_fetch_array($run_cat);
          if ($row_cat) {
            $cat_title = $row_cat['cat_title'];
            // echo $cat_title;
          }


          ?>
          <div class="panel-body">
            <form action="#" class="form-horizental" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-md-3 control-label">Product Title</label>
                <input type="text" placeholder='Enter Product Title' name="product_title" id="product_title" class="form-control" value="<?php echo $p_title; ?>" required>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Product Category</label>
                <select name="product_cat" id="product_cat" class="form-control">


                  <?php
                  $get_p_cats = "SELECT *FROM product_categories";
                  $run_p_cats = mysqli_query($con, $get_p_cats);
                  while ($row = mysqli_fetch_array($run_p_cats)) {
                    $c_id = $row['p_cat_Id'];
                    $c_title = $row['p_cat_title'];
                    $c_desc = $row['p_cat_desc'];
                    echo "
                        <option value='$p_cat_id'>$c_title</option>
                       ";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Categories</label>
                <select name="cat" id="cat" class="form-control">

                  <?php
                  $get_cats = "SELECT *FROM categories";
                  $run_cats = mysqli_query($con, $get_cats);
                  while ($row = mysqli_fetch_array($run_cats)) {
                    $c_id = $row['cat_id'];
                    $c_title = $row['cat_title'];
                    $c_desc = $row['cat_desc'];
                    echo "
                       <option value='$cat_id'>$c_title</option>
                       ";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Product Image 1</label>
                <input type="file" name="product_img1" id="product_img1" class="form-control">
                <img src="product_images/<?php echo $p_img1; ?>" height='60px' width='60px' alt="" srcset="">
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Product Image 2</label>
                <input type="file" name="product_img2" id="product_img2" class="form-control">
                <img src="product_images/<?php echo $p_img2; ?>" height='60px' width='60px' alt="" srcset="">
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Product Image 3</label>
                <input type="file" name="product_img3" id="product_img3" class="form-control">
                <img src="product_images/<?php echo $p_img3; ?>" height='60px' width='60px' alt="" srcset="">
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" placeholder='Enter Price' class="form-control" value='<?php echo $p_price; ?>'>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" placeholder='Enter Keyword' class="form-control" value='<?php echo $p_keyword; ?>'>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Product Description</label>
                <textarea name="product_desc" id="product_desc" placeholder='Enter Product Description' class="form-control" rows="6"><?php echo $p_desc; ?>
              </textarea>
              </div>
              <div class="form-group">
                <input type="submit" name='update' id='update' value="Update Product" class="form-control btn btn-primary">
              </div>
            </form>
            <?php
            if (isset($_POST['update'])) {
              $product_title = $_POST['product_title'];
              $product_cat = $_POST['product_cat'];
              $cat = $_POST['cat'];

              // Get previous images to retain if no new image is selected
              $product_img1 = $_FILES['product_img1']['name'] ? $_FILES['product_img1']['name'] : $p_img1;
              $product_img2 = $_FILES['product_img2']['name'] ? $_FILES['product_img2']['name'] : $p_img2;
              $product_img3 = $_FILES['product_img3']['name'] ? $_FILES['product_img3']['name'] : $p_img3;

              // Handle file uploads only if a new file is selected
              if ($_FILES['product_img1']['name']) {
                $product_tmp1 = $_FILES['product_img1']['tmp_name'];
                move_uploaded_file($product_tmp1, "product_images/$product_img1");
              }

              if ($_FILES['product_img2']['name']) {
                $product_tmp2 = $_FILES['product_img2']['tmp_name'];
                move_uploaded_file($product_tmp2, "product_images/$product_img2");
              }

              if ($_FILES['product_img3']['name']) {
                $product_tmp3 = $_FILES['product_img3']['tmp_name'];
                move_uploaded_file($product_tmp3, "product_images/$product_img3");
              }

              $product_price = $_POST['product_price'];
              $product_keyword = $_POST['product_keyword'];
              $product_desc = $_POST['product_desc'];

              // Update the product in the database
              $update_product = "UPDATE product SET 
                        p_cat_Id='$product_cat',
                        date=NOW(),
                        cat_id='$cat',
                        product_title='$product_title',
                        product_img1='$product_img1',
                        product_img2='$product_img2',
                        product_img3='$product_img3',
                        product_price='$product_price',
                        product_keyword='$product_keyword',
                        product_desc='$product_desc' 
                        WHERE product_id='$edit_id'";

              $run_product = mysqli_query($con, $update_product);

              if ($run_product) {
                echo "<script>alert('Update Successfully')</script>";
              } else {
                echo "<script>alert('Update Failed')</script>";
              }
            }
            ?>
          </div>
        </div>
      </div>
      <!-- col-md-s start -->
      <div class="col-md-2">

      </div>
      <!-- col-md-3 end -->
    </div>
    <!-- Edit Product Panel End -->
  </body>

  </html>

<?php } ?>