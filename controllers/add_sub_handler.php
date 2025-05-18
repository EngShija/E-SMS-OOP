<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__ . "/../includes/functions.php";

$subject->set_subjectName(validate_input($_POST['subname']));
$subject->set_subjectCategory(validate_input($_POST['category']));

if($subject->is_subject_present($subject->get_subjectName())){
    $_SESSION['warning'] = 'Subject is already exists!';
    redirect_to("../dashboard.php");

}
else{
if ($subject->add_subject($subject->get_subjectName(), $subject->get_subjectCategory())) {
    $_SESSION['success'] = 'Subject added successfully';
    redirect_to("../dashboard.php?managesub");
}
else{
    $_SESSION['error'] = "Something went wrong, Try again!";
    redirect_to("../dashboard.php");

}
}