<?php
$school->setSchoolId($_SESSION[SCHOOL_ID]);

$class->setSchoolId($_SESSION[SCHOOL_ID]);

$user->setSchoolId($_SESSION[SCHOOL_ID]);


?>

<div class="text-center py-5">
    <div class="counts bg-dark text-light text-center border border-success">
        <h4><?= count($student->get_students($school->getSchoolId())) . " " ?> Students</h4>
    </div>
    <div class="counts bg-dark text-light text-center border border-success">
        <h4><?= count($user->get_parents($school->getSchoolId())) . " " ?> Parents</h4>
    </div>
    <div class="counts bg-dark text-light text-center border border-success">
        <h4><?= count($user->get_teachers()) . " " ?> Teachers</h4>
    </div>
    <div class="counts bg-dark text-light text-center border border-success">
        <h4><?= count($user->get_admins()) . " " ?> Admins</h4>
    </div>
    <div class="counts text-light text-center bg-dark border border-success">
    <h4><?= count($class->get_all_classes()) . " " ?> Classes</h4>
    </div>
    <div class="counts bg-dark text-light text-center border border-success">
        <h4><?= count($subject->get_all_subjects()) . " " ?> Subjects</h4>
    </div>
</div>