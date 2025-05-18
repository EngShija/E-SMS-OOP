<?php
require_once __DIR__ . "/Database.php";

require_once __DIR__ . "/School.php";

class Results extends School
{
    private $database;
    private $marks;
    private $grade;
    private $point;
    private $desc;
    private $division;

    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }
    public function set_marks($marks)
    {
        $this->marks = $marks;
    }
    public function get_marks()
    {
        return $this->marks;
    }
    public function set_grade($grade)
    {
        $this->grade = $grade;
    }
    public function get_grade()
    {
        return $this->grade;
    }
    public function set_description($desc)
    {
        $this->desc = $desc;
    }
    public function get_description()
    {
        return $this->desc;
    }
    public function set_point($point)
    {
        $this->point = $point;
    }
    public function get_point()
    {
        return $this->point;
    }
    public function set_division($division)
    {
        $this->division = $division;
    }
    public function get_division()
    {
        return $this->division;
    }

    public function add_results($student_id, $teacher_id, $subject_name, $exam_type,    $marks,    $grade,    $description, $point)
    {
        $sql = "INSERT INTO results(student_id, teacher_id,	subject_name,	exam_type, marks,	grade, description, point) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$student_id, $teacher_id, $subject_name, $exam_type,   $marks,    $grade,    $description, $point]);
    }
    public function is_result_present($student_id, $subject_name, $exam_type){
        $sql = "SELECT * FROM results WHERE student_id = ? AND subject_name = ? AND exam_type = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id, $subject_name, $exam_type])->fetch_assoc();
    }
    public function is_result_exist($student_id, $exam_type){
        $sql = "SELECT * FROM results WHERE student_id = ? AND exam_type = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id, $exam_type])->fetch_assoc();
    }
    public function get_results($student_id, $exam_type){
        $sql = "SELECT * FROM results WHERE student_id = ? AND exam_type = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id, $exam_type])->fetch_all(MYSQLI_ASSOC);
    }
public function get_results_by_student_id($student_id){
        $sql = "SELECT * FROM results WHERE student_id = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_point_array($student_id, $exam_type){
        $sql = "SELECT * FROM results WHERE student_id = ? AND exam_type = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id, $exam_type])->fetch_all(MYSQLI_ASSOC);
    }
    public function update_results_status($status, $exam_type){
        $sql = "UPDATE results SET status = ? WHERE exam_type = ?";
        return $this->database->execute_query(query: $sql, params: [$status, $exam_type]);
    }
    public function get_mark($student_id, $subject_name, $exam_type) {
    $sql = "SELECT marks FROM results WHERE student_id = ? AND subject_name = ? AND exam_type = ?";
    $stmt = $this->database->execute_query(query: $sql, params: [$student_id, $subject_name, $exam_type]);
    $row = $stmt->fetch_assoc();
    return $row ? $row['marks'] : null;
}
    public function get_result_grade($student_id, $subject_name, $exam_type) {
        $sql = "SELECT grade FROM results WHERE student_id = ? AND subject_name = ? AND exam_type = ?";
        $stmt = $this->database->execute_query(query: $sql, params: [$student_id, $subject_name, $exam_type]);
        $row = $stmt->fetch_assoc();
        return $row ? $row['grade'] : null;
    }
    public function get_result_description($student_id, $subject_name, $exam_type) {
        $sql = "SELECT description FROM results WHERE student_id = ? AND subject_name = ? AND exam_type = ?";
        $stmt = $this->database->execute_query(query: $sql, params: [$student_id, $subject_name, $exam_type]);
        $row = $stmt->fetch_assoc();
        return $row ? $row['description'] : null;
    }
}
