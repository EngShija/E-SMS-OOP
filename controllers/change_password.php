<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if (is_request_method_post()) {
    $user->set_email($_POST['email']);
    $user->set_fname($_POST['fname']);
    $user->set_lname($_POST['lname']);

    if (!empty($user->get_email()) && !empty($_POST['password']) && !empty($user->get_fname()) && !empty($user->get_fname()) && !empty($_POST['confpass'])) {

        $check_user = $user->is_user_present($user->get_email());

        if ($check_user || $check_parent) {
            if (corfirm_password($_POST['password'], $_POST['confpass'])) {
                $user->set_password($_POST['password']);
                $usernames = $user->get_user_by_email($user->get_email());
                if(strtolower($user->get_fname()) === strtolower($usernames['first_name']) && strtolower($user->get_lname()) === strtolower($usernames['last_name'])){
                if ($check_user ? $user->updade_password($user->get_password(), $user->get_email()) : $parent->updade_password($user->get_password(), $user->get_email())) {
                    $_SESSION['passChanged'] = 'Password Changed';
                    echo "success";
                }
                } else {
                    echo "You Entered wrong details!";
                }
            } else {
                echo "Passwords entered do not match!";
            }
        } else {
            echo "{$user->get_email()} - Not exist!";
        }
    } else {
        echo "All Fields Are Required!";
    }
}

// echo$user->get_password() . $_POST['confpass'];
