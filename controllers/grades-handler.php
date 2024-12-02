<?php
require_once __DIR__. "/../models/Grade.php";
require_once __DIR__. "/../includes/functions.php";
$grades = new Grade(new Database());

    if(isset($_POST["submit"]) && !empty($_POST['submit'])){
        $grades->set_start($_POST['from']);
        $grades->set_end($_POST['to']);
        $grades->set_grade($_POST['grade']);
        $grades->set_desc($_POST['desc']);
        if(!empty($grades->get_start()) && !empty($grades->get_end()) && !empty($grades->get_grade()) && !empty($grades->get_desc())){
            $grades->add_grade($grades->get_start(), $grades->get_end(), $grades->get_grade(), $grades->get_desc());
            redirect_to('../dashboard.php?grade');
        }
        else{
            echo "All Fields Are Required!";
        }

    }
    else{
        echo "Form not submitted";
    }

