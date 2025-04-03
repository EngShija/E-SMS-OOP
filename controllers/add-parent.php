<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";

$parent->set_fname(validate_input($_POST['fname']));
$parent->set_lname(validate_input($_POST['lname']));
$parent->set_email(validate_input($_POST['email']));
$parent->set_phone(validate_input($_POST['phone']));
$parent->set_gender(validate_input($_POST['gender']));
$parent->set_address(validate_input($_POST['address']));
$parent->set_relation(validate_input($_POST['relation']));
$parent->set_profile(validate_input("default_profile.svg"));
$parent->set_password(strtoupper($parent->get_lname()));
$student->set_student_id($_SESSION['stdId']);
$parent->set_unique_id(uniqid("ID", true));

$user_id = $parent->get_unique_id();
$fname = $parent->get_fname();
$lname = $parent->get_lname();
$gender = $parent->get_gender();
$password = $parent->get_password();
$profile = null;
$role = PARENT;
$subjectTought = null;
$student_id = $student->get_student_id();
$phone = $parent->get_phone();
$address = $parent->get_address();
$relation = $parent->get_relation();
$email = $parent->get_email();

if (!$parent->is_parent_exist($student->get_student_id())) {
    $_SESSION['exist'] = "exist";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
} else {
    if($parent->is_user_present($email)){
        $_SESSION['parentPresent'] = $email;
        $myParent = $parent->get_user_by_email($email);
        $student->set_parent_id($myParent['unique_id']);
        $parent_id = $student->get_parent_id();
        $student->update_parent_id($parent_id, $student_id);
        $parent->add_parent($myParent['unique_id'], $student_id, $phone, $gender, $address, $relation);
        redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    }
else{
    $parent->add_user($user_id, $fname, $lname, $email, $gender, $password, $profile, $role, $subjectTought );
    $myUser = $user->get_user_by_email($email);
    $student->update_parent_id($myUser['unique_id'], $student_id);
    $parent->add_parent($myUser['unique_id'], $student_id, $phone, $gender, $address, $relation);
    $_SESSION['parent-rg'] = "registered";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
}
