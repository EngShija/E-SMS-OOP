<?php
session_start();
require_once __DIR__ . '/../config/autoloader.php';
require_once __DIR__ . '/../config/incidences.php';
require_once __DIR__ . '/../includes/functions.php';
include_once __DIR__ . "/../config/constants.php";
require_once __DIR__ . '/../models/pdf.php';

if (
    !isset($_POST['class']) || !isset($_POST['yos']) || !isset($_POST['exam']) ||
    empty($_POST['class']) || empty($_POST['yos']) || empty($_POST['exam'])
) {
    echo '<div class="alert alert-danger">Please select class, exam and year of study.</div>';
    exit;
}

$classId = $_POST['class'];
$yos = $_POST['yos'];
$exam = $_POST['exam'];
$class = new StudentClass(new Database());
$class->setSchoolId($_SESSION[SCHOOL_ID]);

$db = new Database();
$studentModel = new Student($db);
$resultModel = new Results($db);
$subjectModel = new Subject($db);
$studentModel->setSchoolId($_SESSION[SCHOOL_ID]);
$subjectModel->setSchoolId($_SESSION[SCHOOL_ID]);
$students = $studentModel->get_students_by_class($classId);
$subjects = $subjectModel->get_all_subjects();
$myClass = $class->get_class_by_id($classId);

if (!$students || count($students) === 0) {
    echo '<div class="alert alert-warning">No students found for this class.</div>';
    exit;
}

// Build subject list for table headers
$subjectNames = [];
foreach ($subjects as $subject) {
    $subjectNames[] = $subject['sub_name'];
}

// Prepare results data
$resultsData = [];
foreach ($students as $student) {
    $row = [
        'full_name' => $student['first_name'] . ' ' . $student['middle_name'] . ' ' . $student['last_name'],
        'reg_no' => $student['reg_no'],
        'subjects' => [],
        'total' => 0,
        'count' => 0,
        'division' => '',
        'average' => 0,
    ];

    $pointsArray = [];
    foreach ($subjectNames as $subjectName) {
        $exam_type = $exam . " " . $yos;
        $result = $resultModel->get_result_by_student_subject_exam(
            $student['unique_id'],
            $subjectName,
            $exam_type
        );
        if ($result) {
            $row['subjects'][$subjectName] = $result['marks'];
            $row['total'] += $result['marks'];
            $row['count']++;
            $pointsArray[] = $result['point'];
            $row['division'] = isset($result['division']) ? $result['division'] : '';
        } else {
            $row['subjects'][$subjectName] = '-';
        }
    }
    $row['average'] = $row['count'] > 0 ? round($row['total'] / $row['count'], 2) : 0;

    if (!$row['division'] && count($pointsArray) > 0) {
        sort($pointsArray);
        $sevenSmallestPoints = array_slice($pointsArray, 0, 7);
        $totalPoints = array_sum($sevenSmallestPoints);
        if ($totalPoints >= 7 && $totalPoints <= 17)
            $row['division'] = 'I';
        elseif ($totalPoints >= 18 && $totalPoints <= 21)
            $row['division'] = 'II';
        elseif ($totalPoints >= 22 && $totalPoints <= 23)
            $row['division'] = 'III';
        elseif ($totalPoints >= 24 && $totalPoints <= 33)
            $row['division'] = 'IV';
        elseif ($totalPoints >= 34 && $totalPoints <= 35)
            $row['division'] = '0';
        else
            $row['division'] = '-';
    }

    $resultsData[] = $row;
}

// Sort by average for position
usort($resultsData, function ($a, $b) {
    return $b['average'] <=> $a['average'];
});

// Assign positions
$position = 1;
$lastAvg = null;
$repeat = 0;
foreach ($resultsData as $i => &$row) {
    if ($lastAvg === $row['average']) {
        $row['position'] = $position;
        $repeat++;
    } else {
        $position += $repeat;
        $row['position'] = $position;
        $lastAvg = $row['average'];
        $repeat = 1;
    }
}
unset($row);

