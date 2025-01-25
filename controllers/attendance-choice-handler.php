<?php
session_start();
require_once __DIR__. "/../models/Student.php";
require_once __DIR__. "/../models/Class.php";
require_once __DIR__. "/../includes/functions.php";


$class = new StudentClass(new Database());

$student = new Student(new Database());

$class->set_class_name($_POST['class']);

if(count($student->get_student_by_class($class->get_class_name())) > 0){
    $_SESSION['student_class'] = $class->get_class_name();
    redirect_to('../dashboard.php?addAttendance');
}
else{
    $_SESSION['classEmpty'] = 'No Students';
    redirect_to('../dashboard.php');
}

// echo count($student->get_student_by_class($class->get_class_name())) . "<br>";
// echo $class->get_class_name();