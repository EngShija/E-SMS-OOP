<?php
function redirect_to($url){
    header("Location: ". $url);
}

function is_request_method_post(){
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function kick_user_to($url, $user_id){
    if(!isset($_SESSION[$user_id]) && $_SESSION[$user_id] == null){
        header("Location: {$url}");
    }
}
function validate_input($data){
    trim($data);
    stripcslashes($data);
    stripslashes($data);
    htmlspecialchars($data);
    return $data;
}
