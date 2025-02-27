<?php
session_start();
require_once "../models/Student.php";
require_once "../models/Parent.php";
require_once "../models/Attendance.php";
require_once "../includes/functions.php";
$mystudent = new Student(new Database());
$parent = new studentParent(new Database());
$attendance = new Attendance(new Database());

if(isset($_GET['deleteid'])){
    $mystudent->delete_student($_GET['deleteid']);
    $parent->delete_parent($_GET['deleteid']);
    $attendance->delete_attendanceby_student_id($_GET['deleteid']);
    $_SESSION['deleted'] = 'student';
    redirect_to('../dashboard.php?managestd');
}