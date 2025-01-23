<?php
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../models/Class.php";
require_once __DIR__ . "/../includes/functions.php";

$class = new StudentClass(new Database());
?>


<div class="modal fade text-center" id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="controllers/register_handler.php" method="POST"
    class=" col-sm-5 col-lg-5 col-xs-5">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body addstd">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="fname" id="fname"
                            placeholder="Enter First Name" autofocus>
                            <label for="fname">First Name:</label>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="mname" id="mname"
                            placeholder="Enter Middle Name">
                            <label for="mname">Middle Name:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lname" id="lname"
                            placeholder="Enter Last Name">
                            <label for="lname">Last Name:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Select Your Gender:</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="gender">Gender:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="RegNo" id="RegNo"
                            placeholder="Enter Registration Number">
                            <label for="RegNo">Registration Number:</label>
                    </div>


                    <div class="form-floating mb-3">
                        <select class="form-control" name="class" id="class">
                            <option>Select Current Class</option>
                            <?php foreach ($class->get_all_classes() as $myClass) : ?>
                                <option value="<?= $myClass['class_name'] ?>"><?= $myClass['class_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="class">Current Class:</label>
                    </div>

                    <!-- <div class="form-group">
                            <label for="class">Current Class:</label>
                            <input type="text" class="form-control" name="class" id="class"
                                placeholder="Enter Current Class ">
                        </div> -->
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<script src="assets/js/data2.js"></script>