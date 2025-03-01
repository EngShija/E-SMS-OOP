<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

if (is_request_method_post()) {
$oldpassword = validate_input($_POST['oldpass']);
$newpass = validate_input($_POST['newpass']);
$confass = validate_input($_POST['confpass']);

$myUser = $user->get_user_by_id($_SESSION[CURRENT_USER]);
$counter = $myUser['change_password_attemts'] + 1;

if(!empty($oldpassword) && !empty($newpass) && !empty($confass)){
if(password_verify($oldpassword, $myUser['password'])){
    if(corfirm_password($newpass, $confass)){
        $user->set_password($newpass);
        $password = $user->get_password();
        $email = $myUser['email_address'];
        if($user->updade_password($password, $email)){
            $_SESSION['passChanged'] = 'Password Changed';
            $user->update_pass_change_attempt(0, $_SESSION[CURRENT_USER]);
            redirect_to('../dashboard.php');
        }
        else{
            $_SESSION['passNotC'] = 'error';
            redirect_to('../dashboard.php');
        }
    }
    else{
        $_SESSION['passNoMatch'] = 'no match';
        redirect_to('../dashboard.php');
    }
}
else{
    $user->update_pass_change_attempt($counter, $_SESSION[CURRENT_USER]);
    $_SESSION['wrongCurrent'] = 3- $counter;
    if($counter == 3){
        $user->update_pass_change_attempt(0, $_SESSION[CURRENT_USER]);
        redirect_to('logout.php');
    }
    redirect_to('../dashboard.php');
}
}
}else{
    $_SESSION['emptyField'] = 'required';
    redirect_to('../dashboard.php');
}