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
$school->setSchoolId($_SESSION[SCHOOL_ID]);

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
    $parentUser = $parent->get_user_by_email($email);
    if($parent->is_user_present($email)){
        $parent->add_parent($parentUser['unique_id'], $student_id, $phone, $gender, $address, $relation, $school->getSchoolId());
        $parent->add_user($parentUser['unique_id'], $fname, $lname, $email, $gender, $password, $profile, 'parent', NULL , $_SESSION[SCHOOL_ID]);
        $student->update_parent_id($parentUser['unique_id'], $student_id);
        $_SESSION['parentPresent'] = $parentUser['first_name'] . " " . $parentUser['last_name'] ;
        redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    }
else{
    $parent->add_user($user_id, $fname, $lname, $email, $gender, $password, $profile, $role, $subjectTought, $_SESSION[SCHOOL_ID] );
    $myUser = $user->get_user_by_email($email);
    $student->update_parent_id($myUser['unique_id'], $student_id);
    $parent->add_parent($myUser['unique_id'], $student_id, $phone, $gender, $address, $relation,  $school->getSchoolId());
    $_SESSION['parent-rg'] = "registered";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
}
