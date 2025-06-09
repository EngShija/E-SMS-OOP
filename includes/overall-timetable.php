<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Timetable.php';
require_once __DIR__ . '/../models/Class.php';
require_once __DIR__ . '/../models/Users.php';

$database = new Database();
$timetableModel = new Timetable($database);
$classModel = new StudentClass($database);
$userModel = new User($database);

$classModel->setSchoolId(1);

$days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
$timeSlots = [
    '8:00 AM - 9:00 AM',
    '9:00 AM - 10:00 AM',
    '10:00 AM - 11:00 AM',
    '11:00 AM - 12:00 PM',
    '12:00 PM - 1:00 PM',
    '1:00 PM - 2:00 PM',
    '2:00 PM - 3:00 PM'
];
$classes = $classModel->get_all_classes();
$teachers = $userModel->get_teachers();
$teacherColors = [];

// Assign a random color to each teacher (not based on ID)
function randomColor() {
    return sprintf('#%06X', hexdec(substr(md5(uniqid(mt_rand(), true)), 0, 6)));
}

$teacherColors = [];
foreach ($teachers as $teacher) {
    // Ensure unique color for each teacher
    do {
        $color = randomColor();
    } while (in_array($color, $teacherColors));
    $teacherColors[$teacher['unique_id']] = $color;
}

// Fetch all timetable entries
$entries = $timetableModel->getAllTimetables();

// Organize timetable: $timetableData[day][class_id][time_slot] = entry
$timetableData = [];
foreach ($entries as $entry) {
    $day = strtolower(trim($entry['day']));
    $class_id = (string)$entry['class_id'];
    $time_slot = trim($entry['time_slots']);
    $timetableData[$day][$class_id][$time_slot] = $entry;
}
?>

<style>
    .teacher-cell {
        color: #222;
        font-weight: bold;
        border-radius: 5px;
        padding: 2px 4px;
        display: block;
        margin-bottom: 2px;
    }
    .timetable-table th,
    .timetable-table td {
        text-align: center;
        vertical-align: middle;
        min-width: 120px;
    }
    .timetable-table th.day-header {
        background: #eee;
        font-size: 1.1em;
    }
    .timetable-table th.class-header {
        background: #f8f8f8;
        font-size: 0.95em;
    }
</style>

<h3 class="text-center">Overall School Timetable</h3>
<table class="table table-bordered timetable-table table-striped">
    <thead>
        <tr>
            <th rowspan="2" class="bg-success">Time</th>
            <?php foreach ($days as $day): ?>
                <th class="day-header bg-success" colspan="<?= count($classes) ?>"><?= ucfirst($day) ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($days as $day): ?>
                <?php foreach ($classes as $class): ?>
                    <th class="class-header"><?= htmlspecialchars($class['class_name']) ?></th>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($timeSlots as $timeSlot): ?>
            <tr>
            <td><?= $timeSlot ?></td>
            <?php foreach ($days as $day): ?>
                <?php foreach ($classes as $class): ?>
                    <?php
                    $classId = (string)$class['id'];
                    $entry = $timetableData[$day][$classId][$timeSlot] ?? null;
                    ?>
<td>
    <?php if ($entry):
        $abbr = strtoupper(substr($entry['teacher_first_name'], 0, 1). "-" . $entry['teacher_last_name']);
        $color = $teacherColors[$entry['teacher_id']] ?? '#cccccc'; // fallback color
    ?>
        <span class="teacher-cell" style="background: <?= $color ?>;">
            <?= htmlspecialchars($abbr) ?><br>
            <small><?= ucfirst(htmlspecialchars(substr($entry['sub_name'], 0, 4))) ?></small>
        </span>
    <?php else: ?>
        ---
    <?php endif; ?>
</td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<!-- Legend for teacher colors and abbreviations -->
<div class="mt-4">
    <strong>Teacher Color Legend & Abbreviations:</strong>
    <ul style="list-style: none; padding-left: 0;">
        <?php foreach ($teachers as $teacher): ?>
            <?php
                // Abbreviation: First letter of first name + last name (e.g., LHaule)
                $abbr = strtoupper(substr($teacher['first_name'], 0, 1) . $teacher['last_name']);
            ?>
            <li style="display: inline-block; margin-right: 20px;">
                <span
                    style="display: inline-block; width: 18px; height: 18px; background: <?= $teacherColors[$teacher['unique_id']] ?>; border-radius: 3px; margin-right: 6px; vertical-align: middle;"></span>
                <strong><?= htmlspecialchars($abbr) ?></strong> = <?= htmlspecialchars($teacher['first_name'] . ' ' . $teacher['last_name']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<button id="print-timetable" class="btn btn-primary print-button" style="bottom: 20px; right: 20px; z-index: 1000;">
    Print Timetable
</button>
<script src="assets/js/timetable-actions.js"></script>
<script src="assets/js/edit-timetable.js"></script>