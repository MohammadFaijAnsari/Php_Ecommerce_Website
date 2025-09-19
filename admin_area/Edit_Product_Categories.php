<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<?php 
 if(isset($_GET['Edit_Product_Categories'])){
    $id=$_GET['Edit_Product_Categories'];
    $select_product_categories="SELECT * FROM product_categories WHERE p_cat_Id='$id' ";
    $run_product_categories=mysqli_query($con,$select_product_categories);
    $row_product_categories=mysqli_fetch_array($run_product_categories);
    $p_cat_id=$row_product_categories['p_cat_Id'];
    $p_cat_title=$row_product_categories['p_cat_title'];
    $p_cat_desc=$row_product_categories['p_cat_desc'];
   
 }
?>
<!-- 1 Row Start -->
<div class="row" style="margin-top:50px;">
  <div class="col-lg-12">
    <ol class="breadcrumb">
       <li>
          <i class="fa fa-dashboard"></i>DashBoard / Edit Product Categories
       </li>
    </ol>

  </div>
</div>

<!-- 1 Row End -->
<!-- 2 Row Start -->
  <div class="row" >
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
           <div class="panle-title">
              <i class="fa fa-dashboard"></i>Edit Product Catgory
           </div>
        </div>

        <div class="panel-body">
           <form action="" method="post" class="form-horizental">
             <div class="form-group">
                <label class="col-md-3 control-label">Product Category Title</label>
             </div>

             <div class="col-md-6">
                <input type="text" name="p_cat_title" id="p_cat_title" class="form-control" value="<?php echo $p_cat_title;?>">
             </div>
             <br><br>
             <div class="form-group">
                <label class="col-md-3 control-label">Product Category Description</label>
             </div>

             <div class="col-md-6">
                <textarea name="p_cat_desc" id="p_cat_desc" class="form-control" ><?php echo $p_cat_desc;?></textarea>
             </div>
             <br><br>
             <div class="form-group">
                <label class="col-md-3 control-label"></label>
             </div>
              <br>
             <div class="col-md-3" >
                <input type="submit" value="Submit" id='update' name='update' class="btn btn-success form-control">
             </div>
             <div class="col-md-3">
                <input type="reset" value="Cancel" class="btn btn-danger form-control">
             </div>

           </form>
           <!-- Update Code Start -->
            <?php
             if(isset($_POST['update'])){
                $p_cat_title=$_POST['p_cat_title'];
                $p_cat_desc=$_POST['p_cat_desc'];

                $update_product_categories="UPDATE product_categories SET p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' WHERE p_cat_Id='$id' ";
                $run_product_categories=mysqli_query($con,$update_product_categories);
                if($run_product_categories){
                    echo "<script>alert('Update Product Categories Sucessfully')</script>";
                    echo "<script>window.open('index.php?View_Product_Categories','_self')</script>";
                }
             }
            ?>
            <!-- Update Code End -->
        </div>
      </div>
    </div>
  </div>
<?php } ?>