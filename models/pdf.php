<?php
require_once __DIR__ . "/../fpdf/fpdf.php";

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'I', 16);
        $this->Cell(0, 10, 'Examination Results', 0, 1, 'C');
        $this->Ln(10);
    }
    public function create_pdf()
    {
        return $this->SetFont('Arial', 'B', 12);
    }
    public function add_result_details($fname, $lname, $exam_name)
    {
        $this->Cell(0, 10, 'Student Name: ' . $fname . ' ' . $lname, 0, 1);
        $this->Cell(0, 10, 'Exam Type: ' . $exam_name, 0, 1);
        $this->Ln(10);
    }
    public function add_table_header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'Subject', 1);
        $this->Cell(30, 10, 'Marks', 1);
        $this->Cell(30, 10, 'Grade', 1);
        $this->Cell(30, 10, 'Point(s)', 1);
        $this->Cell(60, 10, 'Description', 1);
        $this->Ln();
    }
    public function add_result_contents($sub_name, $marks, $grade, $points, $desc)
    {
        $this->Cell(40, 10, $sub_name, 1);
        $this->Cell(30, 10, $marks, 1);
        $this->Cell(30, 10, $grade, 1);
        $this->Cell(30, 10, $points, 1);
        $this->Cell(60, 10, $desc, 1);
        $this->Ln();
    }
    public function add_result_summary($total_marks, $average, $average_grade, $desc, $division, $total_points)
    {
        $this->Cell(130, 10, 'Total Marks', 1);
        $this->Cell(60, 10, $total_marks, 1);
        $this->Ln();
        $this->Cell(130, 10, 'Average', 1);
        $this->Cell(60, 10, $average, 1);
        $this->Ln();
        $this->Cell(130, 10, 'Average grade', 1);
        $this->Cell(60, 10, $average_grade, 1);
        $this->Ln();
        $this->Cell(130, 10, 'Description', 1);
        $this->Cell(60, 10, $desc, 1);
        $this->Ln();
        $this->Cell(130, 10, 'Division', 1);
        $this->Cell(60, 10, $division, 1);
        $this->Ln();
        $this->Cell(130, 10, 'Points', 1);
        $this->Cell(60, 10, $total_points, 1);
        $this->Ln();
    }
    //TIMETABLE
    public function add_timetable_header($time_slot)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, $time_slot, 1);
        $this->Ln();
    }
    public function add_timetable_contents($day, $subject_name)
    {
        $this->Cell(40, 10, $day, 1);
        $this->Cell(30, 10, $subject_name, 1);
        $this->Ln();
    }
    public function save_pdf_to_server($dir, $name, $output)
    {
        return file_put_contents($dir . '/' . $name . '.' . 'pdf', $output);
    }

    public $headers = []; // Store dynamic headers

    // Set headers dynamically
    function setHeaders($headers) {
        $this->headers = $headers;
    }

    // function Footer(){
    //     $this->SetY(-10);
    //     $this->SetFont('Arial', 'I', 8);
    //     $this->Cell(0, 10, 'Page '. $this->PageNo(), 0, 0, 'C');

    // }
}
