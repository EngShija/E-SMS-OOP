<?php
function redirect_to($url){
    header("location: ". $url);
    exit;
}

function is_request_method_post(){
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function kick_user_to($url, $user_id){
    if(!isset($_SESSION[$user_id]) && $_SESSION[$user_id] == null){
        header("location: ". $url);
        exit;
    }
}
function validate_input($data){
    trim($data);
    stripcslashes($data);
    stripslashes($data);
    htmlspecialchars($data);
    return $data;
}
function check_session($session_id){
    return isset($_SESSION[$session_id]);
}
function cancel_session($session_id){
    unset($_SESSION[$session_id]);
}
function display_alert($type, $heading, $message){
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
function corfirm_password($password1, $password2){
    return $password1 === $password2;
}