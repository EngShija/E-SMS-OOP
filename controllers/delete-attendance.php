<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

$attendance->set_date(date('Y-m-d'));

$student->set_student_id($_GET['stdId']);

if(!$attendance->delete_attendance($attendance->get_date(), $student->get_student_id())){
    $_SESSION['deletefail'] = 'Something went Wrong';
    redirect_to('../dashboard.php?addAttendance');
}
else{
    redirect_to('../dashboard.php?addAttendance');
}