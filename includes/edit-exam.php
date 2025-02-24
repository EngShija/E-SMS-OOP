<?php
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Exam.php";
$exam = new Exam(new Database());
$myExam = $exam->get_exam_by_id($_GET['examid']); 
$_SESSION['examid'] = $_GET['examid'];
?>

<div class="modal fade" id="editExam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="controllers/edit-exam-handler.php" method="POST"
    class=" col-sm-5 col-lg-5 col-xs-5">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT EXAM DETAILS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="examname" id="examname" placeholder="Enter Subject Name" value="<?= $myExam['exam_name'] ?>" required autofocus>
                        <label for="examname">Exam type:</label>
                    </div>

                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>