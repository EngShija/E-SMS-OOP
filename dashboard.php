<script>
  function confirmDelete(deleteItem, url) {
    let corfirm = confirm('Are you sure you want to delete ' + deleteItem);
    if (corfirm) {
      window.location = url;
    } else {
      return false;
    }
  }


  function warningAlert(param, url) {
    let corfirm = confirm(param);
    if (corfirm) {
      window.location = url;
    } else {
      return false;
    }
  }

  let logoutTimer;
  // let warningTimer;

  function resetTimer() {
    clearTimeout(logoutTimer); // Clear previous timeout
    logoutTimer = setTimeout(logoutUser, 180000); // Set new 3-minute timeout
  }

  function logoutUser() {
    window.location.href = "controllers/logout.php"; // Redirect to logout page
  }

  // Detect user interactions (mouse, keyboard, touch)
  document.addEventListener("mousemove", resetTimer);
  document.addEventListener("keypress", resetTimer);
  document.addEventListener("click", resetTimer);
  document.addEventListener("scroll", resetTimer);

  resetTimer();
</script>


<?php
session_start();
// error_reporting(0);
require_once "includes/header.php";
require_once __DIR__ . "/config/autoloader.php";
require_once __DIR__ . "/config/incidences.php";
require_once "includes/functions.php";
kick_user_to('login.php', 'user_id');
// require_once "includes/tabs-control.php";
$parent = new studentParent(new Database());
$users = $user->get_user_by_id($_SESSION['user_id']);
$email = $users['email_address'];
$role = $user->user_role($email);
$school->setSchoolId($_SESSION[SCHOOL_ID]);

?>
<div class="container-fluid text-light">
  <div class="row">
    <?php require_once "includes/sidebar.php" ?>
    <main class="container">
      <?php require_once "includes/profile-header.php" ?>
      <?php

      require_once __DIR__ . "/./includes/routes.php";

include_once __DIR__. "/includes/alerts.php";
