<?php
require_once __DIR__ . "/../config/autoloader.php";
require_once __DIR__ . "/../config/incidences.php";
require_once __DIR__ . "/../includes/functions.php";

$school->setSchoolName(validate_input($_POST['scname']));
$school->setSchoolAddress(validate_input($_POST['address']));
$school->setSchoolPhoneNumber(validate_input($_POST['phone']));
$school->setSchoolEmailAddress(validate_input($_POST['email']));



if ($school->isSchoolExist()) {
    $_SESSION['warning'] = 'School is already exists!';
    redirect_to("../dashboard.php");

} else {
    if ($school->addSchoolDetails()) {
        $_SESSION['success'] = 'School added successfully';
        redirect_to("../dashboard.php?manageSchools");
    } else {
        $_SESSION['error'] = "Something went wrong, Try again!";
        redirect_to("../dashboard.php");

    }
}