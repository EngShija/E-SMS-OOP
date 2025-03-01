<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

session_start();
session_destroy();
session_unset();
// redirect_to("../login.php");

?>
<script>
    // Clear sessionStorage on logout
    sessionStorage.clear();
    window.location.href = "../login.php"; // Redirect to login page
</script>