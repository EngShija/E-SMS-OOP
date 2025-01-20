<?php
require_once "../models/Subject.php";
require_once __DIR__ . "/../includes/functions.php";
$mySubject = new Subject(new Database());

$mySubject->set_subjectName(validate_input($_POST['subname']));
$mySubject->set_subjectCategory(validate_input($_POST['category']));

if($mySubject->is_subject_present($mySubject->get_subjectName())){
    redirect_to("../dashboard.php?subjectPresent");

}
else{
if ($mySubject->add_subject($mySubject->get_subjectName(), $mySubject->get_subjectCategory())) {
    redirect_to("../dashboard.php?managesub");
}
else{
    redirect_to("../dashboard.php?subNotAdded");

}
}