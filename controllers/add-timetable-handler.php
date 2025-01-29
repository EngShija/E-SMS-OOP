<?php
require_once "../models/Timetable.php";

require_once "../models/Class.php";

require_once "../models/Subject.php";

require_once "../includes/functions.php";

require_once __DIR__. "/../models/Exam.php";

$timetable = new Timetable(new Database());

$class = new StudentClass(new Database());

$subject = new Subject(new Database());

$exam = new Exam(new Database());


$class->set_class_name(validate_input($_POST['class']));

$subject->set_subjectName(validate_input($_POST['subject']));

$timetable->set_day(validate_input($_POST['day']));

$timetable->set_time_slot(validate_input($_POST['start_time']). " - " . validate_input($_POST['end_time']));

$timetable->set_type(validate_input($_POST['type']));

$timetable->set_date(validate_input($_POST['date']));

$exam->set_examName(validate_input($_POST['exam']));

$class_name = $class->get_class_name();
$subject_name = $subject->get_subjectName();
$day = $timetable->get_day();
$time_slot = $timetable->get_time_slot();
$type = $timetable->get_type();
$date = $timetable->get_date();
$examType = $exam->get_examName();

$myClass = $class->is_class_present($class_name);
$mySubject = $subject->is_subject_present($subject_name);
$myExam = $exam->is_exam_present($examType);

$class_id = $myClass['id'];
$subject_id = $mySubject['id'];
$yos = validate_input($_POST['yos']);
$exam_id = $myExam['id'];

if(!isset($date)){
if(count($timetable->is_space_free($class_id, $day, $time_slot, $yos)) > 0){
    $_SESSION['noSpace'] = "No space";
    redirect_to('../dashboard.php');
}
else{
    if($timetable->add_timetable($subject_id, $class_id, $day, $time_slot, $type, NULL, NULL, $yos)){
    $_SESSION['tmtAdded'] = 'Added';
    redirect_to('../dashboard.php');
    }
}
}
else{
    if(count($timetable->is_space_free_for_exam($class_id, $date, $time_slot, $yos)) > 0){
        $_SESSION['noSpace'] = "No space";
        redirect_to('../dashboard.php');
    }
    else{
        if($timetable->add_timetable($subject_id, $class_id, $day, $time_slot, $type, $date, $exam_id, $yos)){
        $_SESSION['tmtAdded'] = 'Added';
        redirect_to('../dashboard.php');
    }
}
}