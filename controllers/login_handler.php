<?php
session_start();
require_once __DIR__. "/../models/Users.php";
require_once __DIR__."/../includes/functions.php";

$database = new Database();
$user = new User($database);

if(is_request_method_post()){
    $user->set_email($_POST['email']);
    $user->set_password($_POST['password']);

        if(!empty($user->get_email()) && !empty($user->get_password())){
            if($user->is_user_present($user->get_email())){
        if($user->login_user($user->get_email(), $user->get_password())){
            $users = $user->login_user($user->get_email(), $user->get_password());
            $_SESSION['user_id'] = $users['unique_id'];
            echo "success";
        }
        else{
             echo "Email or Password not correct!";
        }
    }
    else{
        echo "{$user->get_email()} - not exist!";
    }
    }else{
        echo "All fields are required!";
    }
}else{
    echo "Method not POST";
}


