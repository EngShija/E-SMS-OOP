<?php
session_start();
require_once __DIR__ . "/../config/autoloader.php";
require_once __DIR__ . "/../config/incidences.php";
require_once __DIR__ . "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";

if (is_request_method_post()) {
    $user_id = $_SESSION[CURRENT_USER];
    $image = $_FILES['profileImage'];

    $validation_result = validateImage($image);
    if ($validation_result === true) {
        $uploaded_image_path = uploadImage($image);
        if (strpos($uploaded_image_path, 'Sorry') === false) {
            $user->upload_profile_image($user_id, $image['name']);
            $_SESSION['uploaded'] = 'Uploaded';
            redirect_to('../dashboard.php?profileImage');
        } else {
            $_SESSION['exist'] = $uploaded_image_path;
            redirect_to('../dashboard.php?profileImage');
        }
    } else {
        $_SESSION['validationError'] = $validation_result;
        redirect_to('../dashboard.php?profileImage');
    }
}
