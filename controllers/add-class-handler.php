<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";

$class->set_class_name($_POST['className']);
$class->setSchoolId($_SESSION[SCHOOL_ID]);

if($class->is_class_present()){
    redirect_to("../dashboard.php?classPresent");

}
else{
if($class->add_class()){
    redirect_to("../dashboard.php?classAdded");
}
else{
    redirect_to("../dashboard.php?error");

}
}