<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

if(isset($_GET['examid'])){
    $exam->delete_exam($_GET['examid']);
    redirect_to('../dashboard.php?manageexam');
}