<?php
require_once "includes/header.php";
?>
<!-- <div class="container">
  <div class="d-flex justify-content-center mt-5 mb-5 login"> -->
  <div class="container">
  <div class="d-flex justify-content-center mt-5 mb-5 col-md-10 mx-auto col-lg-4 login">
    <form action="../controllers/change_password.php"  class="p-4 p-md-5 border rounded-3 border-primary bg-dark was-validated" enctype="multipart/form-data" method="POST">
    <div class="error-text">

</div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required autofocus title="Email Field is Required" autocomplete="off">
        <label for="email">Email Address</label>
        <small class="invalid-feedback">*Email is Required!</small>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name" required autofocus title="Email Field is Required" autocomplete="off">
        <label for="fname">First Name</label>
        <small class="invalid-feedback">*First Name is Required!</small>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your Last Name" required autofocus title="Email Field is Required" autocomplete="off">
        <label for="lname">Last Name</label>
        <small class="invalid-feedback">*Last Name is Required!</small>
      </div>
      </div>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="newpass" name="password" placeholder="Enter Your Password" required title="Password is Required">
        <label for="newpass">New Password</label>
        <small class="invalid-feedback">*Please Enter your New Password!</small>
        </div>
        <div class="form-floating mb-3">
        <input type="password" class="form-control" id="confpass" name="confpass" placeholder="Enter Your Password" required title="Password is Required">
        <label for="confpass">Confirm New Password</label>
        <small class="invalid-feedback">*Please Confirm your New Password!</small>
        </div>
        <div class="form-group button">
        <div>
          <input type="submit" class="btn btn-lg bg-primary text-light form-control mt-3" value="Change" title="Click to Submit" name="login">
        </div>
      </div>
      <a href="login.php" class="text-light">Back to login</a>

  </form>
  </div>
</div>

<div class="footer text-light">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top fixed-bottom bg-dark">
        <p class="col-md-4 mb-0">&#169 2024 - <?= date('Y') ?> EngShija (+255612101742)</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="assets/images/logo.jpg" height="30" width="30" class="rounded-circle border border-white"">
        </a>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#twitter" />
                    </svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#instagram" />
                    </svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#facebook" />
                    </svg></a></li>
        </ul>
    </footer>
</div><script src="assets/js/change_pass.js"></script>
</body>
</html>