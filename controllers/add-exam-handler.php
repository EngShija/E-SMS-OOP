<?php
require_once "../models/Results.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Exam.php";
$exam = new Exam(new Database());

$exam->set_examName(validate_input($_POST['exam']));
if($exam->is_exam_present($exam->get_examName())){
    redirect_to("../dashboard.php?examPresent");

}
else{
    $exam->add_exam($exam->get_examName());
    redirect_to("../dashboard.php?examAdded");
}
