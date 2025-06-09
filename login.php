<?php
session_start();
require_once "includes/header.php";
require_once "includes/functions.php";
?>
<div class="container vh-100 d-flex align-items-center justify-content-center">
  <div class="row w-100 justify-content-center">
    <div class="login col-12 col-sm-8 col-md-6 col-lg-4">
      <form id="loginForm" action="../controllers/login_handler.php" class="bg-dark bg-opacity-75 border border-primary rounded-4 shadow-lg p-4 was-validated" enctype="multipart/form-data" method="POST">
        <h3 class="text-center text-light mb-4">Login</h3>
        <div class="error-text"></div>
        <?php
        if (isset($_SESSION['passChanged'])) {
          sweetAlert('Success', 'Password Updated Successfully!', 'success');
          unset($_SESSION['passChanged']);
        }
        ?>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required autofocus title="Email Field is Required" autocomplete="off">
          <label for="email">Email Address</label>
          <div class="invalid-feedback">*Email is Required!</div>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Your Password" required title="Password is Required" autocomplete="off">
          <label for="pwd">Password</label>
          <div class="invalid-feedback">*Password is required!</div>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" name="cookie" value="cookie" id="rememberMe">
          <label class="form-check-label text-light" for="rememberMe">
            Remember me
          </label>
        </div>
        <div class="button">
        <button type="submit" class="btn btn-primary btn-lg w-100 mb-2" name="login">Login</button>
        </div>
        <div class="text-end">
          <a href="forget-password.php" class="link-light">Forgot Password?</a>
        </div>
        <div class="text-start mt-3">
          <p class="text-light">Don't have an account? <a href="register.php" class="link-warning text-decoration-none">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="assets/js/login.js"></script>
<?php
require_once "includes/footer.php";
?>