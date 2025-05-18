<?php
session_start();
require_once __DIR__ . "/../includes/functions.php";
if(isset($_POST['class'])){
    $_SESSION['classId'] = $_POST['class']; 
    redirect_to('../dashboard.php?classTimetable');
}
