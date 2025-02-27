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
  <script src="assets/js/sweetAlerts.js"></script>
  <style>
.body{
    background-image: url('./assets/images/bg.jpeg');
}
  </style>
</head>

<body class="body">

  <div class="header-main">
    <nav class="navbar navbar navbar-expand-md navbar-dark bg-dark text-light">
      <div class="container-fluid">
        <div class="navbar-header row">
          <a class="navbar-brand" href="dashboard.php"><img src="assets/images/logo.jpg" height="60" width="60"
              class="rounded-circle border border-success"></a>
        </div>
        <h1 class="text-center">SCHOOL MANAGEMENT SYSTEM-SMS</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
          <div class="nav-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            <a class="nav-link" title="Menu"><img src="assets/images/menu.svg"></img></a>
          </div>
        <?php endif ?>
      </div>
    </nav>
  </div>