<?php
require_once "models/Parent.php";
require_once "models/Users.php";

$user = new User(new Database());
$parent = new studentParent(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']) ?: $parent->get_parent_by_id($_SESSION['user_id']);

?>

<nav class="navbar bg-dark text-light content">
    <div class="container-fluid">
        <div class="navbar-header row">
            <a class="navbar-brand" href="#"><img src="assets/images/logo.jpg" height="50" width="50" class="rounded-circle border border-success"></a>
        </div>
        <h3><?= strtoupper($users['first_name']). " " . strtoupper($users['last_name']). "(". $users['role']. ")" ?></h3>
        <div class="nav-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample"> 
            <a href="controllers/logout.php">  <i><img src="assets/images/log-out.svg" alt="" height="30" width="50"></i> Logout</a>
        </div>
    </div>
</nav>
