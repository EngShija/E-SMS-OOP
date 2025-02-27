<?php
$myExam = $exam->get_exam_by_id($_GET['examid']);
$exam->set_examName($myExam['exam_name']);
?>

<div class="d-flex justify-content-center">
    <div class="card text-center mb-3 mt-3" style="width: 20rem;">
        <div class="card-body">       

            <h5 class="card-title" style="text-decoration: underline;">
                <?= strtoupper($exam->get_examName()) ?>
            </h5>
            <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#editExam">Edit Subject</a>
            </div>
        </div>
    </div>
</div>

<?php
include_once "includes/edit-exam.php";
?>