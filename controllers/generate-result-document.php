<?php
$database = new Database();
$subjects = $subject->getSubjects();
$results = $database->getResults($subjects);

$pdf = new FPDFReport();
$pdf->setHeaders($subjects);
$pdf->AddPage();
$pdf->addResults($results, $subjects);
$pdf->Output();