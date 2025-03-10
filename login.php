<?php
session_start();
require_once "includes/header.php";
require_once "includes/functions.php";

?>
<!-- <div class="container">
  <div class="d-flex justify-content-center mt-5 mb-5 col-md-10 mx-auto col-lg-5 login"> -->
  <div class="mx-auto col-lg-3 mt-5 login">
    <form action="../controllers/login_handler.php" class="p-4 p-md-5 border rounded-3 border-primary bg-dark was-validated" enctype="multipart/form-data" method="POST">
    <div class="error-text">

</div>

<?php
if(isset($_SESSION['passChanged'])){
  sweetAlert('Success', 'Password Updated Successfully!', 'success');
  unset($_SESSION['passChanged']);
}
?>
<div class="form-floating mb-3">
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required autofocus title="Email Field is Required" autocomplete="off">
        <label for="email">Email Address</label>
        <small class="invalid-feedback">*Email is Required!</small>
      </div>
<div class="form-floating">
  <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Your Password" required title="Password is Required" autocomplete="off">
  <label for="pwd">Password</label>
  <small class="invalid-feedback">*Password is required!</small>
  
</div>
        <div class="checkbox mt-3">
          <label class="text-light"><input type="checkbox" name="cookie" value="cookie"> Remember me</label>
        </div>
        <div class="form-group button">
        <div>
          <input type="submit" class="btn btn-lg btn-primary form-control mt-3" value="Login" title="Click to Submit" name="login">
        </div>
      </div>
      <a href="forget-password.php" class="text-light">Forgot Password</a>
  </form>
  </div>
<script src="assets/js/login.js"></script>
</body>
</html>