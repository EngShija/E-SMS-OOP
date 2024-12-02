<?php
session_start();
require_once "../models/Student.php";
require_once "../includes/functions.php";
$mystudent = new Student(new Database());

if(isset($_GET['id'])){
    $mystudent->set_fname($_POST['fname']);
    $mystudent->set_lname($_POST['lname']);
    $mystudent->set_gender($_POST['gender']);                           
    $mystudent->set_regNo($_POST['RegNo']);
    $mystudent->update_student( $mystudent->get_lname(),  $mystudent->get_lname(),  $mystudent->get_gender(),  $mystudent->get_regNo(),  $_GET['id']);
    redirect_to('../dashboard.php?updatestd');
}
echo $_SESSION['id'];