<?php
require_once "includes/header.php";
?>
<div class="container">
  <div class="d-flex justify-content-center mt-5 mb-5 login">
    <form action="../controllers/change_password.php" class="col-sm-5 col-lg-5 col-xs-5 was-validated" enctype="multipart/form-data" method="POST">
    <div class="error-text">

</div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required autofocus title="Email Field is Required" autocomplete="off">
        <small class="invalid-feedback">Email is Required!</small>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter Your Password" required title="Password is Required">
        <small class="invalid-feedback">Password is required!</small>
        </div>
        <div class="form-group button">
        <div>
          <input type="submit" class="btn bg-dark text-light form-control mt-3" value="Change" title="Click to Submit" name="login">
        </div>
      </div>
  </form>
  </div>
</div>
<footer class="footer bg-dark text-light mt-4">&#169 2024 EngShija (+255612101742)</footer>

<script src="assets/js/change_pass.js"></script>
</body>
</html>