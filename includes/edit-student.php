<?php
require_once "models/Student.php";
require_once "models/Parent.php";
$myStudent = new Student(new Database());
$student = $myStudent->get_student_by_id($_GET['updatestd']);
$_SESSION['stdId'] = $_GET['updatestd'];
$myParent = new studentParent(new Database());
$parent = $myParent->get_student_parent($_GET['updatestd']);
?>

<?php if (isset($_GET['updatestd-done'])) : ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-success" role="alert">
            Details Updated Successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php elseif (isset($_GET['updatestd-fail'])) : ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-danger text-center" role="alert">
            Something Went Wrong!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif ?>
<div class="d-flex justify-content-center">
    <div class="card text-center mb-3 mt-3" style="width: 20rem;">
        <div class="card-body">
            <?php if (isset($_SESSION['invalid'])) : ?>
                <div class="errror">
                    <p>Invalid Result Details Please Check and submit again!</p>
                </div>
            <?php unset($_SESSION['invalid']);
            endif ?>
            <h5 class="card-title" style="text-decoration: underline;"><?= strtoupper($student['first_name']) . " " . strtoupper($student['last_name']) ?></h5>
            <p class="card-text">Manage This student</p>
            <div class="row">
                <?php if ($role['role'] == 'admin') : ?>
                    <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#editstd">Edit Details</a>
                    <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#prtinfo">Parent Details</a>
                    <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addprt">Add Parent</a>
                <?php endif ?>
                <?php if($role['role'] == 'teacher') :?>
                    <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#stddetails">View Student Details</a>
                    <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#prtdetails">View Parent Details</a>
                    <?php endif ?>
                <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addrst">Add Results</a>
                <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#result">View Results</a>
                <?php if ($role['role'] == 'admin') : ?>
                    <a href="#" class="btn btn-dark mb-3">Payment Details</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once "includes/add-parent.php";
include_once "add-results.php";
include_once "includes/view-result.php";
include_once "includes/student-details.php";

if (!$myParent->is_parent_exist($_GET['updatestd'])) {
    if ($role['role'] == 'admin'){
    include_once "includes/parent-info.php";
    }
    elseif($role['role'] == 'teacher'){
        include_once "includes/parent-details.php";

    }
}
?>
<div class="modal fade" id="editstd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE STUDENT'S DETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/update-std.php" method="POST"
                class=" col-sm-5 col-lg-5 col-xs-5 was-validated">
                <div class="modal-body">
                    <div class="error-text">

                    </div>

                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" name="fname" id="fname" value="<?= $student['first_name'] ?>"
                            placeholder="Enter First Name" autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="mname">Middle Name:</label>
                        <input type="text" class="form-control" name="mname" id="mname" value="<?= $student['middle_name'] ?>"
                            placeholder="Enter Middle Name" autofocus>
                    </div>


                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" name="lname" id="lname" value="<?= $student['last_name'] ?>"
                            placeholder="Enter Last Name">
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
                            placeholder="Enter Registration Number">
                    </div>

                    <div class="form-group">
                        <label for="class">Current Class:</label>
                        <input type="text" class="form-control" name="class" id="class" value="<?= $student['class'] ?>"
                            placeholder="Enter Current Class ">
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