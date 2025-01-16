<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-sms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.js"></script> -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<div class="header-main">
    <nav class="navbar bg-dark text-light">
        <div class="container-fluid">
            <div class="navbar-header row">
                <a class="navbar-brand" href="dashboard.php"><img src="assets/images/logo.jpg" height="50" width="50"
                        style="border-radius: 50%"></a>
            </div>
            <h1>SCHOOL MANAGEMENT SYSTEM-SMS</h1>
            <?php if(isset($_SESSION['user_id'])) :?>
            <div class="nav-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                <a class="nav-link"><img src="assets/images/menu.svg"></img></a>
            </div>
            <?php endif ?>
        </div>
    </nav>
</div>