<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if(isset($_GET['subid'])){
    $subject->delete_subject($_GET['subid']);
    $timetable->delete_timetable_by_subject_id($_GET['subid']);
    $_SESSION['success'] = 'Subject deleted!';
    redirect_to('../dashboard.php?managesub');
}