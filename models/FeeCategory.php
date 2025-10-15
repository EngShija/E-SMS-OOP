<?php
require_once __DIR__ . "/School.php";

class FeeCategory extends School {
    private $database;
    private $table = 'fee_categories';

    public $id;
    public $name;
    public $description;

    public function __construct(Database $database) {
        $this->database = $database->getConnection();
    }

    // Create a new fee category
    public function create() {
        $query = "INSERT INTO {$this->table} (category_name, description, school_id) VALUES (?, ?, ?)";
        return $this->database->execute_query($query, [$this->name, $this->description, $this->getSchoolId()]);
    }

    // Get all fee categories for the current school
    public function read() {
        $query = "SELECT * FROM {$this->table} WHERE school_id = ?";
        return $this->database->execute_query($query, [$this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }

    // Get a single fee category by ID for the current school
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->database->execute_query($query, [$id, $this->getSchoolId()])->fetch_assoc();
    }

    // Update a fee category (only for the current school)
    public function update() {
        $query = "UPDATE {$this->table} SET category_name = ?, description = ? WHERE id = ?";
        return $this->database->execute_query($query, [$this->name, $this->description, $this->id]);
    }

    // Delete a fee category (only for the current school)
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->database->execute_query($query, [$this->id]);
    }
}