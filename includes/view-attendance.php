<?php
require_once __DIR__ . "/../models/Student.php";
require_once __DIR__ . "/../models/Attendance.php";
require_once __DIR__ . "/../includes/functions.php";

$attendance = new Attendance(new Database());

$student = new Student(new Database());

$attendance->set_date($_SESSION['date']);

$attendance->set_status(isset($_POST['status']) ? 'present' : 'absent');

?>

<h3 class="text-center"><?= strtoupper($_SESSION['student_class'] . " " . "(" . $_SESSION['date'] . ")") ?></h3>
<div class="scrollTb">
    <table class="table table-striped table-dark" id="tbId">
        <thead>
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Registration Number</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
            foreach ($student->get_student_by_class($_SESSION['student_class']) as $student): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><a href="dashboard.php?indidualAttendance=<?= $student['unique_id'] ?>" class="text-light"
                            style="text-decoration: none;"><?= strtoupper($student['first_name'] . " " . $student['middle_name'] . " " . $student['last_name']) ?></a>
                    </td>
                    <td title=" <?= strtoupper($student['first_name']) . " " . strtoupper($student['last_name']) ?>">
                        <?= $student['reg_no'] ?>
                    </td>
                    <?php if (!$attendance->is_checked($attendance->get_date(), $student['unique_id'])): ?>
                        <td title=" <?= strtoupper($student['first_name']) . " " . strtoupper($student['last_name']) ?>">
                            <p class="btn btn-warning btn-sm">Unavailable</p>
                        </td>
                    <?php else: ?>
                        <td>

                            <?php $myAttendance = $attendance->get_attendance_by_student_id_with_date($attendance->get_date(), $student['unique_id']); ?>
                            <?php if ($myAttendance['status'] == 'absent'): ?>
                                <p class="btn btn-danger btn-sm"
                                    title=" <?= strtoupper($student['first_name']) . " " . strtoupper($student['last_name']) ?>">
                                    <?= $myAttendance['status'] ?>
                                </p>
                            <?php else: ?>
                                <p class="btn btn-success btn-sm"
                                    title=" <?= strtoupper($student['first_name']) . " " . strtoupper($student['last_name']) ?>">
                                    <?= $myAttendance['status'] ?>
                                </p>
                            <?php endif ?>
                        </td>
                    <?php endif ?>
                </tr>

                <?php
                $i++;
            endforeach;
            ?>
        </tbody>
    </table>
</div>