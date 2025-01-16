<?php
require_once "../models/Student.php";
require_once "../models/Parent.php";
require_once "../includes/functions.php";
$mystudent = new Student(new Database());
$parent = new studentParent(new Database());

if(isset($_GET['id'])){
    $mystudent->delete_student($_GET['id']);
    $parent->delete_parent($_GET['id']);
    redirect_to('../dashboard.php?managestd');
}