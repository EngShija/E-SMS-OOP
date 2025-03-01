<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

if(isset($_SESSION['passChanged'])){
  sweetAlert('Success', 'Password Updated Successfully!', 'success');
  unset($_SESSION['passChanged']);
}
else if(isset($_SESSION['passNotC'])){
  sweetAlert('Error', 'Something went wrong, try again!', 'error');
  unset($_SESSION['passNotC']);
}
else if(isset($_SESSION['passNoMatch'])){
  sweetAlert('Warning', 'New passwords do not match!', 'warning');
  unset($_SESSION['passNoMatch']);
}
else if(isset($_SESSION['wrongCurrent'])){
  sweetAlert('Warning', 'You entered wrong current password, three(3) incorrect trials will log you out, '. $_SESSION['wrongCurrent']. ' trials remained', 'warning');
  unset($_SESSION['wrongCurrent']);
}
else if(isset($_SESSION['emptyField'])){
  sweetAlert('Warning', 'All fields are required!', 'warning');
  unset($_SESSION['emptyField']);
}

?>

<div class="modal fade text-center" id="updatePass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="controllers/update-password.php" method="POST"
    class=" col-sm-5 col-lg-5 col-xs-5">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update paswword</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body addstd">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="oldpass" id="oldpass"
                            placeholder="Enter Old Password" autofocus>
                            <label for="oldpass">Old Password:</label>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="newpass" id="newpass"
                            placeholder="Enter New Password">
                            <label for="newpass">New Password:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="confpass" id="lname"
                            placeholder="Confirm New Password">
                            <label for="lname">Confirm Password:</label>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<script src="assets/js/data2.js"></script>
