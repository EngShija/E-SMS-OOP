<?php 
date_default_timezone_set('Africa/Nairobi'); 

require_once __DIR__ . "/../config/autoloader.php";
require_once __DIR__ . "/../config/incidences.php";
require_once __DIR__ . "/../config/constants.php";

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e-sms</title>
  <link rel="icon" href="assets/images/logo.jpg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/datatables/dataTables.bootstrap.css">
  <script src="assets/js/sweetAlerts.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/student-search.js"></script>
  <script src="assets/datatables/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="assets/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assets/datatables/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/dataTables/jquery.dataTables_themeroller.css">

  <style>
.body{
    background-image: url('./assets/images/bg.jpeg');
    background-repeat: repeat;
    background-size: cover;
}
.all{
    background-color: rgba(0, 0, 0, 0.8);
    height: 100%;
}
  </style>
</head>
<div class="all">
<body class="body" style="filter: <?= $_SESSION['theme'] ??'no'?>">
<!-- <form action="controllers/theme-toggle.php" method="POST">
  <input type="submit" name="light" value="Light Theme">
  <input type="submit" name="dark" value="Dark Theme">
</form> -->

<!-- <button onclick="lightTheme()">Light Theme</button>
<button onclick="darkTheme()">Dark Theme</button> -->

  <div class="header-main">
    <nav class="navbar navbar navbar-expand-md navbar-dark bg-dark border border-light text-light">
      <div class="container-fluid">
        <div class="navbar-header row">
          <a class="navbar-brand" href="dashboard.php"><img src="assets/images/logo.jpg" height="60" width="60"
              class="rounded-circle"></a>
        </div>
        <?php if (isset($_SESSION['user_id'])): ?>
          <?php $school->setSchoolId( $_SESSION[SCHOOL_ID]); 
          $schoolDetails = $school->getSchoolDetails(); ?>
          <h1 class="text-center"><?= strtoupper($schoolDetails[SCHOOL_NAME] ?? "SCHOOL MANAGEMENT SYSTEM STAFF") ?></h1>
          <div class="nav-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            <a class="nav-link" title="Menu"><img src="assets/images/menu.svg" style="filter: invert(1);"></img></a>
          </div>
        <?php else: ?>
          <h1 class="text-center">SCHOOL MANAGEMENT SYSTEM-SMS</h1>
        <?php endif ?>
      </div>
    </nav>
  </div>