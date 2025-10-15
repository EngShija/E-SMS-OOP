<?php
session_start();
require_once __DIR__ . '/../fpdf/fpdf.php';
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Timetable.php';
require_once __DIR__ . '/../models/Class.php';
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../config/constants.php';

$database = new Database();
$timetableModel = new Timetable($database);
$classModel = new StudentClass($database);
$userModel = new User($database);
$classModel->setSchoolId(SCHOOL_ID);
$timetableModel->setSchoolId(SCHOOL_ID);
$userModel->setSchoolId(SCHOOL_ID);

$days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
$daysHeader = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$timeSlots =  ['7:00 - 7:40', '7:40 - 8:20', '8:20 - 9:00', '9:00 - 9:40', '9:40 - 10:10', '10:10 - 10:50', '10:50 - 11:30', '11:30 - 12:10', '12:10 - 12:50', '12:50 - 13:30', '13:30 - 14:10'];
$formSix = $classModel->get_all_classes();
// $formFive = $classModel->get_class_by_name('PCM');
$teachers = $userModel->get_teachers();

// Assign a random color to each teacher (same as in overall-timetable.php)
function randomColor() {
    return sprintf('#%06X', hexdec(substr(md5(uniqid(mt_rand(), true)), 0, 6)));
}
$teacherColors = [];
foreach ($teachers as $teacher) {
    do {
        $color = randomColor();
    } while (in_array($color, $teacherColors));
    $teacherColors[$teacher['unique_id']] = $color;
}

// Fetch all timetable entries
$entries = $timetableModel->getAllTimetables();
$timetableData = [];
foreach ($entries as $entry) {
    $day = strtolower(trim($entry['day']));
    $class_id = (string)$entry['class_id'];
    $time_slot = trim($entry['time_slots']);
    $timetableData[$day][$class_id][$time_slot] = $entry;
}

// Use Landscape A3 for maximum width
$pdf = new FPDF('L', 'mm', 'A3');
$pdf->SetAutoPageBreak(true, 15);

