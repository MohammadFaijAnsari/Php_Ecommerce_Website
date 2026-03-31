
<style>
    #image{
        width: 260px;
        height:200px;
    }
    #hide{
        text-decoration: none;
    }
    
</style>
<?php
 $db=mysqli_connect("localhost","root","","php_ecommerce_website");
 if($db){
    // echo "DataBase Conect";
 }else{
    echo "DataBase Not Connect".mysqli_connect_error($db);
 }

//  Index Page Product Display
function getPro(){
 global $db;
 $get_product="SELECT *FROM product ORDER BY 1 ASC LIMIT 0,8";
 $run_product=mysqli_query($db,$get_product);
 while($row_product=mysqli_fetch_array($run_product)){
   $product_id=$row_product['product_id'];
   $product_title=$row_product['product_title'];
   $product_price=$row_product['product_price'];

   $product_img1=$row_product['product_img1'];
   
   echo "
        <div class='col-md-3 col-sm-6'>
          <div class='product'>
            <a href='details.php?product_id=$product_id'>
              <img src='admin_area/product_images/$product_img1' class='img-responsive' id='image' name='image'/>
            </a>
            
            <div class='text'>
             <h3><a href='details.php?product_id=$product_id' id='hide'>$product_title</a></h3>
             <p class='price'>₹ $product_price</p>
             <p class='buttons'>
             &nbsp;&nbsp;
              <a href='details.php?product_id=$product_id' class='btn btn-default'>View Details</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href='details.php?product_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
              </p>
            </div>

          </div>
        </div>
        ";
   
 }
}
?>