<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__ . "/../includes/functions.php";

$exam->set_examName(validate_input($_POST['exam']));
if($exam->is_exam_present($exam->get_examName())){
    redirect_to("../dashboard.php?examPresent");

}
else{
    $exam->add_exam($exam->get_examName());
    redirect_to("../dashboard.php?examAdded");
}
