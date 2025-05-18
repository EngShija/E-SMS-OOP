<?php
$database = new Database();

$user = new User(new Database());

$parent = new studentParent(new Database());

$student = new Student(new Database());

$subject = new Subject(new Database());

$class = new StudentClass(new Database());

$exam = new Exam(new Database());

$result = new Results(new Database());

$attendance = new Attendance(new Database);

$timetable = new Timetable(new Database());

$pdf = new PDF();

$school = new School(new Database());

$room = new Room(new Database());