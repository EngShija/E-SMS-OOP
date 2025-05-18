<?php
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Timetable.php';

// Initialize database and timetable model
$database = new Database();
$timetable = new Timetable($database);

// Validate the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $teacher = $_POST['teacher'] ?? null;
    $class = $_POST['class'] ?? null;
    $room = $_POST['room'] ?? null;
    $subject = $_POST['subject'] ?? null;
    $schedule = $_POST['schedule'] ?? null;

    // Check for missing fields
    if (empty($id) || empty($teacher) || empty($class) || empty($room) || empty($subject) || empty($schedule)) {
        $_SESSION['errors'] = ['All fields are required.'];
        header("Location: ../includes/edit-timetable.php?id=$id");
        exit();
    }

    // Prepare the data for update
    $day = null;
    $timeSlot = null;

    // Extract the selected day and time slot from the schedule
    foreach ($schedule as $time => $days) {
        foreach ($days as $selectedDay => $selectedTimeSlot) {
            $day = $selectedDay;
            $timeSlot = $selectedTimeSlot;
        }
    }

    // Update the timetable entry
    $result = $timetable->updateTimetable($id, $teacher, $class, $room, $subject, $day, $timeSlot);

    if ($result) {
        $_SESSION['success'] = 'Timetable updated successfully.';
        header("Location: ../includes/teacher-timetable.php");
        exit();
    } else {
        $_SESSION['errors'] = ['Failed to update the timetable. Please try again.'];
        header("Location: ../includes/edit-timetable.php?id=$id");
        exit();
    }
} else {
    // Redirect if the request method is not POST
    header("Location: ../includes/teacher-timetable.php");
    exit();
}