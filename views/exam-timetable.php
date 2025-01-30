<?php
include_once "../models/Database.php";
include_once "../models/pdf.php";
include_once "../includes/functions.php";
include_once "../models/Timetable.php";
include_once "../models/Class.php";
require_once __DIR__. "/../models/Exam.php";
include_once "../models/Subject.php";

$exam = new Exam(new Database());

$class = new StudentClass(new Database());

$database = new Database();

$timetable = new Timetable(new Database());

$pdf = new PDF();

$subject = new Subject(new Database());

$myExam = $exam->is_exam_present(validate_input($_POST['exam']));

$exam_id = $myExam['id'];

$myClass = $class->is_class_present(validate_input($_POST['class']));

$class_id = $myClass['id'];

$yos = validate_input($_POST['yos']);

// Database connection
// $conn = new mysqli('localhost', 'root', '', 'e_smsdb');
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Fetch unique time slots to use as column headers

$time_slots = [];
$result_slots = $database->getConnection()->query("SELECT DISTINCT time_slots FROM timetable ORDER BY time_slots");
while ($row = $result_slots->fetch_assoc()) {
    $time_slots[] = $row['time_slots'];
}

// Fetch timetable data grouped by day
$data = [];
$result = $database->getConnection()->query("SELECT * FROM timetable WHERE class_id = $class_id AND timetable_type = 'Exam' AND exam_id = $exam_id AND yos = $yos ORDER BY date");
while ($row = $result->fetch_assoc()) {
    $mySubject = $subject->get_subject_by_id($row['subject_id']);

    $data[$row['date']][$row['time_slots']][] =  $mySubject['sub_name'];
}

// $data = [];
// while($row = $timetable->get_timetable()){
//     $data[$row['day']][$row['time_slots']][] = $row['subject_id'];
// }

// $conn->close();

// $pdf->AddPage();
// $pdf->create_pdf();
// foreach($timetable->get_time_slots() as $time_slot){
// $pdf->add_timetable_header($slot);
// }
// // foreach ($data as $day => $slots){
// //     $pdf->add_timetable_contents($day, )
// // }
// $pdf->save_pdf_to_server('documents', 'results', $pdf->Output('s'))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <style>
        .table{
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h5 class="text-center mt-3"><?= $myClass['class_name']. " ". $myExam['exam_name']. " ". $yos ?> Timetable</h5>
    <table class="table table-bordered col-md-8">
        <thead>
            <tr class="secondary">
                <th>Day</th>
                <?php foreach($timetable->get_time_slots() as $time_slot): ?>
                    <th><?= $time_slot['time_slots']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $day => $slots): ?>
                <tr>
                    <td><?php echo $day; ?></td>
                    <?php foreach ($time_slots as $slot): ?>
                        <td>
                            <?php
                            if (isset($slots[$slot])) {
                                echo implode('<br>', $slots[$slot]);
                            } else {
                                echo "---";
                            }
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>


<?php
// echo date('D');