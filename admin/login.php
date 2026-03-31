<?php
 session_start();
 include("include/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
      <h2 class="text-center mb-4">Admin Login</h2>
      <form action="#" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="admin_email" name="admin_email"  placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Enter your password" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary" id="admin_login" name="admin_login">Login</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['admin_login'])) {
    $admin_email =  $_POST['admin_email'];
    $admin_password =$_POST['admin_password'];
    $get_admin = "SELECT * FROM admin_login 
                  WHERE admin_email='$admin_email' 
                  AND admin_pass='$admin_password'";

    $run_admin = mysqli_query($con, $get_admin);

    if (!$run_admin) {
        die("Query Failed: " . mysqli_error($con));  
    }

    $count = mysqli_num_rows($run_admin);

    if ($count == 1) {
        $_SESSION['admin_email'] = $admin_email;
        echo "<script>window.open('index.php?Dashboard','_self')</script>";
    } else {
        echo "<script>alert('Email / Password is Incorrect')</script>";
    }
}
?>
