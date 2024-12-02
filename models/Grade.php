<?php
require_once __DIR__. "/../models/Database.php";
class Grade{
    private $database;
    private $start_from;
    private $end_to;
    private $grade;
    private $desc;
    public function __construct(Database $database){
        $this->database = $database->getConnection();
    }
    public function set_start($start){
        $this->start_from = $start;
    }
    public function set_end($end){
        $this->end_to = $end;
    }
    public function set_grade($grade){
        $this->grade = $grade;
    }
    public function set_desc($desc){
        $this->desc = $desc;
    }
    public function get_start(){
        return $this->start_from;
    }
    public function get_end(){
        return $this->end_to;
    }
    public function get_grade(){
        return $this->grade;
    }
    public function get_desc(){
        return $this->desc;
    }
    public function add_grade($from, $to, $grade, $desc){
        $sql = "INSERT INTO gredes(start_from, end_to, grade, description)
        VALUES(?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$from, $to, $grade, $desc]);
    }
}