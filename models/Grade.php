<?php
require_once __DIR__. "/../models/Database.php";
/**
 * Summary of Grade
 */
class Grade{
    private $database;
    private $start_from;
    private $end_to;
    private $grade;
    private $desc;
    /**
     * Summary of __construct
     * @param Database $database
     */
    public function __construct(Database $database){
        $this->database = $database->getConnection();
    }
    /**
     * Summary of set_start
     * @param mixed $start
     * @return void
     */
    public function set_start($start){
        $this->start_from = $start;
    }
    /**
     * Summary of set_end
     * @param mixed $end
     * @return void
     */
    public function set_end($end){
        $this->end_to = $end;
    }
    /**
     * Summary of set_grade
     * @param mixed $grade
     * @return void
     */
    public function set_grade($grade){
        $this->grade = $grade;
    }
    /**
     * Summary of set_desc
     * @param mixed $desc
     * @return void
     */
    public function set_desc($desc){
        $this->desc = $desc;
    }
    /**
     * Summary of get_start
     * @return mixed
     */
    public function get_start(){
        return $this->start_from;
    }
    /**
     * Summary of get_end
     * @return mixed
     */
    public function get_end(){
        return $this->end_to;
    }
    /**
     * Summary of get_grade
     * @return mixed
     */
    public function get_grade(){
        return $this->grade;
    }
    /**
     * Summary of get_desc
     * @return mixed
     */
    public function get_desc(){
        return $this->desc;
    }
    /**
     * Summary of add_grade
     * @param mixed $from
     * @param mixed $to
     * @param mixed $grade
     * @param mixed $desc
     * @return bool|mysqli_result
     */
    public function add_grade($from, $to, $grade, $desc){
        $sql = "INSERT INTO gredes(start_from, end_to, grade, description)
        VALUES(?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$from, $to, $grade, $desc]);
    }
}