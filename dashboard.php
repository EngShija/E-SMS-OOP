<?php
session_start();
require_once "includes/functions.php";
require_once "models/Users.php";
require_once "models/Student.php";
require_once "models/Parent.php";
require_once "models/Subject.php";
require_once "models/Class.php";
require_once "includes/header.php";
kick_user_to('login.php', 'user_id');
$user = new User(new Database());
$parent = new studentParent(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']) ?: $parent->get_parent_by_id($_SESSION['user_id']);
$student = new Student(new Database());
$email = $users['email_address'];
$role = $user->user_role($email);
$subject = new Subject(new Database());
$class = new StudentClass(new Database());
?>
<div class="container-fluid">
    <div class="row">
        <?php require_once "includes/sidebar.php" ?>
        <main class="container">
        <?php require_once "includes/profile-header.php" ?>
            <?php
         if(isset($_GET['addstd'])){
          require_once "includes/add-student.php";
        }
          else if(isset($_GET['updatestd'])){
            require_once "includes/edit-student.php";
            $_SESSION['stdid'] = $_GET['updatestd'];
          }
          else if(isset($_GET['managestd'])){
            require_once "includes/student-list.php";
          }
          else if(isset($_GET['addprt'])){
            require_once "includes/add-parent.php";
          }
          else if(isset($_GET['addtch'])){
            if($role['role'] == 'admin'){
            require_once "includes/add-teacher.php";
            }
          }
          else if(isset($_GET['managetch'])){
            if($role['role'] == 'admin'){
            require_once "includes/teacher-list.php";
            }
          }
          else if(isset($_GET['addad'])){
            if($role['role'] == 'admin'){
            require_once "includes/add-admin.php";
            }
          }
          else if(isset($_GET['grade'])){
            if($role['role'] == 'admin'){
            require_once "includes/grades.php";
            }
          }
          else if(isset($_GET['managead'])){
            if($role['role'] == 'admin'){
            require_once "includes/manage-admin.php";
            }
          }
          else if(isset($_GET['addcls'])){
            if($role['role'] == 'admin'){
            require_once "includes/add-class.php";
          }
        }
          else if(isset($_GET['addsub'])){
            require_once "includes/add-sub.php";
          }
          else if(isset($_GET['managecls'])){
            require_once "includes/manage-class.php";
          }
          else if(isset($_GET['managesub'])){
            require_once "includes/manage-sub.php";
          }
          else if (isset($_SESSION['viewresult'])) {
            include_once __DIR__ . "/includes/result-opt.php";
            unset($_SESSION['viewresult']);
        }
        else if(isset($_GET['subid'])){
          include_once "includes/initial-editisubject.php";
        }
        else if(isset($_GET['deleteid'])){
          include_once "includes/initial-delete.php";
        }
        else{
          require_once "includes/user-count.php";
          // include_once __DIR__. "/includes/carousel.php";
          include_once __DIR__. "/includes/advertisements.php";
        }

require_once __DIR__. "/includes/footer.php";

