<?php
require_once __DIR__ . "/../models/Users.php";
class Student extends User
{
    private $student_id;
    private $RegNo;
    public function set_student_id($student_id){
        $this->student_id = $student_id;
    }
    public function get_student_id(){
        return $this->student_id;
    }
    public function set_regNo($regNo)
    {
        $this->RegNo = $regNo;
    }
    public function get_regNo()
    {
        return $this->RegNo;
    }
    public function is_student_present($RegNo)
    {
        $sql = "SELECT * FROM student WHERE reg_no = ?";
        return $this->database->execute_query(query: $sql, params: [$RegNo])->fetch_assoc();
    }

    public function add_student($unique_id, $fname, $lname, $mname, $gender, $regNo, $RegDate, $class)
    {
        $sql = "INSERT INTO student(unique_id, first_name, last_name, middle_name, gender, reg_no, reg_date, class)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$unique_id, $fname, $mname, $lname, $gender, $regNo, $RegDate, $class]);
    }
    public function get_students()
    {
        $sql = "SELECT * FROM student ORDER BY first_name, last_name";
        return $this->database->execute_query(query: $sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function get_student_by_id($student_id)
    {
        $sql = "SELECT * FROM student WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id])->fetch_assoc();
    }
    public function delete_student($student_id)
    {
        $sql = "DELETE FROM student WHERE unique_id = ?";
        return $this->database->execute_query($sql, [$student_id]);
    }
    public function update_student($fname, $mname, $lname, $gender, $reg_no, $class,  $student_id)
    {
        $sql = "UPDATE student SET first_name = ?, middle_name = ?, last_name = ?,  gender = ?, reg_no = ?,  class = ? WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$fname, $mname, $lname, $gender, $reg_no, $class, $student_id]);
    }

    public function get_student_by_class($class)
    {
        $sql = "SELECT * FROM student WHERE class = ?";
        return $this->database->execute_query(query: $sql, params: [$class])->fetch_all(MYSQLI_ASSOC);
    }
}
