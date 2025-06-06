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

                    <div class="form-floating mb-3 text-dark">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name"
                            required autofocus>
                        <label for="fname">First Name:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name"
                            required>
                        <label for="lname">Last Name:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Select Your Gender:</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="gender">Gender:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter Email Address" required>
                        <label for="email">Email:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                          <select class="form-control" name="subject" id="subject">
                              <option>Select Subject</option>
                              <?php foreach ($subject->get_all_subjects() as $mySubject) : ?>
                                  <option value="<?= $mySubject['sub_name'] ?>"><?= $mySubject['sub_name'] ?></option>
                              <?php endforeach; ?>
                          </select>
                          <label for="subject">Subject Name:</label>
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