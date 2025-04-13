<?php
include_once 'Database.php';

class FeeCategory {
    private $database;
    private $table = 'fee_categories';

    public $id;
    public $name;
    public $amount;

    public function __construct(Database $database) {
        $this->database = $database->getConnection();
    }

    // Create a new fee category
    public function create() {
        $query = "INSERT INTO " . $this->table . " (name, amount) VALUES (?, ?)";
        return $this->database->execute_query($query, [$this->name, $this->amount]);
    }

    // Get all fee categories
    public function read($school_id) {
        $query = "SELECT * FROM " . $this->table. " WHERE school_id = ?";
        return $this->database->execute_query($query, [$school_id])->fetch_all(MYSQLI_ASSOC);
    }

}
?>
