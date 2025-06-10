<?php
session_start();
require_once __DIR__ . '/../config/autoloader.php';
require_once __DIR__ . '/../config/incidences.php';
require_once __DIR__ . '/../includes/functions.php';

$db = new Database();
$resultModel = new Results($db);
$studentModel = new Student($db);
$subjectModel = new Subject($db);
$examModel = new Exam($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
    $class = $_POST['class'];
    $yos = $_POST['yos'];
    $exam = $_POST['exam'];
    $file = $_FILES['csvFile']['tmp_name'];

    $added = 0;
    $errors = 0;
    $errorMessages = [];
    $successMessages = [];

    if (($handle = fopen($file, 'r')) !== false) {
        $header = fgetcsv($handle); // Skip header
        while (($row = fgetcsv($handle))) {
            if (count($row) < 3) continue;
            $regNo = trim($row[0]);
            $marks = trim($row[1]);
            $subjectName = trim($row[2]);
            $studentModel->setSchoolId($_SESSION[SCHOOL_ID]);

            $student = $studentModel->get_student_by_reg_no($regNo);
            if (!$student) {
                $errorMessages[] = "Student with Reg No $regNo not found.";
                $errors++;
                continue;
            }

            $subjectModel->set_subjectName($subjectName);
            $examModel->set_examName($exam);
            $examModel->set_yos($yos);

            // Check if result already exists for this student, subject, exam, and yos
            if ($resultModel->is_result_present(
                $student['unique_id'],
                $subjectName,
                $exam . " " . $yos
            )) {
                $errorMessages[] = "Result already exists for $regNo ($subjectName, $exam $yos).";
                $errors++;
                continue;
            }

            // Calculate grade, description, point
            $grade = $desc = '';
            $point = 0;
            $m = intval($marks);
            if ($m >= 0 && $m <= 29) {
                $grade = 'F'; $desc = 'Fail'; $point = 7;
            } elseif ($m >= 30 && $m <= 39) {
                $grade = 'S'; $desc = 'Very Poor'; $point = 6;
            } elseif ($m >= 40 && $m <= 49) {
                $grade = 'E'; $desc = 'Poor'; $point = 5;
            } elseif ($m >= 50 && $m <= 59) {
                $grade = 'D'; $desc = 'Stisfactory'; $point = 4;
            } elseif ($m >= 60 && $m <= 69) {
                $grade = 'C'; $desc = 'Good'; $point = 3;
            } elseif ($m >= 70 && $m <= 74) {
                $grade = 'B'; $desc = 'Very Good'; $point = 2;
            } elseif ($m >= 75 && $m <= 100) {
                $grade = 'A'; $desc = 'Excellent'; $point = 1;
            } else {
                $errorMessages[] = "Invalid marks for $regNo.";
                $errors++;
                continue;
            }

            $addedResult = $resultModel->add_results(
                $student['unique_id'],
                $_SESSION['user_id'],
                $subjectName,
                $exam . " " . $yos,
                $marks,
                $grade,
                $desc,
                $point
            );

            if ($addedResult) {
                // Generate PDF for this student (summary for this exam)
                $pdf = new PDF();
                $pdf->AddPage();
                $pdf->create_pdf();
                $pdf->add_result_details(strtoupper($student['first_name']), strtoupper($student['last_name']), $exam . " " . $yos);
                $pdf->add_table_header();

                $pdf->SetFont('Arial', '', 12);
                $totalMarks = 0;
                $subjectCount = 0;
                $results = $resultModel->get_results($student['unique_id'], $exam . " " . $yos);
                foreach ($results as $res) {
                    $pdf->add_result_contents($res['subject_name'], $res['marks'], $res['grade'], $res['point'], $res['description']);
                    $totalMarks += $res['marks'];
                    $subjectCount++;
                }

                // Division logic
                $pointsArray = [];
                foreach ($results as $res) {
                    $pointsArray[] = $res['point'];
                }
                sort($pointsArray);
                $sevenSmallestPoints = array_slice($pointsArray, 0, 7);
                $totalPoints = array_sum($sevenSmallestPoints);

                $division = '';
                if ($totalPoints >= 7 && $totalPoints <= 17) $division = 'I';
                elseif ($totalPoints >= 18 && $totalPoints <= 21) $division = 'II';
                elseif ($totalPoints >= 22 && $totalPoints <= 23) $division = 'III';
                elseif ($totalPoints >= 24 && $totalPoints <= 33) $division = 'IV';
                elseif ($totalPoints >= 34 && $totalPoints <= 35) $division = '0';
                else $division = 'Invalid';

                $resultModel->set_division($division);

                $avg = $subjectCount > 0 ? round($totalMarks / $subjectCount) : 0;
                if ($avg >= 0 && $avg <= 29) {
                    $resultModel->set_grade('F');
                    $resultModel->set_description('Fail');
                } elseif ($avg >= 30 && $avg <= 39) {
                    $resultModel->set_grade('S');
                    $resultModel->set_description('Very Poor');
                } elseif ($avg >= 40 && $avg <= 49) {
                    $resultModel->set_grade('E');
                    $resultModel->set_description('Poor');
                } elseif ($avg >= 50 && $avg <= 59) {
                    $resultModel->set_grade('D');
                    $resultModel->set_description('Satisfactory');
                } elseif ($avg >= 60 && $avg <= 69) {
                    $resultModel->set_grade('C');
                    $resultModel->set_description('Good');
                } elseif ($avg >= 70 && $avg <= 74) {
                    $resultModel->set_grade('B');
                    $resultModel->set_description('Very Good');
                } elseif ($avg >= 75 && $avg <= 100) {
                    $resultModel->set_grade('A');
                    $resultModel->set_description('Excellent');
                }

                $pdf->Ln();
                $pdf->add_result_summary(
                    $totalMarks,
                    $avg,
                    $resultModel->get_grade(),
                    $resultModel->get_description(),
                    $resultModel->get_division(),
                    $totalPoints
                );

                $pdf->save_pdf_to_server(
                    '../documents',
                    strtoupper($student['first_name']) . ' ' . strtoupper($student['last_name']) . "-RST" . $student['id'] . '(' . $exam . $yos . ')',
                    $pdf->Output('S')
                );

                $successMessages[] = "Result added and PDF generated for $regNo";
                $added++;
            } else {
                $errorMessages[] = "Failed to add result for $regNo";
                $errors++;
            }
        }
        fclose($handle);
    } else {
        $errorMessages[] = "Failed to open uploaded file.";
    }

    if ($added > 0) {
        $_SESSION['success'] = "$added results added successfully.<br>" . implode('<br>', $successMessages);
    }
    if ($errors > 0) {
        $_SESSION['error'] = "$errors errors occurred.<br>" . implode('<br>', $errorMessages);
    }
    header("Location: ../dashboard.php");
    exit;
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../dashboard.php");
    exit;
}