<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

$subject->set_subjectName(validate_input($_POST['subname']));
$subject->set_subjectCategory(validate_input($_POST['subcategory']));
if(isset($_SESSION['subid'])){
    $subject->edit_subject($subject->get_subjectName(), $subject->get_subjectCategory(), $_SESSION['subid']);
    $_SESSION['subedit'] = 'subEdited';
    redirect_to('../dashboard.php?managesub');
}
