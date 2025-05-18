<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__ . "/../includes/functions.php";

$subject->set_subjectCategory($_POST['subcat']);

if($subject->is_subject_category_present($subject->get_subjectCategory())){
    $_SESSION['warning'] = 'Category already exists!';
    redirect_to("../dashboard.php");

}
else{
if($subject->add_subject_category($subject->get_subjectCategory())){
    $_SESSION['success'] = 'Subject category added successfully!';
    redirect_to("../dashboard.php");
}
else{
    $_SESSION['error'] = 'Something went wrong!';
    redirect_to("../dashboard.php?catNotAdded");

}
}