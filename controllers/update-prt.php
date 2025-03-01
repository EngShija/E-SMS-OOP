<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if (isset($_SESSION['stdId'])) {
    $parent->set_fname(validate_input($_POST['fname']));
    $parent->set_lname(validate_input($_POST['lname']));
    $parent->set_gender(validate_input($_POST['gender']));
    $parent->set_address(validate_input($_POST['address']));
    $parent->set_email(validate_input($_POST['email']));
    $parent->set_phone(validate_input($_POST['phone']));
    $parent->set_relation(validate_input($_POST['relation']));

    $parent->update_parent($parent->get_fname(),  $parent->get_lname(), $parent->get_email(), $parent->get_phone(),  $parent->get_gender(),  $parent->get_address(), $parent->get_relation(), $_SESSION['stdId']);
    $_SESSION['updated'] = "update";
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
$_SESSION['fail'] = "fail";
