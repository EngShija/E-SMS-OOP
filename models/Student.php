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
        $sql = "SELECT * FROM student WHERE school_id = ? AND status <> 'deleted' ORDER BY first_name, last_name";
        return $this->database->execute_query(query: $sql, params: [$school_id])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_students_by_parent_id()
    {
        $sql = "SELECT * FROM student WHERE parent_id = ? ORDER BY first_name, last_name";
        return $this->database->execute_query(query: $sql, params: [$this->get_parent_id()])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_student_by_reg_no($reg_no)
    {
        $sql = "SELECT * FROM student WHERE reg_no = ? AND school_id = ?";
        return $this->database->execute_query(query: $sql, params: [$reg_no, $this->getSchoolId()])->fetch_assoc();
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
        $sql = "SELECT * FROM student WHERE class_id = ? AND school_id = ?";
        return $this->database->execute_query(query: $sql, params: [$class, $this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
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
        $sql = "SELECT COUNT(*) as total FROM student WHERE school_id = ?";
        return $this->database->execute_query(query: $sql, params: [$this->getSchoolId()])->fetch_assoc()['total'];
    }

    public function get_student_class_by_result_student_id($student_id) {
    $sql = "SELECT u.class_id 
            FROM results r 
            JOIN users u ON r.student_id = u.unique_id 
            WHERE r.student_id = ? LIMIT 1";
    $stmt = $this->database->execute_query(query: $sql, params: [$student_id]);
    $row = $stmt->fetch_assoc();
    return $row ? $row['class_id'] : null;
}
public function addStudents($data) {
    $sql = "INSERT INTO student (unique_id, first_name, middle_name, last_name, gender, reg_no, reg_date, class, school_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->database->prepare($sql);
    return $stmt->execute([
        $data['unique_id'],
        $data['first_name'],
        $data['middle_name'],
        $data['last_name'],
        $data['gender'],
        $data['reg_no'],
        $data['reg_date'],
        $data['class'],
        $data['school_id']
    ]);
}
}
