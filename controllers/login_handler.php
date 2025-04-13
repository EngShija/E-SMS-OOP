<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";
require_once __DIR__."/../vendor/autoload.php";

$user->set_email(validate_input($_POST['email']));

$myUser = $user->get_user_by_email($user->get_email());

use Jenssegers\Agent\Agent;

$agent = new Agent();

$browser = $agent->browser();
$browserVersion = $agent->version($browser);
$platform = $agent->platform();
$platformVersion = $agent->version($platform);
$deviceType = $agent->isMobile() ? 'Mobile' : ($agent->isTablet() ? 'Tablet' : 'Desktop');
$userIP = $_SERVER['REMOTE_ADDR'];


$user->set_userIP($userIP);
$user->set_user_browser($browser. ' '. $browserVersion);
$user->set_platform($platform. ' '. $platformVersion);
$user->set_device_type($deviceType);
$user->set_login_time(date('Y-m-d H:i:s'));

if (is_request_method_post()) {
    $user->set_email($_POST['email']);
    $user->set_password($_POST['password']);

    if (!empty($user->get_email()) && !empty($user->get_password())) {
        if ($user->is_user_present($user->get_email())) {
            $myUser = $user->get_user_by_email($user->get_email());
            $user->set_unique_id($myUser['unique_id']);
            // $password = password_verify($_POST['password'], $myUser['password']);
            if ($myUser) {
                if(password_verify($_POST['password'], $myUser['password']) === TRUE){
                    if($myUser['role'] != 'deleted'){
                $_SESSION['user_id'] = $myUser['unique_id'];
                $_SESSION['school_id'] = $myUser['school_id'];
                $_SESSION['tab_token'] = bin2hex(random_bytes(32));
                $user->set_login_status('Success');
                    $user->add_login_history();
                    $user->update_pass_change_attempt(0, $_SESSION[CURRENT_USER]);
                echo "success";
                    }
                    else{
                        echo "Your account is currently deleted, please vist your school admin for more details!";
                    }
            } 
            else {
                $myUser = $user->get_user_by_email($user->get_email());
                $user->set_login_status('Failed - Invalid Password');
                $user->set_unique_id($myUser['unique_id']);
                $user->update_pass_change_attempt($myUser['change_password_attemts'] + 1, $myUser['unique_id']); 
                $user->add_login_history();
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
