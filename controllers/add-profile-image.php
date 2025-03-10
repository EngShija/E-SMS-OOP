<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

if (is_request_method_post()) {
    $user_id = $_SESSION[CURRENT_USER];
    $image = $_FILES['profileImage'];

    $validation_result = validateImage($image);
    if ($validation_result === true) {
        $uploaded_image_path = uploadImage($image);
        if (strpos($uploaded_image_path, 'Sorry') === false) {
            $user->upload_profile_image($user_id, $image['name']);
            display_alert('success', 'Success!', 'Profile image uploaded successfully.');
        } else {
            display_alert('danger', 'Error!', $uploaded_image_path);
        }
    } else {
        display_alert('danger', 'Error!', $validation_result);
    }
}


