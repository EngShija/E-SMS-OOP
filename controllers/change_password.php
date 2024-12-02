<?php
require_once __DIR__. "/../models/Users.php";
require_once __DIR__."/../includes/functions.php";

$database = new Database();
$user = new User($database);

if(is_request_method_post()){
    $user->set_email($_POST['email']);
    $user->set_password($_POST['password']);
        if(!empty($user->get_email()) && !empty($user->get_password())){
                if($user->is_user_present($user->get_email())){
                $user->updade_password($user->get_password(), $user->get_email());
                echo "success";
                
                }
                else{
                    echo "{$user->get_email()} - Not exist!";
                }
            }else{
                echo "All Fields Are Required!";
        }
        }