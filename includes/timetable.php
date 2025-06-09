<!-- filepath: c:\xampp\htdocs\E-SMS-OOP\includes\timetable.php -->
<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Class.php';
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../models/Subject.php';
require_once __DIR__ . '/../config/constants.php';

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
?>
<form action="controllers/timetable-handler.php" method="POST">
    <div class="timetable container mt-5">
        <div class="row">
            <!-- Timetable Table -->
            <div class="col-md-8">
                <em style="font-weight: bolder; font-size: 27px;">View Timetables:</em>
                <a href="#" data-bs-toggle="modal" data-bs-target="#teacherTmt" class="btn btn-primary">Teacher</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#classTimetable" class="btn btn-warning">Class</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#selectRoom" class="btn btn-success">Room</a>

                <h3 class="text-center mt-3">Class Timetable</h3>
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
                                <td><input type="checkbox" name="schedule[<?= $index ?>][monday]" value="<?= $time ?>"
                                        class="form-check-input checkbox-large"></td>
                                <td><input type="checkbox" name="schedule[<?= $index ?>][tuesday]" value="<?= $time ?>"
                                        class="form-check-input checkbox-large"></td>
                                <td><input type="checkbox" name="schedule[<?= $index ?>][wednesday]" value="<?= $time ?>"
                                        class="form-check-input checkbox-large"></td>
                                <td><input type="checkbox" name="schedule[<?= $index ?>][thursday]" value="<?= $time ?>"
                                        class="form-check-input checkbox-large"></td>
                                <td><input type="checkbox" name="schedule[<?= $index ?>][friday]" value="<?= $time ?>"
                                        class="form-check-input checkbox-large"></td>
                                <td><input type="checkbox" name="schedule[<?= $index ?>][saturday]" value="<?= $time ?>"
                                        class="form-check-input checkbox-large"></td>
                                <td><input type="checkbox" name="schedule[<?= $index ?>][sunday]" value="<?= $time ?>"
                                        class="form-check-input checkbox-large"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Display Conflict Errors -->
                <div class="errors">

                </div>
            </div>

            <!-- Side Form -->
            <div class="col-md-4">
                <h3 class="text-center">Assign Details</h3>
                <div class="mb-3">
                    <label for="teacher" class="form-label">Teacher</label>
                    <select name="teacher" id="teacher" class="form-select" required>
                        <option value="">Select Teacher</option>
                        <?php foreach ($teachers as $teacher): ?>
                            <option value="<?= $teacher['unique_id'] ?>">
                                <?= $teacher['first_name'] . ' ' . $teacher['last_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Class</label>
                    <select name="class" id="class" class="form-select" required>
                        <option value="">Select Class</option>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['id'] ?>"><?= $class['class_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="rm" class="form-label">Room</label>
                    <select name="room" id="rm" class="form-select" required>
                        <option value="">Select Room</option>
                        <?php foreach ($rooms as $roomm): ?>
                            <option value="<?= $roomm['id'] ?>"><?= $roomm['room_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <select name="subject" id="subject" class="form-select" required>
                        <option value="">Select Subject</option>
                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject['id'] ?>"><?= $subject['sub_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Timetable</button>
            </div>
        </div>
    </div>
</form>
<?php
include_once __DIR__ . "/../includes/select-teacher.php";
include_once __DIR__ . "/../includes/select-class.php";
include_once __DIR__ . "/../includes/select-room.php";
?>
<script src="assets/js/timetable.js"></script>