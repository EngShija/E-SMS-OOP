<?php
session_start();
require_once "../models/Exam.php";
require_once "../includes/functions.php";
$exam = new Exam(new Database());

$exam->set_examName(validate_input($_POST['examname']));
if(isset($_SESSION['examid'])){
    $exam->edit_exam($exam->get_examName(), $_SESSION['examid']);
    $_SESSION['examedit'] = 'examEdited';
    redirect_to('../dashboard.php?manageexam');
}
