<?php
$mySubject = $subject->get_subject_by_id($_GET['subid']);
$subject->set_subjectName($mySubject['sub_name']);
?>

<div class="d-flex justify-content-center">
    <div class="card text-center mb-3 mt-3" style="width: 20rem;">
        <div class="card-body">       

            <h5 class="card-title" style="text-decoration: underline;">
                <?= strtoupper($subject->get_subjectName()) ?>
            </h5>
            <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#editSub">Edit Subject</a>
            </div>
        </div>
    </div>
</div>

<?php
include_once "includes/edit-subject.php";
?>