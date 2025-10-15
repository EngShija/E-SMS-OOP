<?php
require_once __DIR__ . "/School.php";

class StudentFee extends School
{
    private $database;
    private $table = 'student_fees';

    public $id;
    public $student_id;
    public $structure_id;
    public $due_date;
    public $amount_due;
    public $school_id;

    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }

    // Create a student fee record
    public function create()
    {
        $query = "INSERT INTO {$this->table} (student_id, structure_id, due_date, amount_due, school_id) VALUES (?, ?, ?, ?, ?)";
        return $this->database->execute_query($query, [
            $this->student_id,
            $this->structure_id,
            $this->due_date,
            $this->amount_due,
            $this->getSchoolId()
        ]);
    }

    // Get student fee details by student_id
    public function read()
    {
        $query = "SELECT * FROM {$this->table} WHERE student_id = ?";
        return $this->database->execute_query($query, [$this->student_id])->fetch_assoc();
    }

    // Update student fee record
    public function update()
    {
        $query = "UPDATE {$this->table} SET structure_id = ?, due_date = ?, amount_due = ?, school_id = ? WHERE student_id = ?";
        return $this->database->execute_query($query, [
            $this->structure_id,
            $this->due_date,
            $this->amount_due,
            $this->school_id,
            $this->student_id
        ]);
    }

    // Delete student fee record
    public function delete()
    {
        $query = "DELETE FROM {$this->table} WHERE student_id = ?";
        return $this->database->execute_query($query, [$this->student_id]);
    }

    // Get all student fee records for a school
    public function getAllFees()
    {
        $query = "SELECT * FROM {$this->table} WHERE school_id = ?";
        return $this->database->execute_query($query, [$this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }

    // Get student fee by record ID
    public function getFeeById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->database->execute_query($query, [$id])->fetch_assoc();
    }
    
}