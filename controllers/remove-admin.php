<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

    $user_id = $_GET['id'];
    $role = 'teacher'; // Change the role to a non-admin role

    if ($user->update_user_role($user_id, $role)) {
        header("Location: ../dashboard.php?addad=success");
    } else {
        header("Location: ../dashboard.php?addad=error");
    }
    exit();
?>
