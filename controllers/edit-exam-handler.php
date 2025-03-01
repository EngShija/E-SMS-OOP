<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

$exam->set_examName(validate_input($_POST['examname']));
if(isset($_SESSION['examid'])){
    $exam->edit_exam($exam->get_examName(), $_SESSION['examid']);
    $_SESSION['examedit'] = 'examEdited';
    redirect_to('../dashboard.php?manageexam');
}
