<?php
require_once __DIR__ . "/../config/autoloader.php";
require_once __DIR__ . "/../config/incidences.php";
require_once __DIR__ . "/../config/constants.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Timetable.php';

if (!isset($_SESSION['classId'])) {
    echo "Class ID is required.";
    exit();
}

$class_id = $_SESSION['classId'];
$database = new Database();
$timetable = new Timetable($database);

// Fetch timetable entries for the class
$entries = $timetable->getTimetableByClassId($class_id);

$class->setSchoolId($_SESSION[SCHOOL_ID]);

$classes = $class->get_class_by_id($class_id);


// Define the days of the week
$days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
$timeSlots = ['8:00 AM - 9:00 AM', '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM'];

// Organize timetable entries by day and time
$timetableData = [];
foreach ($entries as $entry) {
    $timetableData[$entry['day']][$entry['time_slots']] = [
        'id' => $entry['id'],
        'teacher' => $entry['teacher_id'], // Ensure this is set correctly
        'subject' => $entry['sub_name'],
        'class' => $entry['class_id'],
        'room' => $entry['room_id']
    ];
}
?>

<h3 class="text-center">Class Timetable</h3>
<p class="text-center"><strong>Class Name: </strong><em class="text-primary"
        style="font-weight: bolder;"><?= strtoupper($classes['class_name']) ?></em></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Time</th>
            <?php foreach ($days as $day): ?>
                <th><?= ucfirst($day) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($timeSlots as $timeSlot): ?>
            <tr>
                <td><?= $timeSlot ?></td>
                <?php foreach ($days as $day): ?>
                    <td>
                        <?php if (isset($timetableData[$day][$timeSlot])): ?>
                            <?php
                            $room->set_id($timetableData[$day][$timeSlot]['room']);
                            $rooms = $room->get_room_by_id();
                            ?>
                            <?php $teacher = $user->get_user_by_id($timetableData[$day][$timeSlot]['teacher']); ?>
                            <strong>Subject:</strong> <?= htmlspecialchars(strtoupper($timetableData[$day][$timeSlot]['subject'])) ?><br>
                            <strong>Teacher:</strong> <?= htmlspecialchars(strtoupper($teacher['first_name']. " ". $teacher['last_name'])) ?><br>
                            <strong>Room:</strong> <?= htmlspecialchars($rooms['room_name']) ?>
                            <!-- Edit and Delete Buttons -->
                            <button class="btn btn-warning btn-sm edit-entry" data-id="<?= $timetableData[$day][$timeSlot]['id'] ?>"
                                data-teacher="<?= htmlspecialchars($timetableData[$day][$timeSlot]['teacher'] ?? '') ?>"
                                data-class="<?= htmlspecialchars($timetableData[$day][$timeSlot]['class'] ?? '') ?>"
                                data-room="<?= htmlspecialchars($timetableData[$day][$timeSlot]['room'] ?? '') ?>"
                                data-subject="<?= htmlspecialchars($timetableData[$day][$timeSlot]['subject'] ?? '') ?>"
                                data-day="<?= htmlspecialchars($day) ?>" data-time-slot="<?= htmlspecialchars($timeSlot) ?>"
                                onclick="redirectToEditPage(this)">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm delete-entry"
                                data-id="<?= $timetableData[$day][$timeSlot]['id'] ?>">Delete</button>
                        <?php else: ?>
                            <em>---</em>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button id="print-timetable" class="btn btn-primary print-button" style="bottom: 20px; right: 20px; z-index: 1000;">
    Print Timetable
</button>
<script src="assets/js/timetable-actions.js"></script>
<script src="assets/js/edit-timetable.js"></script>