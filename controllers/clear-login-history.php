<?php 
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

$database = new Database();

$database->clear_login_history($_SESSION['user_id']);

redirect_to('../dashboard.php');
