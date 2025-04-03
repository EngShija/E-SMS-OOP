<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

$users = $user->get_user_by_id($_SESSION['user_id']) ?: $parent->get_parent_by_id($_SESSION['user_id']);

?>

<nav class="navbar bg-dark text-light content mb-6">
    <div class="container-fluid">
        <div class="navbar-header row">
        <a class="navbar-brand" href="dashboard.php?myProfile"><img src="uploads/<?= $users['profile_image'] ?>" height="50" width="50" class="rounded-circle"></a>
        </div>
        <h3><?= strtoupper($users['first_name']). " " . strtoupper($users['last_name']). "(". $users['role']. ")" ?></h3>
        <div class="nav-item"> 
            <a href="#" title="Logout" onclick="warningAlert('Are you sure you want to exit?', 'controllers/logout.php')">  <i><img src="assets/images/log-out.svg" alt="" height="30" width="50" style="filter: invert(1);"></i></a>
        </div>
    </div>
</nav>

