<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__ . "/../includes/functions.php";

$class->set_class_name($_POST['className']);

if($class->is_class_present($class->get_class_name())){
    redirect_to("../dashboard.php?classPresent");

}
else{
if($class->add_class($class->get_class_name())){
    redirect_to("../dashboard.php?classAdded");
}
else{
    redirect_to("../dashboard.php?error");

}
}