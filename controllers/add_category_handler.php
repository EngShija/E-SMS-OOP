<?php
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Subject.php";
$subject = new Subject(new Database());

$subject->set_subjectCategory($_POST['subcat']);

if($subject->is_subject_category_present($subject->get_subjectCategory())){
    redirect_to("../dashboard.php?categoryPresent");

}
else{
if($subject->add_subject_category($subject->get_subjectCategory())){
    redirect_to("../dashboard.php?catAdded");
}
else{
    redirect_to("../dashboard.php?catNotAdded");

}
}