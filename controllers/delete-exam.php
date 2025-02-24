<?php
require_once "../models/Exam.php";
require_once "../includes/functions.php";
$exam = new Exam(new Database());

if(isset($_GET['examid'])){
    $exam->delete_exam($_GET['examid']);
    redirect_to('../dashboard.php?manageexam');
}