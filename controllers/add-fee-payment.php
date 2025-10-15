<?php
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/FeePayment.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_fee_id = $_POST['student_fee_id'] ?? null;
    $amount_paid = $_POST['amount_paid'] ?? null;
    $payment_date = $_POST['payment_date'] ?? null;
    $mode = $_POST['mode'] ?? null;
    $transaction_id = $_POST['transaction_id'] ?? null;
    $receipt_no = $_POST['receipt_no'] ?? null;
    $uploaded_proof = $_POST['uploaded_proof'] ?? null; // For file uploads, handle $_FILES instead

    if ($student_fee_id && $amount_paid && $payment_date && $mode) {
        $db = new Database();
        $feePaymentModel = new FeePayment($db);
        $feePaymentModel->student_fee_id = $student_fee_id;
        $feePaymentModel->amount_paid = $amount_paid;
        $feePaymentModel->payment_date = $payment_date;
        $feePaymentModel->mode = $mode;
        $feePaymentModel->transaction_id = $transaction_id;
        $feePaymentModel->receipt_no = $receipt_no;
        $feePaymentModel->uploaded_proof = $uploaded_proof;
        $feePaymentModel->setSchoolId($_SESSION['school_id']);

        $result = $feePaymentModel->create();

        if ($result) {
            $_SESSION['success'] = "Fee payment added successfully!";
        } else {
            $_SESSION['error'] = "Failed to add fee payment.";
        }
    } else {
        $_SESSION['error'] = "All required fields must be filled.";
    }
}

header("Location: ../dashboard.php?feePayments=1");
exit;