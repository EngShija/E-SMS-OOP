<?php
require_once "../includes/functions.php";
session_start();
session_destroy();
session_unset();
redirect_to("../login.php");