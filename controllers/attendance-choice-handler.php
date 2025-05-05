<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

$class->set_class_name($_POST['class']);

$attendance->set_date($_POST['date']);

$student->setSchoolId($_SESSION[SCHOOL_ID]);

if(count($student->get_student_by_class($class->get_class_name())) > 0){
    $_SESSION['student_class'] = $class->get_class_name();
    $_SESSION['date'] = $attendance->get_date();
    redirect_to('../dashboard.php?addAttendance');
}
else{
    $_SESSION['classEmpty'] = 'No Students';
    redirect_to('../dashboard.php');
}

// echo count($student->get_student_by_class($class->get_class_name())) . "<br>";
// echo $class->get_class_name();