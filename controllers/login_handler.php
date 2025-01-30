<?php
session_start();
require_once __DIR__ . "/../models/Users.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Parent.php";

$user = new User(new Database());
$parent = new studentParent(new Database());

if (is_request_method_post()) {
    $user->set_email($_POST['email']);
    $user->set_password($_POST['password']);

    if (!empty($user->get_email()) && !empty($user->get_password())) {
        if ($user->is_user_present($user->get_email()) || $parent->is_parent_present($user->get_email())) {
            if ($user->login_user($user->get_email(), $user->get_password())) {
                $users =
                    $user->login_user(
                        $user->get_email(),
                        $user->get_password()
                    );
                $_SESSION['user_id'] = $users['unique_id'];
                $_SESSION['tab_token'] = bin2hex(random_bytes(32));
                echo "success";
            } elseif ($parent->login_parent($user->get_email(), $user->get_password())) {
                $myParent = $parent->login_parent(
                    $user->get_email(),
                    $user->get_password()
                );
                $_SESSION['user_id'] = $myParent['student_id'];
                $_SESSION['tab_token'] = bin2hex(random_bytes(32));
                echo "success";
            } else {
                echo "Email or Password not correct!";
            }
        } else {
            echo "{$user->get_email()} - not exist!";
        }
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Method not POST";
}

