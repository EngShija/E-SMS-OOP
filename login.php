<?php
require_once "includes/header.php";
?>
<div class="container">
  <div class="d-flex justify-content-center mt-5 mb-5 col-md-10 mx-auto col-lg-5 login">
    <form action="../controllers/login_handler.php" class="p-4 p-md-5 border rounded-3 bg-secondary was-validated" enctype="multipart/form-data" method="POST">
    <div class="error-text">

</div>
      <div class="form-floating mb-3">
  <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required autofocus title="Email Field is Required" autocomplete="off">
  <label for="email">Email address</label>
  <small class="invalid-feedback">Email is Required!</small>
</div>
<div class="form-floating">
  <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Your Password" required title="Password is Required" autocomplete="off">
  <label for="pwd">Password</label>
  <small class="invalid-feedback">Password is required!</small>
  
</div>
        <div class="checkbox mt-3">
          <label><input type="checkbox" name="cookie" value="cookie"> Remember me</label>
        </div>
        <div class="form-group button">
        <div>
          <input type="submit" class="btn bg-dark text-light form-control mt-3" value="Login" title="Click to Submit" name="login">
        </div>
      </div>
      <a href="pass_change.php" class="text-dark">Forgot Password</a>
  </form>
  </div>
</div>

<!-- <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
          <hr class="my-4">
          <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div> -->

<footer class="footer bg-dark text-light mt-4">&#169 2024 EngShija (+255612101742)</footer>

<script src="assets/js/login.js"></script>
</body>
</html>