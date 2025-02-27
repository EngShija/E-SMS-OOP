<?php
include_once "../models/Database.php";
include_once "../models/pdf.php";
include_once "../includes/functions.php";
include_once "../models/Timetable.php";
include_once "../models/Class.php";
include_once "../models/Subject.php";

$class = new StudentClass(new Database());

$database = new Database();

$timetable = new Timetable(new Database());

$pdf = new PDF();

$subject = new Subject(new Database());

$myClass = $class->is_class_present(validate_input($_POST['class']));

$yos = validate_input($_POST['yos']);

$class_id = $myClass['id'];

// Fetch unique time slots to use as column headers

$time_slots = [];
$result_slots = $database->getConnection()->query("SELECT DISTINCT time_slots FROM timetable ORDER BY time_slots");
while ($row = $result_slots->fetch_assoc()) {
    $time_slots[] = $row['time_slots'];
}

// Fetch timetable data grouped by day
$data = [];
$result = $database->getConnection()->query("SELECT * FROM timetable WHERE class_id = $class_id AND timetable_type = 'Class' AND yos = $yos ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), time_slots");
while ($row = $result->fetch_assoc()) {
    $mySubject = $subject->get_subject_by_id($row['subject_id']);
    $data[$row['day']][$row['time_slots']][] = $mySubject['sub_name'];
}

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
    <h5 class="text-center mt-3"><?= $myClass['class_name'] ?> Class Timetable <?= $yos ?></h5>
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
echo date('l');