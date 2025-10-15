<?php
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Subject.php";
$subject = new Subject(new Database());
?>

<div class="modal fade" id="addSchool" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="controllers/add_school_handler.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD SCHOOL</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="text" class="form-control" name="scname" id="scname"
                            placeholder="Enter Subject Name" required autofocus>
                        <label for="scname">School Name:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="text" class="form-control" name="address" id="address"
                            placeholder="Enter Subject Name" required autofocus>
                        <label for="address">School Address:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="number" class="form-control" name="phone" id="phone"
                            placeholder="Enter Subject Name" required autofocus>
                        <label for="phone">School Phone Number:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter Subject Name" required autofocus>
                        <label for="email">School Email:</label>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>