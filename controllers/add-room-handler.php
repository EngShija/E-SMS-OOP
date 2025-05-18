<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";

$room->set_room_name(validate_input($_POST['roomName']));
$room->set_room_capacity(validate_input($_POST['capacity']));
$room->setSchoolId($_SESSION[SCHOOL_ID]);

if($room->is_room_present()){
    $_SESSION['warning'] = 'Room Already Exists';
    redirect_to("../dashboard.php");

}
else{
if($room->add_room()){
    $_SESSION['success'] = 'New Room added successfully!';
    redirect_to("../dashboard.php?manageRooms");
}
else{
    $_SESSION['error'] = 'Something went wrong try again!';
    redirect_to("../dashboard.php");
}
}