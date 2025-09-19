
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
          <?php
            $session_email=$_SESSION['c_email'];
            $select_customer="SELECT * FROM registration WHERE c_email='$session_email' ";
            $run_customer=mysqli_query($db,$select_customer);
            $res_customer=mysqli_fetch_array($run_customer);
            $c_id=$res_customer['c_id'];
            
           ?>
    <div class="box">
    <div class="card shadow-lg p-4">
      <h1 class="text-center mb-4">Payment Option</h1>
      <div class="row text-center">
        <!-- Pay Offline -->
        <div class="col-md-6 mb-4">
          <div class="p-3 border rounded h-10 ">
            <h5>Pay Offline</h5>
            <a href="order.php?c_id=<?php echo $c_id; ?>" class="btn btn-primary mt-3">Proceed</a>
          </div>
        </div>

        <!-- Pay Online -->
        <div class="col-md-6 ">
          <div class="p-3 border">
            <h5>Pay Online</h5>
            <a href="razorpay.php" class="btn btn-success" id="submit" name='submit'>Scan & Pay</a>
            <!-- <img src="./admin_area/Payment/qr.jpg" alt="QR Code" class="img-fluid " style="max-width: 200px;"> -->
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Optional for interactivity) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>