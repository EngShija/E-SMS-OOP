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

$fname = $user->get_fname();
$lname = $user->get_lname();
$RegDate = validate_input($_POST['RegDate']);
$gender = validate_input($_POST['gender']);
$regNo = $student->get_regNo();
$unique_id = uniqid("ID", true);
$class_name = $class->get_class_name();
if (!empty($fname) && !empty($lname) && !empty($gender) && !empty($regNo) && !empty($RegDate) && !empty($class_name)) {
    if (!$student->is_student_present($regNo)) {
        $student->add_student($unique_id, $fname, $lname, $gender, $regNo, $RegDate, $class_name);
        redirect_to('../dashboard.php?addstd');
    } else {
        echo "Registration Number Already Exist";
    }
} else {
    echo "All Fields Are Required!";
    echo $fname . " " . $lname . " " . $RegDate . " " . " " . $gender . " " . $regNo . " " . $unique_id . " " . $class_name;
}
