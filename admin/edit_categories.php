<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<?php 
 if(isset($_GET['Edit_Categories'])){
    $id=$_GET['Edit_Categories'];
    $select_product_categories="SELECT * FROM categories WHERE cat_id='$id' ";
    $run_product_categories=mysqli_query($con,$select_product_categories);
    $row_product_categories=mysqli_fetch_array($run_product_categories);
    $cat_id=$row_product_categories['cat_id'];
    $cat_title=$row_product_categories['cat_title'];
    $cat_desc=$row_product_categories['cat_desc'];
   
 }
?>
<!-- 1 Row Start -->
<div class="row" style="margin-top:50px;">
  <div class="col-lg-12">
    <ol class="breadcrumb">
       <li>
          <i class="fa fa-dashboard"></i>DashBoard / Edit Categories
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
              <i class="fa fa-dashboard"></i>Edit Categories
           </div>
        </div>

        <div class="panel-body">
           <form action="" method="post" class="form-horizental">
             <div class="form-group">
                <label class="col-md-3 control-label">Category Title</label>
             </div>

             <div class="col-md-6">
                <input type="text" name="cat_title" id="cat_title" class="form-control" value="<?php echo $cat_title;?>">
             </div>
             <br><br>
             <div class="form-group">
                <label class="col-md-3 control-label">Category Description</label>
             </div>

             <div class="col-md-6">
                <textarea name="cat_desc" id="cat_desc" class="form-control" ><?php echo $cat_desc;?></textarea>
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
                $p_cat_title=$_POST['cat_title'];
                $p_cat_desc=$_POST['cat_desc'];

                $update_product_categories="UPDATE categories SET cat_title='$p_cat_title',cat_desc='$p_cat_desc' WHERE cat_id='$id' ";
                $run_product_categories=mysqli_query($con,$update_product_categories);
                if($run_product_categories){
                    echo "<script>alert('Update Categories Sucessfully')</script>";
                    echo "<script>window.open('index.php?View_Categories','_self')</script>";
                }
             }
            ?>
            <!-- Update Code End -->
        </div>
      </div>
    </div>
  </div>
<?php } ?>