<?php
require_once "../models/Subject.php";
require_once "../models/Timetable.php";
require_once "../includes/functions.php";
$subject = new Subject(new Database());
$timetable = new Timetable(new Database());

if(isset($_GET['subid'])){
    $subject->delete_subject($_GET['subid']);
    $timetable->delete_timetable_by_subject_id($_GET['subid']);
    redirect_to('../dashboard.php?managesub');
}