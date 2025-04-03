<?php
require_once __DIR__ . "/../models/Student.php";
require_once __DIR__ . "/../models/Class.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Attendance.php";

$class = new StudentClass(new Database());

$student = new Student(new Database());

$attendance = new Attendance(new Database());

$myStudent = $student->get_student_by_id($_GET['indidualAttendance']);

?>

<div class="d-flex justify-content-center">
    <div class="card bg-dark text-center text-light mb-3 mt-3" style="width: 30rem;">
        <div class="card-body">

            <h5 class="card-title" style="text-decoration: underline;">
                <?= strtoupper($myStudent['first_name']) . " " . strtoupper($myStudent['last_name']) ?>
            </h5>
            <table class="table table-striped card-item table-bordered table-dark" id="tbId">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($attendance->get_attendance_by_student_id($_GET['indidualAttendance']) as $myAttendance): ?>
                        <tr>
                            <td
                                title=" <?= strtoupper($myStudent['first_name']) . " " . strtoupper($myStudent['last_name']) ?>">
                                <?= $i ?>
                            </td>
                                <td
                                title=" <?= strtoupper($myStudent['first_name']) . " " . strtoupper($myStudent['last_name']) ?>">
                                <?= $myAttendance['day'] ?>
                            </td>
                
                            <td
                                title=" <?= strtoupper($myStudent['first_name']) . " " . strtoupper($myStudent['last_name']) ?>">
                                <?= $myAttendance['date'] ?></td>
                            <td>
                                <?php if ($myAttendance['status'] == 'absent'): ?>
                                    <p class="btn btn-danger btn-sm"
                                        title=" <?= strtoupper($myStudent['first_name']) . " " . strtoupper($myStudent['last_name']) ?>">
                                        <?= $myAttendance['status'] ?>
                                    </p>
                                <?php elseif ($myAttendance['status'] == 'present'): ?>
                                    <p class="btn btn-success btn-sm" title=" <?= strtoupper($myStudent['first_name']) . " " . strtoupper($myStudent['last_name']) ?>">
                                        <?= $myAttendance['status'] ?>
                                    </p>
                                <?php else: ?>
                                <td>
                                    <p class="btn btn-warning btn-sm"  title=" <?= strtoupper($myStudent['first_name']) . " " . strtoupper($myStudent['last_name']) ?>">Unavailable</p>
                                </td>
                            <?php endif ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </tbody>
            </table>