<style>
  #image{
    width: 260px;
    height:200px;
  }
</style>
<?php
// Expect global $con from include/db.php

// Get Ip Address Start
// error_reporting(false);
function getUserIp()
{
  switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])):
      return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])):
      return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default:
      return $_SERVER['REMOTE_ADDR'];
  }
}
// Get Ip Address End

// Add Cart Start
function addcart()
{
  global $con;
  if (isset($_GET['add_cart'])) {
    $ip_address = getUserIp();
    $p_id = $_GET['add_cart'];
    $product_qty = $_POST['product_qty'];
    $product_size = $_POST['product_size'];
    $check_product = "SELECT * FROM cart WHERE ip_add='$ip_address' AND p_id='$p_id' ";
    $run_product = mysqli_query($con, $check_product);
    if (mysqli_num_rows($run_product) > 0) {
      echo "
           <script>alert('This Product Is Already Added');</script>
          ";
      echo "<script>window.open('./card.php','_self')</script>";
    } else {
      $query = "INSERT INTO cart(p_id,ip_add,qty,size) VALUES('$p_id','$ip_address','$product_qty','$product_size')";
      $run = mysqli_query($con, $query);
      header("Location: details.php?pro_id=$p_id");
    }
  }
}
// Add Cart End

// Total Price Caliculate the Add To Cart Start

function price_count() {
    global $con;
    $ip_address = getUserIp();
    $total = 0;

    $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_address'";
    $run_cart = mysqli_query($con, $select_cart);
    while ($res = mysqli_fetch_array($run_cart)) {
        $pro_id   = $res['p_id'];
        $pro_qty  = $res['qty'];
        $pro_size = $res['size'];

        $get_price = "SELECT * FROM product WHERE product_id='$pro_id'";
        $run_price = mysqli_query($con, $get_price);

        while ($row = mysqli_fetch_array($run_price)) {
            $sub_total = $row['product_price'] * $pro_qty;
            $total += $sub_total;
        }
    }
    echo $total;
}


// Total Price Caliculate the Add To Cart End

// Items Counts Start
function item()
{
  global $con;
  $ip_address = getUserIp();
  $get_items = "SELECT * FROM cart WHERE ip_add= '$ip_address' ";
  $run_items = mysqli_query($con, $get_items);
  $count = mysqli_num_rows($run_items);
  echo $count;
}
// Items Counts End

// Serach Start
function search()
{
    if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
        global $con;
        $searchdata = mysqli_real_escape_string($con, $_GET['search']);
        $search_query = "SELECT * FROM product WHERE product_title LIKE '%$searchdata%' OR product_price LIKE '%$searchdata%'";
        $run_product = mysqli_query($con, $search_query);

        if (mysqli_num_rows($run_product) > 0) {
            while ($row_product = mysqli_fetch_array($run_product)) {
                $product_id = $row_product['product_id'];
                $product_title = $row_product['product_title'];
                $product_price = $row_product['product_price'];
                $product_img1 = $row_product['product_img1'];
                $actual_price = $row_product['actual_price'];

                echo "
                <div class='col-md-4 col-sm-6 center-responsive' >
                    <div class='product'>
                        <a href='details.php?pro_id=$product_id'>
                            <img src='admin_area/product_images_downloads/$product_img1' class='img-responsive'  id='image' name='image'/>
                        </a>
                        <div class='text'>
                            <h3><a href='details.php?pro_id=$product_id' id='hide'>$product_title</a></h3>
                            <p class='price' id='price'>₹ $product_price &nbsp;&nbsp; ₹ <strike> $actual_price </strike></p>
                            <p class='buttons'>
                                <a href='details.php?pro_id=$product_id' class='btn btn-default'>View Details</a>
                                <a href='details.php?pro_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                            </p>
                        </div>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<h3 class='text-center'>No products found matching \"$searchdata\".</h3>";
            echo "<div class='card box col-md-12 col-sm-4'>
                    <h3 class='text-center'>No products found matching \"$searchdata\".</h3>
                  </div>";
        }
    }
}


// Search End

