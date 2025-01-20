<?php
session_start();
require_once __DIR__. "/../models/Results.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Student.php";
require_once __DIR__ . "/../models/Exam.php";
require_once __DIR__ . "/../models/pdf.php";
require_once __DIR__ . "/../models/Subject.php";

$subject = new Subject(new Database());
$myResult = new Results(new Database());
$student = new Student(new Database());
$exam = new Exam(new Database());
$myStudent = $student->get_student_by_id($_SESSION['stdId']);

$student->set_student_id($_SESSION['stdId']);
$exam->set_examName(validate_input($_POST['exam']));
$exam->set_yos(validate_input($_POST['yos']));
$student->set_fname($myStudent['first_name']);
$student->set_lname($myStudent['last_name']);
if ($myResult->is_result_exist($student->get_student_id(), $exam->get_examName() . " " . $exam->get_yos())) {
$_SESSION['viewresult'] =  strtoupper($student->get_fname()) . ' ' . strtoupper($student->get_lname()) . '(' .  $exam->get_examName() .  $exam->get_yos(). ')';
$_SESSION['fname'] = $student->get_fname();
$_SESSION['lname'] = $student->get_lname();
$_SESSION['yos'] = $exam->get_yos();
$_SESSION['exam'] = $exam->get_examName();
redirect_to("../dashboard.php?viewresults");
}
else{
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    $_SESSION['noRusults'] = 'noResults';
}
// echo strtoupper($student->get_fname()) . ' ' . strtoupper($student->get_lname()) . '(' .  $exam->get_examName() .  $exam->get_yos(). ')';
