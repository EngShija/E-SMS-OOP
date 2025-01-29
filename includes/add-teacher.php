<!-----ADD TEACHER--->

<div class="modal fade" id="addtch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="controllers/add-teacher-handler.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">ADD TEACHER</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name"
                            required autofocus>
                        <label for="fname">First Name:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name"
                            required>
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
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter Email Address" required>
                        <label for="email">Email:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject Tought"
                            required>
                        <label for="phone">Subject Tought:</label>

                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="pass"
                            placeholder="Enter Parent Relationship" required>
                        <label for="pass">Password:</label>
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