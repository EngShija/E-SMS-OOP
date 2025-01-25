<?php
class Attendance{
    private $database;
    private $date;
    private $status;
    public function __construct(Database $database){
        $this->database =  $database->getConnection();
    }
public function set_date($date){
    $this->date = $date;
}
public function get_date(){
    return $this->date;
}
public function set_status($status){
    $this->status = $status;
}
public function get_status(){
    return $this->status;
}
public function add_attendance($date, $student_id, $status){
    $sql = "INSERT INTO attendance(date, student_id, status) VALUES(?, ?, ?)";
    return $this->database->execute_query(query: $sql, params: [$date, $student_id, $status]);
}
public function is_checked($date, $student_id){
    $sql = "SELECT * FROM attendance WHERE date = ? AND student_id = ?";
    return $this->database->execute_query(query: $sql, params: [$date, $student_id])->num_rows > 0;
}
public function get_attendance_by_student_id_with_date($date, $student_id){
    $sql = "SELECT * FROM attendance WHERE date = ? AND student_id = ?";
    return $this->database->execute_query(query: $sql, params: [$date, $student_id])->fetch_assoc();
}
}