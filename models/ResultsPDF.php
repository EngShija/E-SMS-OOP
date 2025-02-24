<?php
class FPDFReport extends FPDF {
    private $headers = [];

    public function setHeaders($headers) {
        $this->headers = $headers;
    }

    // Header Function
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(190, 10, 'Student Results Report', 0, 1, 'C');
        $this->Ln(5);

        // Table Headers
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(15, 10, 'Pos', 1, 0, 'C');
        $this->Cell(50, 10, 'Student Name', 1, 0, 'C');

        foreach ($this->headers as $header) {
            $this->Cell(25, 10, $header, 1, 0, 'C');
        }

        $this->Cell(25, 10, 'Total', 1, 0, 'C');
        $this->Cell(25, 10, 'Average', 1, 1, 'C');
    }

    // Footer Function
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Function to Add Results to PDF
    public function addResults($results, $subjects) {
        $this->SetFont('Arial', '', 10);
        $position = 1;

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $total = 0;
                $this->Cell(15, 10, $position, 1, 0, 'C');
                $this->Cell(50, 10, $row['student_name'], 1, 0, 'L');

                foreach ($subjects as $subject) {
                    $score = $row[$subject];
                    $this->Cell(25, 10, $score, 1, 0, 'C');
                    $total += $score;
                }

                $average = $total / count($subjects);
                $this->Cell(25, 10, $total, 1, 0, 'C');
                $this->Cell(25, 10, number_format($average, 2), 1, 1, 'C');

                $position++;
            }
        } else {
            $this->Cell(190, 10, "No results found.", 1, 1, 'C');
        }
    }
}