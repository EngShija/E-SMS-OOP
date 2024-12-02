<div class="modal fade" id="editst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE STUDENT'S DETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../controllers/update-std.php" method="POST" class="col-sm-5 col-lg-5 col-xs-5 was-validated">
                <div class="modal-body">
                    <div class="error-text">

                    </div>

                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name"
                            value="<?= $student['first_name'] ?>" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name"
                            value="<?= $student['last_name'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Select Your Gender:</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="RegNo">Registration Number:</label>
                        <input type="text" class="form-control" name="RegNo" id="RegNo"
                            placeholder="Enter Registration Number" value="<?= $student['reg_no'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="class">Current Class:</label>
                        <input type="text" class="form-control" name="class" id="class"
                            placeholder="Enter Current Class" value="<?= $student['class'] ?>" required>
                    </div>
                    <?= $student['unique_id'] . "<br>"; ?>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editstd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE STUDENT'S DETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controllers/update-std.php" method="POST"
                    class=" col-sm-5 col-lg-5 col-xs-5 was-validated">
                    <div class="error-text">

                    </div>

                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" name="fname" id="fname" value="<?= $student['first_name'] ?>"
                            placeholder="Enter First Name" required autofocus>
                    </div>


                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" name="lname" id="lname" value="<?= $student['last_name'] ?>"
                            placeholder="Enter Last Name" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="<?= $student['gender'] ?>"><?= $student['gender']  ?></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="RegNo">Registration Number:</label>
                        <input type="text" class="form-control" name="RegNo" id="RegNo" value="<?= $student['reg_no'] ?>"
                            placeholder="Enter Registration Number" required>
                    </div>

                    <div class="form-group">
                        <label for="class">Current Class:</label>
                        <input type="text" class="form-control" name="class" id="class" value="<?= $student['class'] ?>"
                            placeholder="Enter Current Class " required>
                    </div>

            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>