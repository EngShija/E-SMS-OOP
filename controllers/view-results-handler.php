<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

$myUser = $user->get_user_by_id($_SESSION[CURRENT_USER]) ?: $parent->get_parent_by_id($_SESSION[CURRENT_USER]);

$myParent = $parent->get_parent_by_id($_SESSION[CURRENT_USER]);

$email = $myUser['email_address'];

$role = $user->user_role($email) ?: $parent->user_role($email);

$myStudent = $student->get_student_by_id($_SESSION['stdId']) ?: $student->get_student_by_id($myParent['student_id']);

$student->set_student_id($myUser['student_id'] ?: $_SESSION['stdId']);
$exam->set_examName(validate_input($_POST['exam']));
$exam->set_yos(validate_input($_POST['yos']));
$student->set_fname($myStudent['first_name']);
$student->set_lname($myStudent['last_name']);
if ($result->is_result_exist($student->get_student_id(), $exam->get_examName() . " " . $exam->get_yos())) {
    if($myUser['role'] == 'admin' || $myUser['role'] == 'teacher'){
        $_SESSION['viewresult'] =  strtoupper($student->get_fname()) . ' ' . strtoupper($student->get_lname()) ."-RST". $myStudent['id'] . '(' .  $exam->get_examName() .  $exam->get_yos(). ')';
$_SESSION['fname'] = $student->get_fname();
$_SESSION['lname'] = $student->get_lname();
$_SESSION['yos'] = $exam->get_yos();
$_SESSION['exam'] = $exam->get_examName();
redirect_to("../dashboard.php?viewresults");

    }

    else{
        $myResult = $result->is_result_exist($student->get_student_id(), $exam->get_examName() . " " . $exam->get_yos());
        if($myUser['role'] == 'parent' && $myResult[STATUS] == VERIFIED){
            $_SESSION['viewresult'] =  strtoupper($student->get_fname()) . ' ' . strtoupper($student->get_lname()) ."-RST". $myStudent['id'] . '(' .  $exam->get_examName() .  $exam->get_yos(). ')';
            $_SESSION['fname'] = $student->get_fname();
            $_SESSION['lname'] = $student->get_lname();
            $_SESSION['yos'] = $exam->get_yos();
            $_SESSION['exam'] = $exam->get_examName();
            redirect_to("../dashboard.php?viewresults");
        }
        else{
            $_SESSION['invalidResults'] = 'results not verified';
            redirect_to("../dashboard.php");
        }
    }


}
else{
    $_SESSION['noRusults'] = 'noResults';
    if($role['role'] == 'parent'){
        redirect_to("../dashboard.php");
    }
    else{
        redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    }

}

// echo strtoupper($student->get_fname()) . ' ' . strtoupper($student->get_lname()) . '(' .  $exam->get_examName() .  $exam->get_yos(). ')'; -->
