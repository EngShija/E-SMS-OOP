<?php
require_once __DIR__. "/../models/Results.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Student.php";
require_once __DIR__ . "/../models/Exam.php";
require_once __DIR__ . "/../models/pdf.php";

$student = new Student(new Database());
$exam = new Exam(new Database());
// $myStudent = $student->get_student_by_id($_SESSION['stdId']);

// $student->set_student_id($_SESSION['stdId']);
$exam->set_examName(validate_input($_SESSION['exam']));
$exam->set_yos(validate_input($_SESSION['yos']));
$student->set_fname($_SESSION['fname']);
$student->set_lname($_SESSION['lname']);
// echo $_SESSION['viewresult'];

?>

<div class="d-flex justify-content-center">
    <div class="card text-center mb-3 mt-3" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title" style="text-decoration: underline;"><?= strtoupper($student->get_fname()) . " " . strtoupper($student->get_lname()) ?></h5>
            <p class="card-text">Student Results</p>
            <div class="row">
                <a href="documents/<?= $_SESSION['viewresult']. '.pdf' ?>" download="documents/<?= $_SESSION['viewresult']. '.pdf' ?>" class="btn btn-dark mb-3">Download Results</a>
                <button onclick="window.open('documents/<?= $_SESSION['viewresult']. '.pdf' ?>')" class="btn btn-dark mb-3">View/Print Results</button>
            </div>
        </div>
    </div>
</div>
