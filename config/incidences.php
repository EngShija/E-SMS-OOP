<?php

$user = new User(new Database());

$parent = new studentParent(new Database());

$student = new Student(new Database());

$subject = new Subject(new Database());

$class = new StudentClass(new Database());

$exam = new Exam(new Database());

$result = new Results(new Database());

$pdf = new PDF();

