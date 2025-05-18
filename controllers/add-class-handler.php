<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";

$class->set_class_name(validate_input($_POST['className']));
$class->setSchoolId($_SESSION[SCHOOL_ID]);

if($class->is_class_present()){
    $_SESSION['warning'] = 'The class is already exists!';
    redirect_to("../dashboard.php");

}
else{
if($class->add_class()){
    $_SESSION['success'] = 'New class added successfully!';
    redirect_to("../dashboard.php");
}
else{
    $_SESSION['error'] = 'Something went wrong!';
    redirect_to("../dashboard.php");

}
}