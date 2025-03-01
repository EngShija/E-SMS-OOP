<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

    $user->set_fname(validate_input($_POST['fname']));
    $user->set_lname(validate_input($_POST['lname']));
    $user->set_email(validate_input($_POST['email']));
    $user->set_gender(validate_input($_POST['gender']));
    $user->set_password(validate_input($_POST['password']));
    $user->set_profile(validate_input("PROFILE_IMAGE"));

    $fname = $user->get_fname();
    $lname = $user->get_lname();
    $email = $user->get_email();
    $gender = $user->get_gender();
    $password = $user->get_password();
    $profile = $user->get_profile();
    $subject_tought = validate_input($_POST['subject']);
    $unique_id = uniqid("ID", true);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($gender) && !empty($password)){
        if(!$user->is_user_present($email)){
            $user->add_user($unique_id, $fname, $lname, $email, $gender, $password, $profile, 'teacher', $subject_tought);
            redirect_to('../dashboard.php?addtch');
        }else{
            echo "{$email} Already Exist";
        }

    } else{
        echo "All Fields Are Required!";
    }