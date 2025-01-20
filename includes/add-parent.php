
<div class="modal fade" id="addprt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container">
        <div class="modal-dialog modal-lg">
        <form action="controllers/add-parent.php" method="POST"
        class=" col-sm-5 col-lg-5 col-xs-5">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENT'S PARENT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <div class="error-text">

                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="fname" id="fname"
                                placeholder="Enter First Name" required autofocus>
                                <label for="fname">First Name:</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lname" id="lname"
                                placeholder="Enter Last Name" required>
                                <label for="lname">Last Name:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-control" name="gender" id="gender">
                                <option>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="gender">Gender:</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="Enter Physical Address" required>
                                <label for="address">Physical Address:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email Address" required>
                                <label for="email">Email Address:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number " required>
                                <label for="phone">Phone Number:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="relation" id="relation"
                                placeholder="Enter Parent Relationship " required>
                                <label for="relation">Relationship:</label>
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>