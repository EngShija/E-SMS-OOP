<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

$attendance->setSchoolId($_SESSION[SCHOOL_ID]);

$class->set_class_name($_POST['class']);

$attendance->set_date($_POST['date']);

$student->setSchoolId($_SESSION[SCHOOL_ID]);

$class->setSchoolId($_SESSION[SCHOOL_ID]);

$myClass = $class->get_class_by_name($class->get_class_name());

$class->set_id($myClass['id']);


if(count($student->get_student_by_class($class->get_id())) > 0){
    if(count($attendance->get_attendance_by_date($attendance->get_date())) > 0){
    $_SESSION['student_class'] = $class->get_id();
    $_SESSION['date'] = $attendance->get_date();
    $_SESSION['class_name'] = $class->get_class_name();
    redirect_to('../dashboard.php?viewAttendance');
    }
    else{
        $_SESSION['noAttendance'] = 'No attendance';
        redirect_to('../dashboard.php');
    }
}
else{
    $_SESSION['classEmpty'] = 'No Students';
    redirect_to('../dashboard.php');
}

// echo count($student->get_student_by_class($class->get_class_name())) . "<br>";
// echo $class->get_class_name();
// echo $_POST['class'] . '<br>';
// echo $_POST['date'];