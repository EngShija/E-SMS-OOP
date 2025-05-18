<?php
session_start();
require_once __DIR__ . "/../includes/functions.php";
if(isset($_POST['teacher'])){
    $_SESSION['teacherId'] = $_POST['teacher']; 
    redirect_to('../dashboard.php?teacherTimetable');
}