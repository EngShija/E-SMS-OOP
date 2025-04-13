<?php
require_once __DIR__ . "/Database.php";

class StudentFee
{
    private $database;
    private $table = 'student_fees';

    public $id;
    public $student_id;
    public $total_amount;
    public $balance;
    public $term;
    public $year;

    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }

    // Create a student fee record
    public function create()
    {
        $query = "INSERT INTO " . $this->table . "(student_id, total_amount, balance, term, year) VALUES (?, ?, ?, ?, ?)";
        return $this->database->execute_query($query, [$this->student_id, $this->total_amount, $this->balance, $this->term, $this->year]);
    }

    // Get student fee details
    public function read()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE student_id = ?";
        return $this->database->execute_query($query, [$this->student_id])->fetch_assoc();
    }
    // Update student fee record
    public function update()
    {
        $query = "UPDATE " . $this->table . " SET total_amount = ?, balance = ?, term = ?, year = ? WHERE student_id = ?";
        return $this->database->execute_query($query, [$this->total_amount, $this->balance, $this->term, $this->year, $this->student_id]);
    }
    // Delete student fee record
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE student_id = ?";
        return $this->database->execute_query($query, [$this->student_id]);
    }
    // Get all student fee records
    public function getAllFees($school_id)
    {
        $query = "SELECT * FROM " . $this->table. "WHERE school_id = ?";
        return $this->database->execute_query($query, [$school_id])->fetch_all(MYSQLI_ASSOC);
    }
    // Get student fee by ID
    public function getFeeById($id)
    {
        $query = "SELECT * FROM " . $this->table . "id = ?";
        return $this->database->execute_query($query, [$id])->fetch_assoc();
    }

}
