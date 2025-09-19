<!-- Header Include Start -->
<?php
 require_once('common_index.php');
?>
<br>
<!-- Header Include End -->

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    #qr-code {
      display: none;
      margin-top: 20px;
      text-align: center;
    }

    #qr-code img {
      width: 200px;
      height: auto;
    }

    .card {
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container py-4">
  <div class="row">
    <!-- Sidebar Column -->
    <div class="col-md-3 ">
      <?php require_once('include/sidebar.php'); ?>
    </div>

<!-- Main Payment Start -->
<!-- QR Payment Start -->
    <div class="col-md-12 col-md-4">
      <div class="card">
        <div class="card-body text-center">
            <br>
          <h4 class="card-title mb-4">🧾 Generate QR Code for Payment</h4>
          <form id="payment-form">
            <button type="submit" class="btn btn-success">Generate QR for Payment</button>
          </form>
          <br>
          <div id="qr-code" class="mt-4"s>
            <h5>Scan to Pay</h5>
            <img src="./admin_area/Payment/qr.jpg" alt="QR Code" class="img-fluid rounded" style="margin-bottom: 20px;">
          </div>
        </div>
      </div>
    </div>
    <br>
<!-- QR Payment End -->

<!-- Card Payment Start-->
    <div class="col-md-12 col-lg-4">
    <div class="card box">
     <div class="card-body text-center">
      <h3 class="card-title mb-4">Payment With Card</h3>

      <form id="payment-form" action="payment.php" method="post">
        <div class="form-group text-left mb-3">
          <label for="cardNumber">Card Number</label>
          <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="16">
        </div>

        <div class="form-row text-left">
          <div class="form-group col-md-6 mb-3">
            <label for="expiryDate">Expiry Date</label>
            <input type="date" class="form-control" id="expiryDate" placeholder="MM/YY">
          </div>

          <div class="form-group col-md-6 mb-3">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="123" maxlength="3">
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-block mt-3">Submit</button>
      </form>

      <!-- <div id="qr-code" class="mt-4" style="display: none;">
        <h5>Scan to Pay</h5>
        <img src="./admin_area/Payment/qr.jpg" alt="QR Code" class="img-fluid rounded" style="margin-bottom: 20px;">
      </div> -->
    </div>
  </div>
</div>
<!-- Card Payment End -->
<!-- Main Payment End -->
  </div>
</div>
<!-- QR Show Script Start -->
<script>
  document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('qr-code').style.display = 'block';
  });
</script>
<!-- QR Show Script End -->
</body>
</html>
<br>
<!-- Include Footer Start -->
<?php require_once('include/footer.php'); ?>
<!-- Include Footer End -->
