<?php
session_start();
require_once "../models/Results.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../models/Student.php";
require_once __DIR__ . "/../models/Subject.php";
require_once __DIR__ . "/../models/Exam.php";
require_once __DIR__ . "/../models/pdf.php";
$myResult = new Results(new Database());
$student = new Student(new Database());
$subject = new Subject(new Database());
$exam = new Exam(new Database());
$pdf = new PDF();
$myStudent = $student->get_student_by_id($_SESSION['stdId']);

$myResult->set_marks(validate_input($_POST['marks']));
$subject->set_subjectName($_POST['subject']);
$student->set_student_id($_SESSION['stdId']);
$exam->set_examName(validate_input($_POST['exam']));
$exam->set_yos(validate_input($_POST['yos']));
$student->set_fname($myStudent['first_name']);
$student->set_lname($myStudent['last_name']);

$result = $myResult->get_results($_SESSION['stdId'],  $exam->get_examName());

if (!$myResult->is_result_present($student->get_student_id(), $subject->get_subjectName(), $exam->get_examName() . " " . $exam->get_yos())) {
    if ($myResult->get_marks() >= 0 && $myResult->get_marks() <= 29) {
        $myResult->set_grade('F');
        $myResult->set_description('Fail');
        $myResult->set_point(7);
    } elseif ($myResult->get_marks() >= 30 && $myResult->get_marks() <= 39) {
        $myResult->set_grade('S');
        $myResult->set_description('Very Poor');
        $myResult->set_point(6);
    } elseif ($myResult->get_marks() >= 40 && $myResult->get_marks() <= 49) {
        $myResult->set_grade('E');
        $myResult->set_description('Poor');
        $myResult->set_point(5);
    } elseif ($myResult->get_marks() >= 50 && $myResult->get_marks() <= 59) {
        $myResult->set_grade('D');
        $myResult->set_description('Stisfactory');
        $myResult->set_point(4);
    } elseif ($myResult->get_marks() >= 60 && $myResult->get_marks() <= 69) {
        $myResult->set_grade('C');
        $myResult->set_description('Good');
        $myResult->set_point(3);
    } elseif ($myResult->get_marks() >= 70 && $myResult->get_marks() <= 74) {
        $myResult->set_grade('B');
        $myResult->set_description('Very Good');
        $myResult->set_point(2);
    } elseif ($myResult->get_marks() >= 75 && $myResult->get_marks() <= 100) {
        $myResult->set_grade('A');
        $myResult->set_description('Excellent');
        $myResult->set_point(1);
    } else {
        $_SESSION['invalid'] = 'value';
        redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    }
    if ($myResult->add_results($student->get_student_id(), $subject->get_subjectName(), $exam->get_examName() . " " . $exam->get_yos(), $myResult->get_marks(), $myResult->get_grade(), $myResult->get_description(), $myResult->get_point())) {
        $pdf->AddPage();
        $pdf->create_pdf();
        $pdf->add_result_details($student->get_fname(), $student->get_lname(), $exam->get_examName() . " " . $exam->get_yos());
        $pdf->add_table_header();

        $pdf->SetFont('Arial', '', 12);
        $totalMarks = 0;
        $subjectCount = 0;
        foreach ($myResult->get_results($_SESSION['stdId'],  $exam->get_examName() . " " . $exam->get_yos()) as $result) {
            $pdf->add_result_contents($result['subject_name'], $result['marks'], $result['grade'], $result['point'], $result['description']);
            $totalMarks += $result['marks'];
            $subjectCount++;
        }

        if (round($totalMarks / $subjectCount) >= 0 && round($totalMarks / $subjectCount) <= 29) {
            $myResult->set_grade('F');
            $myResult->set_description('Fail');
        } elseif ($myResult->get_marks() >= 30 && $myResult->get_marks() <= 39) {
            $myResult->set_grade('S');
            $myResult->set_description('Very Poor');
        } elseif (round($totalMarks / $subjectCount) >= 40 && round($totalMarks / $subjectCount) <= 49) {
            $myResult->set_grade('E');
            $myResult->set_description('Poor');
        } elseif (round($totalMarks / $subjectCount) >= 50 && round($totalMarks / $subjectCount) <= 59) {
            $myResult->set_grade('D');
            $myResult->set_description('Stisfactory');
        } elseif (round($totalMarks / $subjectCount) >= 60 && round($totalMarks / $subjectCount) <= 69) {
            $myResult->set_grade('C');
            $myResult->set_description('Good');
        } elseif (round($totalMarks / $subjectCount) >= 70 && round($totalMarks / $subjectCount) <= 74) {
            $myResult->set_grade('B');
            $myResult->set_description('Very Good');
        } elseif (round($totalMarks / $subjectCount) >= 75 && round($totalMarks / $subjectCount) <= 100) {
            $myResult->set_grade('A');
            $myResult->set_description('Excellent');
        }

        $pointsArray  = [];
        $totalPoints = 0;
        foreach ($myResult->get_results($_SESSION['stdId'],  $exam->get_examName() . " " . $exam->get_yos()) as $point) {
            $pointsArray[] = $point['point'];
        }
        sort($pointsArray);
        $sevenSmallestPoints = array_slice($pointsArray, 0, 7);
        $totalPoints = array_sum($sevenSmallestPoints);

        
        if ($totalPoints >= 7 && $totalPoints <= 17) {
            $myResult->set_division('I');
        } elseif ($totalPoints >= 18 && $totalPoints <= 21) {
            $myResult->set_division('II');
        } elseif ($totalPoints >= 22 && $totalPoints <= 23) {
            $myResult->set_division('III');
        } elseif ($totalPoints >= 24 && $totalPoints <= 33) {
            $myResult->set_division('IV');
        } elseif ($totalPoints >= 34 && $totalPoints <= 35) {
            $myResult->set_division('0');
        } else {  
            $division = 'Invalid';
        }

        $pdf->Ln();
        $pdf->add_result_summary($totalMarks, round($totalMarks / $subjectCount), $myResult->get_grade(), $myResult->get_description(),    $myResult->get_division(), $totalPoints);
        $pdf->save_pdf_to_server('../documents', strtoupper($student->get_fname()) . ' ' . strtoupper($student->get_lname()) . '(' .  $exam->get_examName() .  $exam->get_yos() . ')', $pdf->Output('S'));


        redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    }
} else {
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
