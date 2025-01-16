<?php
require_once __DIR__ . "/Database.php";
class Exam
{
    private $database;
    private $examName;
    private $yos;

    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }
    public function set_examName($examName)
    {
        $this->examName = $examName;
    }
    public function get_examName()
    {
        return $this->examName;
    }
    public function set_yos($yos)
    {
        $this->yos = $yos;
    }
    public function get_yos()
    {
        return $this->yos;
    }
    public function add_exam($exam_name){
        $sql = "INSERT INTO exam(exam_name) VALUES(?)";
        return $this->database->execute_query(query: $sql, params: [$exam_name]);
    }
    public function get_all_exams(){
        $sql = "SELECT * FROM exam";
        return $this->database->execute_query(query: $sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function is_exam_present($examName){
        $sql = "SELECT * FROM exam WHERE exam_name = ?";
        return $this->database->execute_query(query: $sql, params: [$examName])->fetch_assoc();
    }
    // public function match_exam_yos($exam_name, $yos){
    //     $sql = "SELECT * FROM exam WHERE exam_name = ? AND YOS = ?";
    //     return $this->database->execute_query(query: $sql, params: [$exam_name, $yos])->fetch_assoc();
    // }
}