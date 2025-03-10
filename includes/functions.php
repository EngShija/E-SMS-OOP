<?php
require_once __DIR__ . "/../config/autoloader.php";
require_once __DIR__ . "/../config/incidences.php";
require_once __DIR__ . "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";
function redirect_to($url)
{
    header("location: " . $url);
    exit;
}

function is_request_method_post()
{
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function kick_user_to($url, $user_id,)
{
    if (!isset($_SESSION[$user_id]) && $_SESSION[$user_id] == null) {
        redirect_to($url);
        exit;
    }
}
function validate_input($data)
{
    trim($data);
    stripcslashes($data);
    stripslashes($data);
    htmlspecialchars($data);
    return $data;
}
function check_session($session_id)
{
    return isset($_SESSION[$session_id]);
}
function cancel_session($session_id)
{
    unset($_SESSION[$session_id]);
}
function display_alert($type, $heading, $message)
{
?>
    <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
        <strong><?= $heading ?></strong><?= $message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
function sweetAlert($alert_head, $message, $class)
{
?>
    <script>
        swal('<?= $alert_head ?>', '<?= $message ?>', '<?= $class ?>');
    </script>
<?php

}
function corfirm_password($password1, $password2)
{
    return $password1 === $password2;
}

function validateImage($image)
{
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        return "File is not an image.";
    }

    if (file_exists("../uploads/" . basename($image["name"]))) {
        return "Sorry, file already exists.";
    }

    if ($image["size"] > 500000) {
        return "Sorry, your file is too large.";
    }

    $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    return true;
}

function uploadImage($image)
{
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image["name"]);

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return "Sorry, there was an error uploading your file.";
    }

}