//  Index Page Product Display
function getPro()
{
  global $con;
  $get_product = "SELECT * FROM product ORDER BY 1 ASC LIMIT 0,8";
  $run_product = mysqli_query($con, $get_product);
  while ($row_product = mysqli_fetch_array($run_product)) {
    $product_id = $row_product['product_id'];
    $product_title = $row_product['product_title'];
    $product_price = $row_product['product_price'];
    $product_img1 = $row_product['product_img1'];
    $actual_price = $row_product['actual_price'];
    echo "
        <div class='col-xs-6 col-sm-6 col-md-3 center-responsive'>
          <div class='product' style='margin-bottom:15px;'>
            <a href='details.php?pro_id=$product_id'>
              <img src='admin_area/product_images/$product_img1' class='img-responsive ' id='image' name='image'/>
            </a>
            <div class='text'>
             <h3 style='white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'><a href='details.php?pro_id=$product_id' id='hide'>$product_title</a></h3>
             <p class='price'>₹ $product_price &nbsp;&nbsp; ₹ <strike>  $actual_price</strike></p>
             <p class='price'></p>
             <p class='buttons'>
             &nbsp;&nbsp
              <a href='details.php?pro_id=$product_id' class='btn btn-default'>View Details</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href='details.php?pro_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
              </p>
            </div>

          </div>
        </div>
        ";
  }
}    
// Product Categories Display Function 
function getPcat()
{
  global $con;
  $get_p_cat = "SELECT *FROM product_categories";
  $run_p_cat = mysqli_query($con, $get_p_cat);
  while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
    $p_cat_id = $row_p_cat['p_cat_Id'];
    $p_cat_title = $row_p_cat['p_cat_title'];
    $p_cat_desc = $row_p_cat['p_cat_desc'];
    echo "
          <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
         ";
  }
}
// Categories Display Function
function getCat()
{
  global $con;
  $get_p_cat = "SELECT *FROM categories";
  $run_p_cat = mysqli_query($con, $get_p_cat);
  while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
    $cat_id = $row_p_cat['cat_id'];
    $cat_title = $row_p_cat['cat_title'];
    $cat_desc = $row_p_cat['cat_desc'];
    echo "
          <li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>
         ";
  }
}


// Product Categories Filter Product Function
function getPcatPro()
{
  global $con;
  if (isset($_GET['p_cat'])) {
    $p_cat_id = $_GET['p_cat'];

    $get_p_cats = "SELECT * FROM product_categories WHERE p_cat_Id='$p_cat_id' ";
    $run_p_cats = mysqli_query($con, $get_p_cats);

    $row_p_cats = mysqli_fetch_array($run_p_cats);
    $p_cat_id = $row_p_cats['p_cat_Id'];
    $p_cat_title = $row_p_cats['p_cat_title'];
    $p_cat_desc = $row_p_cats['p_cat_desc'];


    $get_products = "SELECT * FROM product WHERE p_cat_id='$p_cat_id' ";
    $run_products = mysqli_query($con, $get_products);
    $count = mysqli_num_rows($run_products);

    if ($count == 0) {
      echo "
          <div class='box'>
           <h1>No Product In This Category</h1>
          </div>
      ";
    } else {
      echo "
          <div class='box'>
           <h1>$p_cat_title</h1>
           <p>$p_cat_desc</p>
          </div>
      ";
    }

    while ($row_products = mysqli_fetch_array($run_products)) {
      $product_id = $row_products['product_id'];
      $product_title = $row_products['product_title'];
      $product_img1 = $row_products['product_img1'];
      $product_price = $row_products['product_price'];

      echo "
        <div class='col-md-4 col-sm-6 center-responsive'>
              <div class='product'>
                  <a href='details.php?pro_id=$product_id'>
                     <img src='admin_area/product_images_downloads/$product_img1' class='img-responsive' id='image'/>
                  </a>
              </div>
              <div class='text'>
                  <h3><a href='details.php?pro_id=$product_id' id='hide'>$product_title</a></h3>
                      <p class='price' id='price'>₹ $product_price</p>
                      <p class='buttons'>
                          <a href='details.php?pro_id=$product_id' class='btn btn-default'>View Details</a>
                          <a href='details.php?pro_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>  Add to Cart</a>
                      </p>
              </div>
        </div>
     ";
    }
  }
}

// Categories Filter Product Display
function getCatPro()
{
  global $con;
  if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id' ";
    $run_cat = mysqli_query($con, $get_cat);
    $row = mysqli_fetch_array($run_cat);

    $cat_title = $row['cat_title'];
    $cat_desc = $row['cat_desc'];

    $get_product = "SELECT * FROM product WHERE cat_id='$cat_id' ";
    $run_product = mysqli_query($con, $get_product);

    $count = mysqli_num_rows($run_product);
    if ($count == 0) {
      echo "
          <div class='box'>
           <h1>No Product In This Category</h1>
          </div>
      ";
    } else {
      echo "
          <div class='box'>
           <h1>$cat_title</h1>
           <p>$cat_desc</p>
          </div>
      ";
    }

    while ($row_products = mysqli_fetch_array($run_product)) {
      $product_id = $row_products['product_id'];
      $product_title = $row_products['product_title'];
      $product_img1 = $row_products['product_img1'];
      $product_price = $row_products['product_price'];

      echo "
        <div class='col-md-4 col-sm-6 center-responsive '>
              <div class='product'>
                  <a href='details.php?pro_id=$product_id'>
                     <img src='admin_area/product_images_downloads/$product_img1' class='img-responsive' id='image'/>
                  </a>
              </div>
              <div class='text'>
                  <h3><a href='details.php?pro_id=$product_id' id='hide'>$product_title</a></h3>
                      <p class='price' id='price'>₹ $product_price</p>
                      <p class='buttons'>
                          <a href='details.php?pro_id=$product_id' class='btn btn-default'>View Details</a>
                          <a href='details.php?pro_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>  Add to Cart</a>
                      </p>
              </div>
        </div>
     ";
    }
  }
}
?>