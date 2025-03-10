<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

if (isset($_SESSION['stdId'])) {
    $parent->set_fname(validate_input($_POST['fname']));
    $parent->set_lname(validate_input($_POST['lname']));
    $parent->set_gender(validate_input($_POST['gender']));
    $parent->set_address(validate_input($_POST['address']));
    $parent->set_email(validate_input($_POST['email']));
    $parent->set_phone(validate_input($_POST['phone']));
    $parent->set_relation(validate_input($_POST['relation']));
    $parent->set_password(strtoupper($parent->get_lname()));
    $parent->set_unique_id(uniqid("ID", true));
    $profile = null;
    $role = PARENT;
    $subjectTought = null;

if($parent->is_user_present($parent->get_email())){
    $myParent = $parent->get_user_by_email($parent->get_email());
    $parent_id = $myParent['unique_id'];
    $user->updade_user($parent->get_fname(), $parent->get_lname(), $parent->get_email(), $parent->get_gender(), $parent_id);
    $parent->update_parent($parent->get_phone(),  $parent->get_gender(),  $parent->get_address(), $parent->get_relation(), $_SESSION['stdId']);
    $student->update_parent_id($myParent['unique_id'], $_SESSION['stdId']);
    $_SESSION['updated'] = "update";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
else{
    $parent->delete_parent_parmanently($_SESSION['stdId']);
    $parent->add_user($parent->get_unique_id(),$parent->get_fname(), $parent->get_lname(), $parent->get_email(), $parent->get_gender(), $parent->get_password(), $profile, $role, $subjectTought );
    $myUser = $user->get_user_by_email($parent->get_email());
    $student->update_parent_id($parent->get_unique_id(), $_SESSION['stdId']);
    $parent->add_parent($parent->get_unique_id(), $_SESSION['stdId'], $parent->get_phone(), $parent->get_gender(),  $parent->get_address(), $parent->get_relation());
    $_SESSION['parentChanged'] = $parent->get_email();
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}

}
redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
$_SESSION['fail'] = "fail";
