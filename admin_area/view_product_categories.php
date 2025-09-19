<?php
include("include/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <!-- 1 Row Start -->
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Product Categories
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
                        <i class="fa fa-money"></i> View Product Categories
                    </h3>
                </div>
            

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-hover table-striped" align="center">
                        <thead>
                            <tr>
                                <th>Product Categories Id</th>
                                <th>Product Categories Title</th>
                                <th>Product Categories Description</th>
                                <th>Product Categories Edit</th>
                                <th>Product Categories Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select_p_categories = "SELECT * FROM product_categories";
                            $run_p_categories = mysqli_query($con, $select_p_categories);
                            while ($row_p_categories = mysqli_fetch_array($run_p_categories)) {


                                $id = $row_p_categories['p_cat_Id'];
                                $title = $row_p_categories['p_cat_title'];
                                $desc = $row_p_categories['p_cat_desc'];
                            ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $desc; ?></td>
                                    <td>
                                        <a href="index.php?Edit_Product_Categories=<?php echo $id; ?>" align='center'>
                                            <i class="fa fa-pencil fa-2x"></i></a>
                                    </td>
                                    <td>
                                        <a href="index.php?Delete_Product_Categories=<?php echo $id; ?>" align='center' >
                                            <i class="fa fa-trash-o fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>.
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- 2 Row End -->
<?php } ?>
