<?php
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../models/Class.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__. "/../models/Subject.php";
require_once __DIR__. "/../models/Exam.php";

$class = new StudentClass(new Database());
$subject = new Subject(new Database());
$exam = new Exam(new Database());
$database = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_name = $_POST['class'];
    $year_of_study = $_POST['yos'];
    $myClass = $class->is_class_present(validate_input($class_name));
    $class_id = $myClass['id'];

    // Fetch unique time slots to use as column headers
    $time_slots = [];
    $result_slots = $database->getConnection()->query("SELECT DISTINCT time_slots FROM timetable ORDER BY time_slots");
    while ($row = $result_slots->fetch_assoc()) {
        $time_slots[] = $row['time_slots'];
    }

    // Fetch timetable data grouped by day
    $data = [];
    $result = $database->getConnection()->query("SELECT * FROM timetable WHERE class_id = $class_id AND timetable_type = 'Class' AND yos = $year_of_study ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), time_slots");
    while ($row = $result->fetch_assoc()) {
        $mySubject = $subject->get_subject_by_id($row['subject_id']);
        $data[$row['day']][$row['time_slots']][] = $mySubject['sub_name'];
    }
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

<div class="container">
    <h2>Edit Class Timetable</h2>
    <form action="edit-class-timetable.php" method="POST">
        <div class="form-group">
            <label for="class">Class:</label>
            <select class="form-control" name="class" id="class">
                <option>Select Class</option>
                <?php foreach ($class->get_all_classes() as $myClass): ?>
                    <option value="<?= $myClass['class_name'] ?>"><?= $myClass['class_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="yos">Year Of Study:</label>
            <select class="form-control" name="yos" id="yos">
                <option>Select Year Of Study</option>
                <?php $i = 2020; ?>
                <?php while ($i <= date('Y')) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php $i++; endwhile ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Fetch Timetable</button>
    </form>

    <?php if (isset($data)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Day</th>
                        <?php foreach($time_slots as $time_slot): ?>
                            <th><?= $time_slot; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $day => $slots): ?>
                        <tr>
                            <td><?php echo $day; ?></td>
                            <?php foreach ($time_slots as $slot): ?>
                                <td>
                                    <form action="../controllers/update-timetable.php" method="POST">
                                    <input type="hidden" name="class" value="<?= $class_name ?>">
                                    <input type="hidden" name="yos" value="<?= $year_of_study ?>">
                                    <select name="sub_name">
                                    <option value="">---</option>
                                        <?php foreach ($subject->get_all_subjects() as $subj): ?>
                                            <option value="<?= $subj['sub_name'] ?>" <?= isset($slots[$slot]) && in_array($subj['sub_name'], $slots[$slot]) ? 'selected' : '' ?>><?= $subj['sub_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    <?php endif; ?>
</div>
