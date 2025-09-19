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
          <i class="fa fa-dashboard"></i>DashBoard / Insert Sliders
       </li>
    </ol>
  </div>
</div>
<!-- 1 Row End -->
<!-- 2 Row End -->
 <div class="row">
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
         <h3 class="panel-title">
            <i class="fa fa-money fa-fw"></i> Insert Sliders
         </h3>
       </div>

       <div class="panel-body">
          <form action="" method="post" enctype="multipart/form-data">
             <div class="form-group">
                  <label for="" class="col-md-3 control-label">Slider Name</label>
             </div>
             <div class="col-md-6">
                <input type="text" name="slider_name" id="slider_name">
             </div>
              <br><br>
              <div class="form-group">
                  <label for="" class="col-md-3 control-label">Slider Url</label>
             </div>
             <div class="col-md-6">
                <input type="text" name="slider_url" id="slider_url">
             </div>
             <br><br>
             <div class="form-group">
                  <label for="" class="col-md-3 control-label">Slider Image</label>
              </div>
             <div class="col-md-6">
                <input type="file" name="slider_image" id="slider_image">
             </div>
             <div class="form-group">
                <label class="col-md-3 control-label"></label>
             </div>
             <br><br>
             <div class="col-md-3" >
                <input type="submit" value="Submit" id='submit' name='submit' class="btn btn-success form-control">
             </div>
             <div class="col-md-3">
                <input type="reset" value="Cancel" class="btn btn-danger form-control">
             </div>

          </form>
          <?php
           if(isset($_POST['submit'])){
            $slider_name=$_POST['slider_name'];
            $slider_url=$_POST['slider_url'];
            $slider_image=$_FILES['slider_image']['name']; 
            $slider_temp=$_FILES['slider_image']['tmp_name']; 
                     
     
            $view_slider="SELECT * FROM slider";
            $run_slider=mysqli_query($con,$view_slider);
            $count_slider=mysqli_num_rows($run_slider);
            // echo $count_slider;
            if($count_slider<4){
                move_uploaded_file($slider_temp,"slider_images/$slider_image");

                $insert_slider="INSERT INTO slider(slider_name,slider_url,slider_image) VALUES('$slider_name','$slider_url','$slider_image') ";
                $run_slider=mysqli_query($con,$insert_slider);
                if($run_slider){
                    echo "<script>alert('Slider Added Sucessfully')</script>";
                }
            }else{
                echo "<script>alert('Already 4 Slider Added')</script>";
            }
           }  
          ?>
       </div>
     </div>
   </div>
 </div>
<!-- 2 Row End -->

<?php } ?>