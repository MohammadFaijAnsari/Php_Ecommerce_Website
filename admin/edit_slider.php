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
                <i class="fa fa-dashboard"></i>DashBoard / Edit Sliders
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
                    <i class="fa fa-money fa-fw"></i> Edit Sliders
                </h3>
            </div>

            <div class="panel-body">
                <?php
                 if (isset($_GET['Edit_Slider'])) {
                    $slider_id = $_GET['Edit_Slider'];
                    $select_slider = "SELECT * FROM slider WHERE id='$slider_id'";
                    $run_slider = mysqli_query($con, $select_slider);
                    $row_slider = mysqli_fetch_array($run_slider);
                    $slider_name = $row_slider['slider_name'];
                    $img = $row_slider['slider_image'];
                }
                ?>
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
                        <br>
                        <img src="slider_images/<?php echo $img?>" height='50px' width='50px' alt="" srcset=""> 
                        <br>    
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                    </div>
                    <br><br>
                    <div class="col-md-3">
                        <input type="submit" accept="_adim_area/slider_images" value="Submit" id='submit' name='submit' class="btn btn-success form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="reset" value="Cancel" class="btn btn-danger form-control">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $s_name = $_POST['slider_name'];
                    $s_url=$_POST['slider_url'];
                    if ($_FILES['slider_image']['name']) {
                        $product_img1 = $_FILES['slider_image']['name'];
                        $tmp_image = $_FILES['slider_image']['tmp_name'];
                        move_uploaded_file($tmp_image, "product_images/$product_img1");
                    } else {
                        $product_img1 = $img;
                    }

                    $update_slider = "UPDATE slider SET slider_name='$s_name',slider_url='$s_url', slider_image='$product_img1' WHERE id='$slider_id'";
                    $run_slider = mysqli_query($con, $update_slider);

                    if ($run_slider) {
                        echo "<script>alert('Slider Updated Successfully')</script>";
                    } else {
                        echo "<script>alert('Slider Not Updated Successfully')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- 2 Row End -->

<?php
}
?>