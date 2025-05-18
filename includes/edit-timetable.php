<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Class.php';
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../models/Subject.php';
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../config/autoloader.php';
require_once __DIR__ . '/../config/incidences.php';

$database = new Database();
$class = new StudentClass($database);
$userModel = new User($database);
$subjectModel = new Subject($database);

$userModel->setSchoolId($_SESSION[SCHOOL_ID]);
$class->setSchoolId($_SESSION[SCHOOL_ID]);
$room->setSchoolId($_SESSION[SCHOOL_ID]);
$subjectModel->setSchoolId($_SESSION[SCHOOL_ID]);

$classes = $class->get_all_classes();
$rooms = $room->get_all_rooms();
$teachers = $userModel->get_teachers();
$subjects = $subjectModel->get_all_subjects();

// Retrieve conflict errors from the session
$conflictErrors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
unset($_SESSION['errors']); // Clear the errors after displaying

// Get query parameters for the entry to edit
$id = $_GET['id'] ?? '';
$teacher = $_GET['teacher'] ?? '';
$classId = $_GET['class'] ?? '';
$roomId = $_GET['room'] ?? '';
$subjectId = $_GET['subject'] ?? '';
$day = $_GET['day'] ?? '';
$timeSlot = $_GET['timeSlot'] ?? '';
$myTeacher =$user->get_user_by_id($teacher);
$myClass = $class->get_class_by_id($classId);
$room->set_id($roomId);
$myRoom = $room->get_room_by_id();
$mySubject = $subject->get_subject_by_id($subjectId);
                // var_dump($_GET);

?>
<form action="controllers/edit-timetable.php" method="POST">
    <div class="timetable container mt-5">
        <div class="row">
            <!-- Timetable Table -->
            <div class="col-md-8">
                <h3 class="text-center mt-3">Edit Timetable</h3>
                <table class="table table-striped table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $times = ['8:00 AM - 9:00 AM', '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 1:00 PM', '1:00 PM - 2:00 PM'];
                        foreach ($times as $index => $time): ?>
                            <tr>
                                <td><?= $time ?></td>
                                <?php foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $dayOfWeek): ?>
                                    <td>
                                        <input type="checkbox" name="schedule[<?= $index ?>][<?= $dayOfWeek ?>]" value="<?= $time ?>"
                                            class="form-check-input checkbox-large"
                                            <?= ($day === $dayOfWeek && $timeSlot === $time) ? 'checked' : '' ?>>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Display Conflict Errors -->
                <div class="errors">
                    <?php foreach ($conflictErrors as $error): ?>
                        <p class="text-danger"><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Side Form -->
            <div class="col-md-4">
                <h3 class="text-center">Assign Details</h3>
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

                <!-- Teacher Dropdown -->
<div class="mb-3">
    <label for="teacher" class="form-label">Teacher</label>
    <select name="teacher" id="teacher" class="form-select" required>
        <option value="" disabled>Select Teacher</option>
        <?php foreach ($teachers as $teacherOption): ?>
            <option value="<?= $myTeacher['unique_id'] ?>" <?= ($teacherOption['unique_id'] == $teacher) ? 'selected' : '' ?>>
                <?= $teacherOption['first_name'] . ' ' . $teacherOption['last_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                <!-- Class Dropdown -->
<div class="mb-3">
    <label for="class" class="form-label">Class</label>
    <select name="class" id="class" class="form-select" required>
        <option value="" disabled>Select Class</option>
        <?php foreach ($classes as $classOption): ?>
            <option value="<?= $classOption['class_name'] ?>" <?= ($classOption['class_name'] === $classId) ? 'selected' : '' ?>>
                <?= $classOption['class_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                <!-- Room Dropdown -->
<div class="mb-3">
    <label for="rm" class="form-label">Room</label>
    <select name="room" id="rm" class="form-select" required>
        <option value="" disabled>Select Room</option>
        <?php foreach ($rooms as $roomOption): ?>
            <option value="<?= $roomOption['id'] ?>" <?= ($roomOption['id'] === $roomId) ? 'selected' : '' ?>>
                <?= $roomOption['room_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                <!-- Subject Dropdown -->
<div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <select name="subject" id="subject" class="form-select" required>
        <option value="" disabled>Select Subject</option>
        <?php foreach ($subjects as $subjectOption): ?>
            <option value="<?= $subjectOption['sub_name'] ?>" <?= ($subjectOption['sub_name'] === $subjectId) ? 'selected' : '' ?>>
                <?= $subjectOption['sub_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
            </div>
        </div>
    </div>
</form>