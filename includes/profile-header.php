
<div class="header-main">

<nav class="navbar bg-dark text-light content">
    <div class="container-fluid">
        <div class="navbar-header row">
            <a class="navbar-brand" href="#"><img src="assets/images/logo.jpg" height="50" width="50"
                    style="border-radius: 50%"></a>
        </div>
        <h3><?= strtoupper($users['first_name']). " " . strtoupper($users['last_name']). "(". $users['role']. ")" ?></h3>
        <div class="nav-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample"> 
            <a href="controllers/logout.php">  <i><img src="assets/images/log-out.svg" alt="" height="12" width="24"></i> Logout</a>
        </div>
    </div>
</nav>

</div>