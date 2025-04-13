<?php
include_once 'Database.php';

class FeePayment {
    private $database;
    private $table = 'fee_payments';

    public $id;
    public $student_fee_id;
    public $amount_paid;
    public $payment_date;
    public $mode;
    public $receipt_no;
    public $uploaded_proof;

    public function __construct(Database $database) {
        $this->database = $database->getConnection();
    }

    // Create a fee payment record
    public function create() {
        $query = "INSERT INTO " . $this->table . "(student_fee_id, amount_paid, payment_date, mode, receipt_no, uploaded_proof) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query($query, [$this->student_fee_id, $this->amount_paid, $this->payment_date, $this->mode, $this->receipt_no, $this->uploaded_proof]);
    }

    // Get payment history for a student
    public function read() {
        $query = "SELECT * FROM " . $this->table . " WHERE student_fee_id = ?";
        return $this->database->execute_query($query, [$this->student_fee_id])->fetch_all(MYSQLI_ASSOC);
    }
    // Update a fee payment record
    public function update() {
        $query = "UPDATE " . $this->table . " SET amount_paid = ?, payment_date = ?, mode = ?, receipt_no = ?, uploaded_proof = ? WHERE id = ?";
        return $this->database->execute_query($query, [$this->amount_paid, $this->payment_date, $this->mode, $this->receipt_no, $this->uploaded_proof, $this->id]);
    }
    // Delete a fee payment record
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        return $this->database->execute_query($query, [$this->id]);
    }
    // Get all fee payments for a specific school
    public function getAllPayments($school_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE school_id = ?";
        return $this->database->execute_query($query, [$school_id])->fetch_all(MYSQLI_ASSOC);
    }
    // Get a fee payment by ID
}
?>
