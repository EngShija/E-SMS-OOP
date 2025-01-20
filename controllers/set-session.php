<?php
require_once "../includes/functions.php";
session_start();
$_SESSION['subid'] = $_GET['subid'];
redirect_to("../dashboard.php?managesub");
