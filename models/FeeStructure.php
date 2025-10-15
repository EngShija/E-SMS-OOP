<?php
require_once __DIR__ . "/School.php";
class FeeStructure extends School {
    private $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function getByClass($classId) { 
        $stmt = $this->conn->prepare("SELECT * FROM fee_structures WHERE class_id = ?");
        $stmt->bind_param("i", $classId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function create($classId, $categoryId, $amount, $term) {
        $stmt = $this->conn->prepare("INSERT INTO fee_structures (class_id, category_id, amount, term) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iids", $classId, $categoryId, $amount, $term);
        return $stmt->execute();
    }
    public function update($id, $classId, $categoryId, $amount, $term) {
        $stmt = $this->conn->prepare("UPDATE fee_structures SET class_id = ?, category_id = ?, amount = ?, term = ? WHERE id = ?");
        $stmt->bind_param("iidsi", $classId, $categoryId, $amount, $term, $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM fee_structures WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM fee_structures WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM fee_structures");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}