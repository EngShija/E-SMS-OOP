<?php
session_start();
require_once __DIR__ . "/../includes/functions.php";
if(isset($_POST['room'])){
    $_SESSION['room_id'] = $_POST['room']; 
    redirect_to('../dashboard.php?roomTimetable');
}
