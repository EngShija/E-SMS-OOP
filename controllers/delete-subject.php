<?php
require_once "../models/Subject.php";
require_once "../includes/functions.php";
$subject = new Subject(new Database());

if(isset($_GET['subid'])){
    $subject->delete_subject($_GET['subid']);
    redirect_to('../dashboard.php?managesub');
}