<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

$myUser = $user->get_user_by_email($user->get_email());

if (is_request_method_post()) {
    $user->set_email($_POST['email']);
    $user->set_password($_POST['password']);

    if (!empty($user->get_email()) && !empty($user->get_password())) {
        if ($user->is_user_present($user->get_email())) {
            $myUser = $user->get_user_by_email($user->get_email());
            $password = password_verify($_POST['password'], $myUser['password']);
            if ($myUser) {
                if(password_verify($_POST['password'], $myUser['password']) === TRUE){
                    if($myUser['role'] != 'deleted'){
                $_SESSION['user_id'] = $myUser['unique_id'];
                $_SESSION['tab_token'] = bin2hex(random_bytes(32));
                    $database->add_login_history($myUser['unique_id'], 'success');
                    $user->update_pass_change_attempt(0, $_SESSION[CURRENT_USER]);
                echo "success";
                    }
                    else{
                        echo "Your account is currently deleted, please vist your school admin for more details!";
                    }
            } 
            else {
                $myUser = $user->get_user_by_email($user->get_email());
                $database->add_login_history($myUser['unique_id'], 'failed (incorrect password)');
                echo "Email or Password not correct!";
            }
        } else {
            echo "{$user->get_email()} - not exist!";
        }
    } else {
        echo "{$user->get_email()} - not exist!";
    }
} else {
    echo "All fields are required!";
}
}
