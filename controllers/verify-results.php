<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

$exam->set_examName(validate_input($_POST['exam']));
$exam->set_yos(validate_input($_POST['yos']));

$exam_type = $exam->get_examName() . " " . $exam->get_yos();

if($result->update_results_status(VERIFIED, $exam_type)){
    $_SESSION['rstVerified'] = $exam_type;
    redirect_to('../dashboard.php');
}