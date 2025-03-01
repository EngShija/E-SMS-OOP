<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if(isset($_GET['deleteid'])){
    $student->delete_student($_GET['deleteid']);
    $parent->delete_parent($_GET['deleteid']);
    $attendance->delete_attendanceby_student_id($_GET['deleteid']);
    $_SESSION['deleted'] = 'student';
    redirect_to('../dashboard.php?managestd');
}