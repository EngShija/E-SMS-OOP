<?php
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__."/../includes/functions.php";

$myClass = $class->is_class_present(validate_input($_POST['class']));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_id = $myClass['id'];
    $year_of_study = validate_input($_POST['yos']);

            if (!empty($_POST['class'])) {
                $subject_id = $timetable->get_subject_id_by_name($_POST['class']);
                $query = "UPDATE timetable SET subject_id = ? WHERE class_id = ? AND yos = ? AND day = ? AND time_slots = ?";
                $params = [$subject_id, $class_id, $year_of_study, $day, $time_slot];
                $database->getConnection()->execute_query($query, $params);
                
            }

    // header("Location: ../views/edit-class-timetable.php?success=1");
    echo($subject_id);
    exit();
}
?>
