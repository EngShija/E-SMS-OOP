<?php
session_start();
require_once __DIR__ . "/../config/autoloader.php";
require_once __DIR__ . "/../config/incidences.php";
require_once __DIR__ . "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";

$db = new Database();
$studentModel = new Student($db);

$studentModel->setSchoolId($_SESSION[SCHOOL_ID]);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
    $file = $_FILES['csvFile']['tmp_name'];
    $handle = fopen($file, 'r');
    if ($handle === false) {
        $_SESSION['error'] = 'Failed to open uploaded file.';
        header("Location: ../dashboard.php");
        exit;
    }

    $header = fgetcsv($handle); // Skip header row

    $added = 0;
    $errors = 0;
    $errorMessages = [];
    $successMessages = [];

    while (($row = fgetcsv($handle))) {
        if (count($row) < 6)
            continue; // skip incomplete rows

        $fname = trim($row[0]);
        $mname = trim($row[1]);
        $lname = trim($row[2]);
        $gender = trim($row[3]);
        $regNo = trim($row[4]);
        $class = trim($row[5]);

        // Check if registration number already exists
        $exists = $studentModel->get_student_by_reg_no($regNo);

        if ($exists) {
            $errorMessages[] = "Skipped (duplicate Reg No): $fname $mname $lname ($regNo)";
            $errors++;
            continue;
        }

        $result = $studentModel->addStudents([
            'unique_id' => uniqid('ID', true),
            'first_name' => $fname,
            'middle_name' => $mname,
            'last_name' => $lname,
            'gender' => $gender,
            'reg_no' => $regNo,
            'reg_date' => date('Y-m-d'),
            'class' => $class,
            'school_id' => $studentModel->getSchoolId()
        ]);

        if (!$result) {
            $errorMessages[] = "Error adding student: $fname $mname $lname. Please check the data.";
            $errors++;
        } else {
            $successMessages[] = "Added: $fname $mname $lname";
            $added++;
        }
    }
    fclose($handle);

    if ($added === 0) {
        $errorMessages[] = "No students were added. Please check your CSV file.";
    } else {
        $successMessages[] = "<strong>Total students added: $added</strong>";
        if ($errors > 0) {
            $errorMessages[] = "<strong>Errors: $errors</strong>";
        }
    }

    // Store messages in session
    if (!empty($successMessages)) {
        $_SESSION['success'] = implode('<br>', $successMessages);
    }
    if (!empty($errorMessages)) {
        $_SESSION['error'] = implode('<br>', $errorMessages);
    }

    header("Location: ../dashboard.php?managestd");
    exit;
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../dashboard.php");
    exit;
}