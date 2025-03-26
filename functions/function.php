
<style>
  #image{
    width: 328px;
    height: 200px;
  }
  #hide {
    text-decoration: none;
  }
</style>
<?php
$db = mysqli_connect("localhost", "root", "", "php_ecommerce_website");
if ($db) {
  // echo "DataBase Conect";
} else {
  echo "DataBase Not Connect" . mysqli_connect_error($db);
}

// Get Ip Address Start
 function getUserIp(){
  switch(true){
    case (!empty($_SERVER['HTTP_X_REAL_IP'])) : 
      return $_SERVER['HTTP_X_REAL_IP'];  
    case(!empty($_SERVER['HTTP_CLIENT_IP']))  :
      return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) :
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default : return $_SERVER['REMOTE_ADDR'];
  }
 }
// Get Ip Address End

// Add Cart Start
function addcart(){
  global $db;
  if(isset($_GET['add_cart'])){
    $ip_address=getUserIp();
    $p_id=$_GET['add_cart'];
    $product_qty=$_POST['product_qty'];
    $product_size=$_POST['product_size'];
    $check_product="SELECT * FROM cart WHERE ip_add='$ip_address' AND p_id='$p_id' ";
    $run_product=mysqli_query($db,$check_product);
    if(mysqli_num_rows($run_product)>0){
      echo "
           <script>alert('This Product Is Already Added');</script>
          ";
      echo "<script>window.open('./card.php','_self')</script>";
      // header("Location:./details.php");
    }else{
      $query="INSERT INTO cart(p_id,ip_add,qty,size) VALUES('$p_id','$ip_address','$product_qty','$product_size')";
      $run=mysqli_query($db,$query);
      header("Location:/details.php");
    }
  }
}
// Add Cart End

// Total Price Caliculate the Add To Cart Start
 function price_count(){
  global $db;
  $ip_address=getUserIp();
  $total=0;
  $select_cart="SELECT * FROM cart WHERE ip_add='$ip_address' ";
  $run_cart=mysqli_query($db,$select_cart);
  while($res=mysqli_fetch_array($run_cart)){
   $pro_id=$res['p_id'];
   $pro_qty=$res['qty'];
   $pro_size=$res['size'];

   $get_price="SELECT * FROM product WHERE product_id='$pro_id' ";
   $run_price=mysqli_query($db,$get_price);
   while($row=mysqli_fetch_array($run_price)){
    $sub_total=$row['product_price']* $pro_qty;
    $total+=$sub_total;

   }
  }
  echo $total;
 }
// Total Price Caliculate the Add To Cart End

// Items Counts Start
 function item(){
  global $db;
  $ip_address= getUserIp();
  $get_items="SELECT * FROM cart WHERE ip_add= '$ip_address' ";
  $run_items=mysqli_query($db,$get_items);
  $count=mysqli_num_rows($run_items);
  echo $count;
 }
// Items Counts End

// Serach Start
function search(){
 if(isset($_GET['search'])){
   global $db;
    $search="SELECT * FROM product WHERE product_title LIKE '$_GET[search]%' OR product_price LIKE '$_GET[search]%' ";
    $run_product=mysqli_query($db,$search);
    while ($row_product = mysqli_fetch_array($run_product)){
      $product_id = $row_product['product_id'];
      $product_title = $row_product['product_title'];
      $product_price = $row_product['product_price'];
      $product_img1 = $row_product['product_img1'];
    if($run_product>0){
        echo "
        <div class='col-md-3 col-sm-6 center-responsive'>
          <div class='product'>
            <a href='details.php?product_id=$product_id'>
              <img src='admin_area/product_images/$product_img1' class='img-responsive' id='image' name='image'/>
            </a> 
            <div class='text'>
             <h3><a href='details.php?product_id=$product_id' id='hide'>$product_title</a></h3>
             <p class='price'>₹ $product_price</p>
             <p class='buttons'>
             &nbsp;&nbsp;
              <a href='details.php?pro_id=$product_id' class='btn btn-default'>View Details</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href='details.php?pro_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
              </p>
            </div>
          </div>
        </div>
        ";
    }
  }
 }
}

// Search End

//  Index Page Product Display
function getPro()
{
  global $db;
  $get_product = "SELECT * FROM product ORDER BY 1 ASC LIMIT 0,8";
  $run_product = mysqli_query($db, $get_product);
  while ($row_product = mysqli_fetch_array($run_product)) {
    $product_id = $row_product['product_id'];
    $product_title = $row_product['product_title'];
    $product_price = $row_product['product_price'];
    $product_img1 = $row_product['product_img1'];

    echo "
        <div class='col-md-3 col-sm-6 center-responsive'>
          <div class='product '>
            <a href='details.php?pro_id=$product_id'>
              <img src='admin_area/product_images/$product_img1' class='img-responsive' id='image' name='image'/>
            </a>
            
            <div class='text'>
             <h3><a href='details.php?product_id=$product_id' id='hide'>$product_title</a></h3>
             <p class='price'>₹ $product_price</p>
             <p class='buttons'>
             &nbsp;&nbsp;
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
  global $db;
  $get_p_cat = "SELECT *FROM product_categories";
  $run_p_cat = mysqli_query($db, $get_p_cat);
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
  global $db;
  $get_p_cat = "SELECT *FROM categories";
  $run_p_cat = mysqli_query($db, $get_p_cat);
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
  global $db;
  if (isset($_GET['p_cat'])) {
    $p_cat_id = $_GET['p_cat'];

    $get_p_cats = "SELECT * FROM product_categories WHERE p_cat_Id='$p_cat_id' ";
    $run_p_cats = mysqli_query($db, $get_p_cats);

    $row_p_cats = mysqli_fetch_array($run_p_cats);
    $p_cat_id = $row_p_cats['p_cat_Id'];
    $p_cat_title = $row_p_cats['p_cat_title'];
    $p_cat_desc = $row_p_cats['p_cat_desc'];


    $get_products = "SELECT * FROM product WHERE p_cat_id='$p_cat_id' ";
    $run_products = mysqli_query($db, $get_products);
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
function getCatPro(){
  global $db;
  if(isset($_GET['cat_id'])){
    $cat_id=$_GET['cat_id'];
    $get_cat="SELECT * FROM categories WHERE cat_id='$cat_id' ";
    $run_cat=mysqli_query($db,$get_cat);
    $row=mysqli_fetch_array($run_cat);
    
    $cat_title=$row['cat_title'];
    $cat_desc=$row['cat_desc'];

    $get_product="SELECT * FROM product WHERE cat_id='$cat_id' ";
    $run_product=mysqli_query($db,$get_product);

    $count=mysqli_num_rows($run_product);
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