<?php
session_start();
require_once __DIR__."/../includes/functions.php";
if(isset($_POST['light'])){
  $_SESSION['theme'] = 'invert(1)';
  redirect_to('../dashboard.php');
}
else if(isset($_POST['dark'])){
  $_SESSION['theme'] = '';
  redirect_to('../dashboard.php');
}