function renderTimetable($pdf, $days, $daysHeader, $timeSlots, $classes, $timetableData, $teacherColors, $teachers, $title) {
    $pageWidth = 420 - 20; // A3 landscape width minus margins (mm)
    $timeColW = 18; // Slightly wider for time column
    $numDayCols = count($days) * count($classes);
    $cellW = ($pageWidth - $timeColW) / $numDayCols;
    $cellH = 10; // Slightly taller for readability
    $headerCellH = $cellH ;
    $pdf->AddPage();
    // Add school header
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 14, 'BAGAMOYO SECONDARY SCHOOL', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 12, $title, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 9);
    // Table header: Days as columns, combinations as sub-columns
    $headerFill = [220, 230, 241]; // Light blue for headers
    $timeFill = [240, 240, 240];   // Light gray for time slots
    $breakFill = [255, 230, 204];  // Light orange for BREAK
    $pdf->SetFillColor($headerFill[0], $headerFill[1], $headerFill[2]);
    // Merge the 'Time' cell to span both header rows
    $pdf->Cell($timeColW, $headerCellH * 2, 'Time', 1, 0, 'C', true);
    foreach ($daysHeader as $i => $dayHeader) {
        $pdf->Cell($cellW * count($classes), $cellH, $dayHeader, 1, 0, 'C', true);
    }
    $pdf->Ln();
    // Remove the empty cell below 'Time' header
    $pdf->Cell($timeColW, 0, '', 0, 0, 'C');
    foreach ($days as $day) {
        foreach ($classes as $class) {
            $pdf->SetFillColor($headerFill[0], $headerFill[1], $headerFill[2]);
            $abbr = strlen($class['class_name']) > 10 ? substr($class['class_name'], 0, 9) . '.' : $class['class_name'];
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell($cellW, $headerCellH, $abbr, 1, 0, 'C', true);
        }
    }
    $pdf->Ln($headerCellH);
    // Table body
    $mergeFriday = ['12:10 - 12:50', '12:50 - 13:30', '13:30 - 14:10'];
    $fridayIndex = array_search('friday', $days);
    $fridayMergeColor = [255, 230, 204]; // Light orange for merged region
    $rowCount = count($timeSlots);
    foreach ($timeSlots as $rowIdx => $timeSlot) {
        $pdf->SetFillColor($timeFill[0], $timeFill[1], $timeFill[2]);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell($timeColW, $cellH, $timeSlot, 1, 0, 'C', true);
        if ($timeSlot == '9:40 - 10:10') {
            $pdf->SetFillColor($breakFill[0], $breakFill[1], $breakFill[2]);
            $pdf->Cell($cellW * $numDayCols, $cellH, 'BREAK TIME', 1, 0, 'C', true);
            $pdf->Ln();
            continue;
        }
        foreach ($days as $dayIdx => $day) {
            foreach ($classes as $classIdx => $class) {
                $classId = (string)$class['id'];
                // Merge Friday's last three time slots
                if ($day == 'friday' && in_array($timeSlot, $mergeFriday)) {
                    if ($timeSlot == '12:10 - 12:50') {
                        // Draw a single tall cell for Friday, spanning 3 rows
                        $entry = $timetableData[$day][$classId][$timeSlot] ?? null;
                        $pdf->SetFillColor($fridayMergeColor[0], $fridayMergeColor[1], $fridayMergeColor[2]);
                        $x = $pdf->GetX();
                        $y = $pdf->GetY();
                        $pdf->Rect($x, $y, $cellW, $cellH * 3, 'F');
                        if ($entry) {
                            $abbr = strtoupper(substr($entry['teacher_first_name'], 0, 1) . substr($entry['teacher_last_name'], 0, 1));
                            $subject = ucfirst(substr($entry['sub_name'], 0, 4));
                            $pdf->SetFont('Arial', 'B', 8);
                            $pdf->SetXY($x, $y + 2);
                            $pdf->Cell($cellW, $cellH/2, $abbr, 0, 2, 'C', false);
                            $pdf->SetFont('Arial', '', 7);
                            $pdf->SetXY($x, $y + $cellH/2 + 2);
                            $pdf->Cell($cellW, $cellH/2, $subject, 0, 2, 'C', false);
                        } else {
                            $pdf->SetXY($x, $y + $cellH);
                            $pdf->Cell($cellW, $cellH, '', 0, 2, 'C', false);
                        }
                        $pdf->SetXY($x + $cellW, $y);
                    }
                    // Skip Friday cell for the next two rows
                    continue;
                }
                // For all other cells
                if ($day == 'friday' && in_array($timeSlot, ['12:50 - 13:30', '13:30 - 14:10'])) {
                    continue;
                }
                $entry = $timetableData[$day][$classId][$timeSlot] ?? null;
                if ($entry) {
                    $abbr = strtoupper(substr($entry['teacher_first_name'], 0, 1) . substr($entry['teacher_last_name'], 0, 1));
                    $subject = ucfirst(substr($entry['sub_name'], 0, 4));
                    $color = $teacherColors[$entry['teacher_id']] ?? '#cccccc';
                    $r = hexdec(substr($color, 1, 2));
                    $g = hexdec(substr($color, 3, 2));
                    $b = hexdec(substr($color, 5, 2));
                    $pdf->SetFillColor($r, $g, $b);
                    $x = $pdf->GetX();
                    $y = $pdf->GetY();
                    $pdf->SetFont('Arial', 'B', 8);
                    $pdf->Cell($cellW, $cellH/2, $abbr, 'LTR', 0, 'C', true);
                    $pdf->SetFont('Arial', '', 7);
                    $pdf->SetXY($x, $y + $cellH/2);
                    $pdf->Cell($cellW, $cellH/2, $subject, 'LBR', 0, 'C', true);
                    $pdf->SetXY($x + $cellW, $y);
                } else {
                    $pdf->SetFillColor(255,255,255);
                    $pdf->Cell($cellW, $cellH, '---', 1, 0, 'C', true);
                }
            }
        }
        $pdf->Ln();
    }
    // Teacher color legend after the timetable
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 8, 'Teacher Color Legend & Abbreviations:', 0, 1);
    $pdf->SetFont('Arial', '', 8);
    $count = 0;
    foreach ($teachers as $teacher) {
        $abbr = strtoupper(substr($teacher['first_name'], 0, 1) . substr($teacher['last_name'], 0, 1));
        $color = $teacherColors[$teacher['unique_id']];
        $r = hexdec(substr($color, 1, 2));
        $g = hexdec(substr($color, 3, 2));
        $b = hexdec(substr($color, 5, 2));
        $pdf->SetFillColor($r, $g, $b);
        $pdf->Cell(8, 6, '', 0, 0, '', true);
        $pdf->Cell(40, 6, $abbr . ' = ' . $teacher['first_name'] . ' ' . $teacher['last_name'], 0, 0);
        $count++;
        if ($count % 3 == 0) {
            $pdf->Ln();
        }
    }
    if ($count % 3 != 0) {
        $pdf->Ln();
    }
    $pdf->Ln(2);
}
renderTimetable($pdf, $days, $daysHeader, $timeSlots, $formSix, $timetableData, $teacherColors, $teachers, 'Overall Form School Timetable');
// renderTimetable($pdf, $days, $daysHeader, $timeSlots, $formFive, $timetableData, $teacherColors, $teachers, 'Overall Form Five Timetable');

$pdf->Output('D', 'overall-timetable.pdf');
exit;
