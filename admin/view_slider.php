<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<!-- 1 Row Start -->
<div class="row" style="margin-top: 50px;">
   <div class="col-lg-12">
     <ol class="breadcrumb">
       <li class="active">
          <i class="fa fa-dashboard"></i>Dashboard / View Slider
       </li>
      </ol>
   </div>
</div>
<!-- 1 Row End -->
<!-- 2 Row Start -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">
              <i class="fa fa-money fa-fw"></i> DashBoard / View Slider
           </h3>
        </div>
        <div class="panel-body">
          <?php
           $get_slider="SELECT * FROM slider";
           $run_slider=mysqli_query($con,$get_slider);
           while($row_slider=mysqli_fetch_array($run_slider)){
            $slider_id=$row_slider['id'];
            $slider_name=$row_slider['slider_name'];
            $slider_image=$row_slider['slider_image'];
         //   }
          ?>
          <div class="col-lg-3 col-md-3">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title" align='center'>
                     <?php echo $slider_name;?>
                  </h3>
               </div>
               <div class="panel-body">
                 <img src="slider_images/<?php echo $slider_image;?>" height="100px" width="160px" >
               
               <div class="panel-footer">
                  <center>
                     <a href="index.php?Edit_Slider=<?php echo $slider_id;?>" class="pull-left">
                        <i class="fa fa-pencil fa-2x"></i>
                     </a>
                     <a href="index.php?Delete_Slider=<?php echo $slider_id;?>" class="pull-right">
                        <i class="fa fa-trash-o fa-2x"></i>
                     </a>
                  </center>
               </div>
               </div>
            </div>
          </div>
          <?php } ?>
        </div>
      
      </div>
    </div>
  </div>
<!-- 2 Row End -->
<?php } ?>

