<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
 }else{

 
?>
<!-- 1 Row Start -->
<div class="row" style="margin-top:50px;">
  <div class="col-lg-12">
    <ol class="breadcrumb">
       <li>
          <i class="fa fa-dashboard"></i>DashBoard / Insert Product_Categories
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
              <i class="fa fa-dashboard"></i>Insert Product Catgory
           </div>
        </div>

        <div class="panel-body">
           <form action="" method="post" class="form-horizental">
             <div class="form-group">
                <label class="col-md-3 control-label">Product Category Title</label>
             </div>

             <div class="col-md-6">
                <input type="text" name="p_cat_title" id="p_cat_title" class="form-control">
             </div>
             <br><br>
             <div class="form-group">
                <label class="col-md-3 control-label">Product Category Description</label>
             </div>

             <div class="col-md-6">
                <textarea name="p_cat_desc" id="p_cat_desc" class="form-control"></textarea>
             </div>
             <br><br>
             <div class="form-group">
                <label class="col-md-3 control-label"></label>
             </div>
              <br>
             <div class="col-md-3" >
                <input type="submit" value="Submit" id='submit' name='submit' class="btn btn-success form-control">
             </div>
             <div class="col-md-3">
                <input type="reset" value="Cancel" class="btn btn-danger form-control">
             </div>

           </form>
        </div>
      </div>
    </div>
  </div>
 <!-- PHP Apply Start -->
    <?php
     if(isset($_POST['submit'])){
        $p_cat_title=$_POST['p_cat_title'];
        $p_cat_desc=$_POST['p_cat_desc'];
        $insert_p_categories="INSERT INTO product_categories(p_cat_title,p_cat_desc) VALUES ('$p_cat_title','$p_cat_desc')";
        $run_p_categories=mysqli_query($con,$insert_p_categories);
        if($run_p_categories){
           echo "<script>alert('Insert Product Categories Sucessfully')</script>";
         //   echo "<script>window.open('../shop.php')</script>";
        }else{
            echo "<script>alert('Product Categories not Sucessfully')</script>";
        }
     }
    ?>
 <!-- PHP Apply End -->
<!-- 2 Row Start -->
<?php } ?>