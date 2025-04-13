<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

$user_id = $_GET['id'];
$role = 'admin';

    if ($user->update_user_role($user_id, $role)) {
                // Set a success message in the session (optional)
                $_SESSION['message'] = "User role updated successfully.";
                
        // redirect_to('../dashboard.php?addad=success');
        echo "Admin role assigned successfully.";
    } else {
        $_SESSION["message"] = "Failed to update user role.";
        // redirect_to('../dashboard.php?addad=error');
        echo "Failed to assign admin role.";
    }
