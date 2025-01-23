<?php
session_start();
require_once "../models/Student.php";
require_once "../includes/functions.php";
require_once "../models/Class.php";
$mystudent = new Student(new Database());
$studentClass = new StudentClass(new Database());


if (isset($_SESSION['stdId'])) {
    $mystudent->set_fname(validate_input($_POST['fname']));
    $mystudent->set_lname(validate_input($_POST['lname']));
    $mystudent->set_gender(validate_input($_POST['gender']));
    $mystudent->set_regNo(validate_input($_POST['RegNo']));
    $studentClass->set_class_name(validate_input($_POST['class']));
    $mystudent->set_mname(validate_input($_POST['mname']));
    $mystudent->update_student($mystudent->get_fname(), $mystudent->get_mname(),  $mystudent->get_lname(),  $mystudent->get_gender(),  $mystudent->get_regNo(), $studentClass->get_class_name(), $_SESSION['stdId']);
    $_SESSION['updated'] = "done";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
$_SESSION['fail'] = "fail";
