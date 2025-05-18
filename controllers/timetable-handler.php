<?php
header('Content-Type: application/json');
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Timetable.php';
require_once __DIR__ . '/../models/Class.php';
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__. "/../config/constants.php";
require_once __DIR__."/../includes/functions.php";

$database = new Database();
$conn = $database->getConnection();
$timetable = new Timetable($database);
$classes = new StudentClass(new Database());

if (!isset($_SESSION['school_id'])) {
    echo json_encode(["success" => false, "errors" => ["School ID is not set. Please log in again."]]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $teacher = $_POST['teacher'];
    $class = $_POST['class'];
    $room = $_POST['room'];
    $subject = $_POST['subject'];
    $schedule = $_POST['schedule'];
    $type = 'class';
    $yos = '';

    $school_id = $_SESSION['school_id'];

    $errors = [];
    $successfulEntries = [];

    // Validate required fields
    if (empty($teacher) || empty($class) || empty($room) || empty($subject) || empty($schedule)) {
        echo json_encode(["success" => false, "errors" => ["All fields are required."], "submittedData" => [
            "teacher" => $teacher,
            "class" => $class,
            "room" => $room,
            "subject" => $subject,
            "schedule" => $schedule
        ]]);
        exit();
    }

    // Check availability for each selected time and day
    foreach ($schedule as $timeSlot => $days) {
        foreach ($days as $day => $time) {
            $hasConflict = false;

            // Check if the class is available
            if ($timetable->isClassAvailable($class, $day, $time, $school_id)) {
                $classes->setSchoolId($_SESSION[SCHOOL_ID]);
                $myClass = $classes->get_class_by_id($class);
                $errors[] = "Class: ". strtoupper($myClass['class_name']). " is already scheduled at $time on $day.";
                $hasConflict = true;
            }

            // Check if the teacher is available
            if ($timetable->isTeacherAvailable($teacher, $day, $time, $school_id)) {
                $teachers = $user->get_user_by_id($teacher);
                $errors[] = "Teacher: ". strtoupper($teachers['first_name']. " ". $teachers['last_name']). " is already scheduled at $time on $day.";
                $hasConflict = true;
            }

            // Check if the room is available
            if ($timetable->isRoomAvailable($room, $day, $time, $school_id)) {
                $errors[] = "Room: ". strtoupper($room). " is already scheduled at $time on $day.";
                $hasConflict = true;
            }

            // If no conflicts, insert the timetable entry
            if (!$hasConflict) {
                $insertSql = "INSERT INTO timetable (teacher_id, subject_id, room_id, class_id, day, time_slots, timetable_type, yos, school_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $conn->execute_query($insertSql, [$teacher, $subject, $room, $class, $day, $time, $type, $yos, $school_id]);
                $successfulEntries[] = "Timetable entry added for $time on $day.";
            }
        }
    }

    // Return success, error messages, and submitted data
    echo json_encode([
        "success" => empty($errors),
        "message" => $successfulEntries,
        "errors" => $errors,
        "submittedData" => [
            "teacher" => $teacher,
            "class" => $class,
            "room" => $room,
            "subject" => $subject,
            "schedule" => $schedule
        ]
    ]);
    exit();
} else {
    echo json_encode(["success" => false, "errors" => ["Invalid request method."]]);
    exit();
}