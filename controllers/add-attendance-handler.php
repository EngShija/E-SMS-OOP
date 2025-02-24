<?php
session_start();
require_once __DIR__. "/../models/Student.php";
require_once __DIR__. "/../models/Attendance.php";
require_once __DIR__. "/../includes/functions.php";

$attendance = new Attendance(new Database());

$student = new Student(new Database());

$attendance->set_date(date('Y-m-d'));

$attendance->set_day(date('l'));

$attendance->set_status(isset($_POST['status']) ? 'present' : 'absent');

$student->set_student_id($_POST['student_id']);

if(!$attendance->is_checked($attendance->get_date(), $student->get_student_id())){
    $attendance->add_attendance(
        $attendance->get_date(),
        $attendance->get_day(),
        $student->get_student_id(),
        $attendance->get_status());
        $_SESSION['attendanceAdded'] = 'Attendance Added';
        redirect_to('../dashboard.php?addAttendance');
}
else{
    $_SESSION['attendanceExist'] = 'Attendance Exists';
    redirect_to('../dashboard.php?addAttendance');
}

// echo $student->get_student_id();
// echo $attendance->get_status();
// echo $_POST['status'] ?? 'absent';