<?php
session_start();
require_once "models/Users.php";
include_once "models/Subject.php";
require_once __DIR__ . "/../includes/functions.php";
$user = new User(new Database());
// $hello = <script>localStorage.getItem('teacher_id')</script>;
$teacher = $user->get_user_by_id($$hello);

$subject = new Subject(new Database());

$mySubject = $subject->get_all_subjects();

?>

<div class="modal fade" id="updatetch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <script>
     return localStorage.getItem('teacher_id')
</script>
    <form action="controllers/update-teacher.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5 was-validated">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE STUDENT'S DETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="fname" id="fname"
                            value="<?= $teacher['first_name'] ?>" placeholder="Enter First Name" autofocus>
                            <label for="fname">First Name:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lname" id="lname"
                            value="<?= $teacher['last_name'] ?>" placeholder="Enter Last Name">
                            <label for="lname">Last Name:</label>
                    </div>


                    <div class="form-floating mb-3">
                        <select class="form-control" name="class" id="class">
                            <option><?= $student['class'] ?></option>
                            <?php foreach ($mySubject as $subjects) : ?>
                                <option value="<?= $subjects['sub_name'] ?>"><?= $myClass['sub_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="class">Subject Tought:</label>
                    </div>
                </div>

                <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email"
                            value="<?= $teacher['email_address'] ?>" placeholder="Enter Email" >
                            <label for="email">Email:</label>
                    </div>

                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/sweetAlerts.js"></script>