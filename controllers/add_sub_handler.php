<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__ . "/../includes/functions.php";

$subject->set_subjectName(validate_input($_POST['subname']));
$subject->set_subjectCategory(validate_input($_POST['category']));

if($subject->is_subject_present($subject->get_subjectName())){
    redirect_to("../dashboard.php?subjectPresent");

}
else{
if ($subject->add_subject($subject->get_subjectName(), $subject->get_subjectCategory())) {
    redirect_to("../dashboard.php?managesub");
}
else{
    redirect_to("../dashboard.php?subNotAdded");

}
}