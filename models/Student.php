<?php
require_once __DIR__ . "/../models/Users.php";
require_once __DIR__ . '/../config/autoloader.php';
// require_once __DIR__. "/../config/incidences.php";
class Student extends User
{
    private $student_id;
    private $RegNo;
    private $parent_id;
    public function set_student_id($student_id)
    {
        $this->student_id = $student_id;
    }
    public function get_student_id()
    {
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
    public function set_parent_id($parent_id)
    {
        $this->parent_id = $parent_id;
    }
    public function get_parent_id()
    {
        return $this->parent_id;
    }
    public function is_student_present($RegNo)
    {
        $sql = "SELECT * FROM student WHERE reg_no = ?";
        return $this->database->execute_query(query: $sql, params: [$RegNo])->fetch_assoc();
    }

    public function add_student($unique_id, $fname, $lname, $mname, $gender, $regNo, $RegDate, $class)
    {
        $sql = "INSERT INTO student(unique_id, first_name, last_name, middle_name, gender, reg_no, reg_date, class, school_id)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$unique_id, $fname, $mname, $lname, $gender, $regNo, $RegDate, $class, $this->getSchoolId()]);
    }
    public function get_students($school_id)
    {
        $sql = "SELECT * FROM student WHERE school_id = ? ORDER BY first_name, last_name";
        return $this->database->execute_query(query: $sql, params: [$school_id])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_students_by_parent_id()
    {
        $sql = "SELECT * FROM student WHERE parent_id = ? ORDER BY first_name, last_name";
        return $this->database->execute_query(query: $sql, params: [$this->get_parent_id()])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_student_by_id($student_id)
    {
        $sql = "SELECT * FROM student WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id])->fetch_assoc();
    }
    public function delete_student($student_id)
    {
        $sql = "UPDATE student SET status = ? WHERE unique_id = ?";
        return $this->database->execute_query($sql, ['deleted', $student_id]);
    }
    public function update_student($fname, $mname, $lname, $gender, $reg_no, $class, $student_id)
    {
        $sql = "UPDATE student SET first_name = ?, middle_name = ?, last_name = ?,  gender = ?, reg_no = ?,  class = ? WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$fname, $mname, $lname, $gender, $reg_no, $class, $student_id]);
    }

    public function get_student_by_class($class)
    {
        $sql = "SELECT * FROM student WHERE class = ?";
        return $this->database->execute_query(query: $sql, params: [$class])->fetch_all(MYSQLI_ASSOC);
    }
    public function update_parent_id($parent_id, $student_id)
    {
        $sql = "UPDATE student SET parent_id = ? WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$parent_id, $student_id]);
    }

    public function get_students_paginated($offset, $limit)
    {
        $sql = "SELECT * FROM student ORDER BY first_name, last_name LIMIT ?, ?";
        return $this->database->execute_query(query: $sql, params: [$offset, $limit])->fetch_all(MYSQLI_ASSOC);
    }

    public function count_students()
    {
        $sql = "SELECT COUNT(*) as total FROM student";
        return $this->database->execute_query(query: $sql)->fetch_assoc()['total'];
    }

}
