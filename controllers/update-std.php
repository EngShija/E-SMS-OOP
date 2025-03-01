<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if (isset($_SESSION['stdId'])) {
    $student->set_fname(validate_input($_POST['fname']));
    $student->set_lname(validate_input($_POST['lname']));
    $student->set_gender(validate_input($_POST['gender']));
    $student->set_regNo(validate_input($_POST['RegNo']));
    $class->set_class_name(validate_input($_POST['class']));
    $student->set_mname(validate_input($_POST['mname']));
    $student->update_student($student->get_fname(), $student->get_mname(),  $student->get_lname(),  $student->get_gender(),  $student->get_regNo(), $class->get_class_name(), $_SESSION['stdId']);
    $_SESSION['updated'] = "done";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
$_SESSION['fail'] = "fail";
