<?php
session_start();
require_once __DIR__ . "/../models/Users.php";
require_once __DIR__ . "/../models/Student.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Class.php";

$database = new Database();
$user = new User($database);
$student = new Student($database);
$class = new StudentClass($database);

$user->set_fname(validate_input($_POST['fname']));
$user->set_lname(validate_input($_POST['lname']));
$student->set_regNo(validate_input($_POST['RegNo']));
$class->set_class_name(validate_input($_POST['class']));
$user->set_mname(validate_input($_POST['mname']));
$user->set_gender(validate_input($_POST['gender']));

if (!empty($user->get_fname()) && !empty($user->get_mname()) && !empty($user->get_lname()) && !empty($user->get_gender()) && !empty($student->get_regNo()) && !empty(date('y-m-d')) && !empty($class->get_class_name())) {
    if (!$student->is_student_present($student->get_regNo())) {
        $student->add_student(uniqid("ID", true),  $user->get_fname(), $user->get_mname(),  $user->get_lname(), $user->get_gender(),  $student->get_regNo(), date('y-m-d'), $class->get_class_name());
        redirect_to('../dashboard.php?addstd');
    } else {
        echo "Registration Number Already Exist";
    }
} else {
    echo "All Fields Are Required!";
}
