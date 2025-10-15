<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/FeePayment.php';
require_once __DIR__ . '/../models/StudentFee.php';

// Fetch all fee payments for the current school
$db = new Database();
$feePaymentModel = new FeePayment($db);
$feePaymentModel->setSchoolId($_SESSION['school_id']);
$payments = $feePaymentModel->getAllPayments();

// Fetch all student fees for the dropdown
$studentFeeModel = new StudentFee($db);
$studentFeeModel->setSchoolId($_SESSION['school_id']);
$studentFees = $studentFeeModel->getAllFees();
?>

<div class="row mt-4">
    <!-- Left: Fee Payments List Table -->
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">
                <strong>Fee Payments List</strong>
            </div>
            <div class="card-body">
                <?php if ($payments && count($payments) > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Fee ID</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Mode</th>
                                <th>Transaction ID</th>
                                <th>Receipt No</th>
                                <th>Proof</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payments as $i => $pay): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= htmlspecialchars($pay['student_fee_id']) ?></td>
                                    <td><?= htmlspecialchars($pay['amount_paid']) ?></td>
                                    <td><?= htmlspecialchars($pay['payment_date']) ?></td>
                                    <td><?= htmlspecialchars($pay['mode']) ?></td>
                                    <td><?= htmlspecialchars($pay['transaction_id']) ?></td>
                                    <td><?= htmlspecialchars($pay['receipt_no']) ?></td>
                                    <td><?= htmlspecialchars($pay['uploaded_proof']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No fee payments found.</div>                                                                                  
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Right: Add Fee Payment Form -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <strong>Add Fee Payment</strong>
            </div>
            <div class="card-body">
                <form action="controllers/add-fee-payment.php" method="post" id="addFeePaymentForm">
                    <div class="mb-3">
                        <label for="student_fee_id" class="form-label">Student Fee</label>
                        <select name="student_fee_id" id="student_fee_id" class="form-select" required>
                            <option value="">Select Student Fee</option>
                            <?php foreach ($studentFees as $sf): ?>
                                <option value="<?= htmlspecialchars($sf['id']) ?>">
                                    <?= htmlspecialchars($sf['student_id']) ?> (Due:
                                    <?= htmlspecialchars($sf['amount_due']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount_paid" class="form-label">Amount Paid</label>
                        <input type="number" step="0.01" min="0" name="amount_paid" id="amount_paid"
                            class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Payment Date</label>
                        <input type="date" name="payment_date" id="payment_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="mode" class="form-label">Payment Mode</label>
                        <input type="text" name="mode" id="mode" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="transaction_id" class="form-label">Transaction ID</label>
                        <input type="text" name="transaction_id" id="transaction_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="receipt_no" class="form-label">Receipt No</label>
                        <input type="text" name="receipt_no" id="receipt_no" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="uploaded_proof" class="form-label">Proof (URL or filename)</label>
                        <input type="text" name="uploaded_proof" id="uploaded_proof" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Add Fee Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>