<?php
session_start();
require_once "../models/Parent.php";
require_once "../includes/functions.php";
require_once "../models/Class.php";
$myParent = new studentParent(new Database());


if (isset($_SESSION['stdId'])) {
    $myParent->set_fname(validate_input($_POST['fname']));
    $myParent->set_lname(validate_input($_POST['lname']));
    $myParent->set_gender(validate_input($_POST['gender']));
    $myParent->set_address(validate_input($_POST['address']));
    $myParent->set_email(validate_input($_POST['email']));
    $myParent->set_phone(validate_input($_POST['phone']));
    $myParent->set_relation(validate_input($_POST['relation']));

    $myParent->update_parent($myParent->get_fname(),  $myParent->get_lname(), $myParent->get_email(), $myParent->get_phone(),  $myParent->get_gender(),  $myParent->get_address(), $myParent->get_relation(), $_SESSION['stdId']);
    $_SESSION['updated'] = "update";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
$_SESSION['fail'] = "fail";
