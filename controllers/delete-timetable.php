<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Timetable.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the JSON payload
    $data = json_decode(file_get_contents('php://input'), true);

    // Debugging: Check if the ID is received
    if (!isset($data['id'])) {
        error_log("No ID provided."); // Debugging
        echo json_encode(['success' => false, 'message' => 'No ID provided.']);
        exit();
    }

    $id = $data['id'];
    error_log("Deleting timetable entry with ID: $id"); // Debugging

    $database = new Database();
    $timetable = new Timetable($database);

    // Delete the timetable entry
    $result = $timetable->deleteTimetableEntry($id);

    if ($result) {
        error_log("Timetable entry with ID $id deleted successfully."); // Debugging
        echo json_encode(['success' => true, 'message' => 'Timetable entry deleted successfully.']);
    } else {
        error_log("Failed to delete timetable entry with ID $id."); // Debugging
        echo json_encode(['success' => false, 'message' => 'Failed to delete timetable entry.']);
    }
}
?>