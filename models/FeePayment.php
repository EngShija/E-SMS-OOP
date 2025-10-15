<?php
require_once __DIR__ . "/School.php";

class FeePayment extends School {
    private $database;
    private $table = 'fee_payments';

    public $id;
    public $student_fee_id;
    public $amount_paid;
    public $payment_date;
    public $mode;
    public $transaction_id;
    public $receipt_no;
    public $uploaded_proof;

    public function __construct(Database $database) {
        $this->database = $database->getConnection();
    }

    // Create a fee payment record
    public function create() {
        $query = "INSERT INTO {$this->table} (student_fee_id, amount_paid, payment_date, mode, transaction_id, receipt_no, uploaded_proof, school_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query($query, [
            $this->student_fee_id,
            $this->amount_paid,
            $this->payment_date,
            $this->mode,
            $this->transaction_id,
            $this->receipt_no,
            $this->uploaded_proof,
            $this->getSchoolId()
        ]);
    }

    // Get payment history for a student fee (for current school)
    public function read() {
        $query = "SELECT * FROM {$this->table} WHERE student_fee_id = ? AND school_id = ?";
        return $this->database->execute_query($query, [$this->student_fee_id, $this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }

    // Update a fee payment record (for current school)
    public function update() {
        $query = "UPDATE {$this->table} SET amount_paid = ?, payment_date = ?, mode = ?, transaction_id = ?, receipt_no = ?, uploaded_proof = ? WHERE id = ? AND school_id = ?";
        return $this->database->execute_query($query, [
            $this->amount_paid,
            $this->payment_date,
            $this->mode,
            $this->transaction_id,
            $this->receipt_no,
            $this->uploaded_proof,
            $this->id,
            $this->getSchoolId()
        ]);
    }

    // Delete a fee payment record (for current school)
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->database->execute_query($query, [$this->id]);
    }

    // Get all fee payments for the current school
    public function getAllPayments() {
        $query = "SELECT * FROM {$this->table} WHERE school_id = ?";
        return $this->database->execute_query($query, [$this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }

    // Get a fee payment by ID for the current school
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->database->execute_query($query, [$id])->fetch_assoc();
    }
}