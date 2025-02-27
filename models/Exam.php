<?php
require_once __DIR__ . "/Database.php";
class Exam
{
    private $database;
    private $examName;
    private $yos;
    /**
     * Summary of __construct
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }
    /**
     * Summary of set_examName
     * @param mixed $examName
     * @return void
     */
    public function set_examName($examName)
    {
        $this->examName = $examName;
    }
    /**
     * Summary of get_examName
     * @return mixed
     */
    public function get_examName()
    {
        return $this->examName;
    }
    /**
     * Summary of set_yos
     * @param mixed $yos
     * @return void
     */
    public function set_yos($yos)
    {
        $this->yos = $yos;
    }
    /**
     * Summary of get_yos
     * @return mixed
     */
    public function get_yos()
    {
        return $this->yos;
    }
    /**
     * Summary of add_exam
     * @param mixed $exam_name
     * @return bool|mysqli_result
     */
    public function add_exam($exam_name){
        $sql = "INSERT INTO exam(exam_name) VALUES(?)";
        return $this->database->execute_query(query: $sql, params: [$exam_name]);
    }
    /**
     * Summary of get_all_exams
     * @return array
     */
    public function get_all_exams(){
        $sql = "SELECT * FROM exam";
        return $this->database->execute_query(query: $sql)->fetch_all(MYSQLI_ASSOC);
    }
    
    public function get_exam_by_id($exam_id){
        $sql = "SELECT * FROM exam WHERE id = ?";
        return $this->database->execute_query(query: $sql, params: [$exam_id])->fetch_assoc();
    }
    /**
     * Summary of is_exam_present
     * @param mixed $examName
     * @return array|bool|null
     */
    public function is_exam_present($examName){
        $sql = "SELECT * FROM exam WHERE exam_name = ?";
        return $this->database->execute_query(query: $sql, params: [$examName])->fetch_assoc();
    }
    public function delete_exam($exam_id){
        $sql = "DELETE FROM exam WHERE id = ?";
        return $this->database->execute_query(query: $sql, params: [$exam_id]);
    }
    public function edit_exam($exam_name, $exam_id)
    {
        $sql = "UPDATE exam SET exam_name = ? WHERE id = ?";
        return $this->database->execute_query(query: $sql, params: [$exam_name, $exam_id]);
    }
}