<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];
    $userRole = 'deleted'; 
    $user->update_user_role($teacher_id, $userRole);
    $_SESSION['success'] = "Teacher deleted!";
    redirect_to("../dashboard.php?managetch");
}
redirect_to("../dashboard.php?managetch=0");
$_SESSION['error'] = "Something went wrong, try again!";
