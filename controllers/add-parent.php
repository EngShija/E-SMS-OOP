<?php
session_start();
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Class.php";
require_once __DIR__ . "/../models/Parent.php";
require_once __DIR__ . "/../models/Student.php";

$parent = new studentParent(new Database());
$student = new Student(new Database());

$parent->set_fname(validate_input($_POST['fname']));
$parent->set_lname(validate_input($_POST['lname']));
$parent->set_email(validate_input($_POST['email']));
$parent->set_phone(validate_input($_POST['phone']));
$parent->set_gender(validate_input($_POST['gender']));
$parent->set_address(validate_input($_POST['address']));
$parent->set_relation(validate_input($_POST['relation']));
$parent->set_profile(validate_input("PROFILE_IMAGE"));
$parent->set_password(strtoupper($parent->get_lname()));
$student->set_student_id($_SESSION['stdId']);
$parent->set_unique_id(uniqid("ID", true));

if (!$parent->is_parent_exist($student->get_student_id())) {
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    $_SESSION['exist'] = "exist";
} else {
    $parent->add_parent($parent->get_unique_id(), $student->get_student_id(), $parent->get_fname(), $parent->get_lname(), $parent->get_email(), $parent->get_phone(), $parent->get_gender(), $parent->get_address(), $parent->get_relation(), $parent->get_password());
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    $_SESSION['paremt-rg'] = "registered";
}
