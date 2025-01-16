<?php
class StudentClass{
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
        $sql = "SELECT * FROM class";
        return $this->database->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function add_class($class_name)
    {
        $sql = "INSERT INTO class(class_name) VALUES(?)";
        return $this->database->execute_query(query: $sql, params: [$class_name]);
    }
    public function is_class_present($class_name){
        $sql = "SELECT * FROM class WHERE class_name = ?";
        return $this->database->execute_query(query: $sql, params: [$class_name])->fetch_assoc();
    }
}