// --- PDF EXPORT: Must be after all data is built ---
if (isset($_POST['download_pdf'])) {
    $pdf = new PDF();
    $pdf->AddPage('L');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Results for ' . $myClass['class_name'] . ' - ' . $exam . ' (' . $yos . ')', 0, 1, 'C');
    $pdf->Ln(4);

    // Define column widths
    $colWidths = [];
    $colWidths[] = 10; // #
    $colWidths[] = 40; // Full Name
    $colWidths[] = 30; // Reg No
    foreach ($subjectNames as $subject) {
        $colWidths[] = 20; // Each subject
    }
    $colWidths[] = 20; // Total Marks
    $colWidths[] = 20; // Average
    $colWidths[] = 20; // Division
    $colWidths[] = 20; // Position

    // Build header
    $header = ['#', 'Full Name', 'Reg No'];
    foreach ($subjectNames as $subject) {
        $header[] = $subject;
    }
    $header = array_merge($header, ['Total Marks', 'Average', 'Division', 'Position']);

    // Print header
    $pdf->SetFont('Arial', 'B', 10);
    foreach ($header as $i => $col) {
        $pdf->Cell($colWidths[$i], 10, $col, 1, 0, 'C');
    }
    $pdf->Ln();

    // Print data rows
    $pdf->SetFont('Arial', '', 10);
    foreach ($resultsData as $idx => $row) {
        $colIndex = 0;
        $pdf->Cell($colWidths[$colIndex++], 10, $idx + 1, 1);
        $pdf->Cell($colWidths[$colIndex++], 10, $row['full_name'], 1);
        $pdf->Cell($colWidths[$colIndex++], 10, $row['reg_no'], 1);
        foreach ($subjectNames as $subject) {
            $pdf->Cell($colWidths[$colIndex++], 10, $row['subjects'][$subject], 1);
        }
        $pdf->Cell($colWidths[$colIndex++], 10, $row['total'], 1);
        $pdf->Cell($colWidths[$colIndex++], 10, $row['average'], 1);
        $pdf->Cell($colWidths[$colIndex++], 10, $row['division'], 1);
        $pdf->Cell($colWidths[$colIndex++], 10, $row['position'], 1);
        $pdf->Ln();
    }

    if (ob_get_length())
        ob_end_clean();
    $pdf->Output('D', 'class_results.pdf');
    exit;
}
?>


<div class="table-responsive mt-3">
    <h2 class="text-center mb-4">Results for <?= htmlspecialchars($myClass['class_name']) ?> -
        <?= htmlspecialchars($exam) ?> (<?= htmlspecialchars($yos) ?>)
    </h2>
    <table class="table table-bordered table-striped" id="results-table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Reg No</th>
                <?php foreach ($subjectNames as $subject): ?>
                    <th><?= htmlspecialchars($subject) ?></th>
                <?php endforeach; ?>
                <th>Total Marks</th>
                <th>Average</th>
                <th>Division</th>
                <th>Position</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultsData as $idx => $row): ?>
                <tr>
                    <td><?= $idx + 1 ?></td>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['reg_no']) ?></td>
                    <?php foreach ($subjectNames as $subject): ?>
                        <td><?= htmlspecialchars($row['subjects'][$subject]) ?></td>
                    <?php endforeach; ?>
                    <td><?= $row['total'] ?></td>
                    <td><?= $row['average'] ?></td>
                    <td><?= $row['division'] ?></td>
                    <td><?= $row['position'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-sm-3">
        <form method="post" action="includes/class-results.php" style="display:inline;">
            <input type="hidden" name="class" value="<?= htmlspecialchars($classId) ?>">
            <input type="hidden" name="yos" value="<?= htmlspecialchars($yos) ?>">
            <input type="hidden" name="exam" value="<?= htmlspecialchars($exam) ?>">
            <button type="submit" name="download_pdf" class="btn btn-secondary mb-3">
                Download PDF
            </button>
        </form>
    </div>
    <!-- <div class="col-sm-3">
<button id="print-timetable" class="btn btn-primary print-button" style="bottom: 20px; right: 20px; z-index: 1000;">
    Print Results
</button>
</div> -->
</div>
<script>
    document.getElementById('print-timetable').onclick = function () {
        window.print();
    };
</script>