<?php
session_start();
require_once "../models/Subject.php";
require_once "../includes/functions.php";
$subject = new Subject(new Database());

$subject->set_subjectName(validate_input($_POST['subname']));
$subject->set_subjectCategory(validate_input($_POST['subcategory']));
if(isset($_SESSION['subid'])){
    $subject->edit_subject($subject->get_subjectName(), $subject->get_subjectCategory(), $_SESSION['subid']);
    $_SESSION['subedit'] = 'subEdited';
    redirect_to('../dashboard.php?managesub');
}


echo $subject->get_subjectName();
echo $_SESSION['subid'];
echo $subject->get_subjectCategory();