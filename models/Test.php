<?php
include_once 'Database.php';
include_once 'FeeCategory.php';
include_once 'StudentFee.php';
include_once 'FeePayment.php';

// Initialize database connection
$database = new Database();

// Example: Add a new fee category
$feeCategory = new FeeCategory($database);
$feeCategory->name = "Tuition Fee";
$feeCategory->amount = 500.00;
$feeCategory->create();

// Example: Add a new student fee
$studentFee = new StudentFee($database);
$studentFee->student_id = 1;
$studentFee->total_amount = 500.00;
$studentFee->balance = 500.00;
$studentFee->term = "Fall";
$studentFee->year = 2025;
$studentFee->create();

// Example: Add a payment
$feePayment = new FeePayment($database);
$feePayment->student_fee_id = 1;
$feePayment->amount_paid = 250.00;
$feePayment->payment_date = "2025-04-10";
$feePayment->mode = "Bank Transfer";
$feePayment->receipt_no = "ABC123";
$feePayment->uploaded_proof = "receipt.jpg";
$feePayment->create();
?>
