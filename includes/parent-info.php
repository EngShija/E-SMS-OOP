
<div class="modal fade" id="prtinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container">
        <div class="modal-dialog modal-lg">
        <form action="controllers/update-prt.php" method="POST"
        class=" col-sm-5 col-lg-5 col-xs-5">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">PARENT INFORMATION</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <div class="error-text">

                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="fname" id="fname"
                                placeholder="Enter First Name" value="<?= $parentUser['first_name'] ?>" disabled required autofocus>
                                <label for="fname">First Name:</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lname" id="lname"
                                placeholder="Enter Last Name"  value="<?= $parentUser['last_name'] ?>" disabled required>
                                <label for="lname">Last Name:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-control" name="gender" id="gender" disabled required>
                                <option><?= $parent['gender'] ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="gender">Gender:</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="Enter Physical Address"  value="<?= $parent['physical_address'] ?>" disabled required>
                                <label for="address">Physical Address:</label>
                        </div>



                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="fname" id="fname"
                                placeholder="Enter First Name" value="<?= $parentUser['first_name'] ?>" hidden required autofocus>
                                <label for="fname">First Name:</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lname" id="lname"
                                placeholder="Enter Last Name"  value="<?= $parentUser['last_name'] ?>" hidden required>
                                <label for="lname">Last Name:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-control" name="gender" id="gender" hidden required>
                                <option value="<?= $parent['gender'] ?>"><?= $parent['gender'] ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="gender">Gender:</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="Enter Physical Address"  value="<?= $parent['physical_address'] ?>" hidden required>
                                <label for="address">Physical Address:</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email Address"  value="<?= $parentUser['email_address'] ?>" hidden required>
                                <label for="email">Email Address:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number "  value="<?= $parent['phone'] ?>" hidden required>
                                <label for="phone">Phone Number:</label>
                        </div>




                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email Address"  value="<?= $parentUser['email_address'] ?>" disabled required>
                                <label for="email">Email Address:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number "  value="<?= $parent['phone'] ?>" hidden required>
                                <label for="phone">Phone Number:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-control" name="relation" id="relation">
                                <option value="<?= $parent['relation'] ?>"><?= $parent['relation'] ?></option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="brother">Brother</option>
                                <option value="sister">Sister</option>
                                <option value="uncle">Uncle</option>
                                <option value="aunt">Aunt</option>
                                <option value="">Other Gurdian</option>
                            </select>
                                <label for="relation">Relationship:</label>
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>