<?php
require_once __DIR__ . "/School.php";

class StudentClass extends School
{
    private $database;
    private $class_name;
    public function __construct(Database $database){
        $this->database =  $database->getConnection();
    }

    public function set_class_name($class_name){
        $this->class_name = $class_name;
    }
    public function get_class_name(){
        return $this->class_name;
    }
    public function get_all_classes(){
        $sql = "SELECT * FROM class WHERE school_id = ?";
        return $this->database->execute_query($sql, [$this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }

    public function add_class()
    {
        $sql = "INSERT INTO class(class_name, school_id) VALUES(?, ?)";
        return $this->database->execute_query(query: $sql, params: [$this->get_class_name(), $this->getSchoolId()]);
    }
    public function is_class_present(){
        $sql = "SELECT * FROM class WHERE class_name = ? AND school_id = ?";
        return $this->database->execute_query(query: $sql, params: [$this->get_class_name(), $this->getSchoolId()])->fetch_assoc();
    }
}