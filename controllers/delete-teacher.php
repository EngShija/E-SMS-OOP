<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];
    $userRole = 'deleted'; 
    $user->update_user_role($teacher_id, $userRole);
    $_SESSION['updated'] = "update";
    redirect_to("../dashboard.php?managetch=1");
}
redirect_to("../dashboard.php?managetch=0");
$_SESSION['fail'] = "fail";
