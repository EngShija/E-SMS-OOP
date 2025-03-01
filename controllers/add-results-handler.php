<?php
session_start();
require_once __DIR__. "/../config/autoloader.php";
require_once __DIR__. "/../config/incidences.php";
require_once __DIR__ . "/../includes/functions.php";

$myStudent = $student->get_student_by_id($_SESSION['stdId']);

$result->set_marks(validate_input($_POST['marks']));
$subject->set_subjectName($_POST['subject']);
$student->set_student_id($_SESSION['stdId']);
$exam->set_examName(validate_input($_POST['exam']));
$exam->set_yos(validate_input($_POST['yos']));
$student->set_fname($myStudent['first_name']);
$student->set_lname($myStudent['last_name']);

$myResult = $result->get_results($_SESSION['stdId'],  $exam->get_examName() . " " . $exam->get_yos());

if (!$result->is_result_present($student->get_student_id(), $subject->get_subjectName(), $exam->get_examName() . " " . $exam->get_yos())) {
    if ($result->get_marks() >= 0 && $result->get_marks() <= 29) {
        $result->set_grade('F');
        $result->set_description('Fail');
        $result->set_point(7);
    } elseif ($result->get_marks() >= 30 && $result->get_marks() <= 39) {
        $result->set_grade('S');
        $result->set_description('Very Poor');
        $result->set_point(6);
    } elseif ($result->get_marks() >= 40 && $result->get_marks() <= 49) {
        $result->set_grade('E');
        $result->set_description('Poor');
        $result->set_point(5);
    } elseif ($result->get_marks() >= 50 && $result->get_marks() <= 59) {
        $result->set_grade('D');
        $result->set_description('Stisfactory');
        $result->set_point(4);
    } elseif ($result->get_marks() >= 60 && $result->get_marks() <= 69) {
        $result->set_grade('C');
        $result->set_description('Good');
        $result->set_point(3);
    } elseif ($result->get_marks() >= 70 && $result->get_marks() <= 74) {
        $result->set_grade('B');
        $result->set_description('Very Good');
        $result->set_point(2);
    } elseif ($result->get_marks() >= 75 && $result->get_marks() <= 100) {
        $result->set_grade('A');
        $result->set_description('Excellent');
        $result->set_point(1);
    } else {
        $_SESSION['invalid'] = 'value';
        redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    }
    if ($result->add_results($student->get_student_id(), $_SESSION['user_id'], $subject->get_subjectName(), $exam->get_examName() . " " . $exam->get_yos(), $result->get_marks(), $result->get_grade(), $result->get_description(), $result->get_point())) {
        $pdf->AddPage();
        $pdf->create_pdf();
        $pdf->add_result_details(strtoupper($student->get_fname()), strtoupper($student->get_lname()), $exam->get_examName() . " " . $exam->get_yos());
        $pdf->add_table_header();

        $pdf->SetFont('Arial', '', 12);
        $totalMarks = 0;
        $subjectCount = 0;
        foreach ($result->get_results($_SESSION['stdId'],  $exam->get_examName() . " " . $exam->get_yos()) as $results) {
            $pdf->add_result_contents($results['subject_name'], $results['marks'], $results['grade'], $results['point'], $results['description']);
            $totalMarks += $results['marks'];
            $subjectCount++;
        }

        if (round($totalMarks / $subjectCount) >= 0 && round($totalMarks / $subjectCount) <= 29) {
            $result->set_grade('F');
            $result->set_description('Fail');
        } elseif ($result->get_marks() >= 30 && $result->get_marks() <= 39) {
            $result->set_grade('S');
            $result->set_description('Very Poor');
        } elseif (round($totalMarks / $subjectCount) >= 40 && round($totalMarks / $subjectCount) <= 49) {
            $result->set_grade('E');
            $result->set_description('Poor');
        } elseif (round($totalMarks / $subjectCount) >= 50 && round($totalMarks / $subjectCount) <= 59) {
            $result->set_grade('D');
            $result->set_description('Stisfactory');
        } elseif (round($totalMarks / $subjectCount) >= 60 && round($totalMarks / $subjectCount) <= 69) {
            $result->set_grade('C');
            $result->set_description('Good');
        } elseif (round($totalMarks / $subjectCount) >= 70 && round($totalMarks / $subjectCount) <= 74) {
            $result->set_grade('B');
            $result->set_description('Very Good');
        } elseif (round($totalMarks / $subjectCount) >= 75 && round($totalMarks / $subjectCount) <= 100) {
            $result->set_grade('A');
            $result->set_description('Excellent');
        }

        $pointsArray  = [];
        $totalPoints = 0;
        foreach ($result->get_results($_SESSION['stdId'],  $exam->get_examName() . " " . $exam->get_yos()) as $point) {
            $pointsArray[] = $point['point'];
        }
        sort($pointsArray);
        $sevenSmallestPoints = array_slice($pointsArray, 0, 7);
        $totalPoints = array_sum($sevenSmallestPoints);

        
        if ($totalPoints >= 7 && $totalPoints <= 17) {
            $result->set_division('I');
        } elseif ($totalPoints >= 18 && $totalPoints <= 21) {
            $result->set_division('II');
        } elseif ($totalPoints >= 22 && $totalPoints <= 23) {
            $result->set_division('III');
        } elseif ($totalPoints >= 24 && $totalPoints <= 33) {
            $result->set_division('IV');
        } elseif ($totalPoints >= 34 && $totalPoints <= 35) {
            $result->set_division('0');
        } else {  
            $division = 'Invalid';
        }

        $pdf->Ln();
        $pdf->add_result_summary($totalMarks, round($totalMarks / $subjectCount), $result->get_grade(), $result->get_description(),    $result->get_division(), $totalPoints);
        $pdf->save_pdf_to_server('../documents', strtoupper($student->get_fname()) . ' ' . strtoupper($student->get_lname()) ."-RST". $myStudent['id'].  '(' .  $exam->get_examName() .  $exam->get_yos() . ')', $pdf->Output('S'));

        $_SESSION['resultAdded'] = $subject->get_subjectName();
        redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
    }
} else {
    redirect_to("../dashboard.php?updatestd={$_SESSION['stdId']}");
}
