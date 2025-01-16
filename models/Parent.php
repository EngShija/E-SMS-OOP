<?php
require_once __DIR__ . "/../models/Users.php";
class studentParent extends User
{
    private $relation;

    public function set_relation($relation){
        $this->relation = $relation;
    }
    public function get_relation(){
        return $this->relation;
    }
    public function is_parent_exist($student_id)
    {
        $sql = "SELECT * FROM parent WHERE student_id = ?";
        return $this->database->execute_query(query: $sql, params: [$student_id])->num_rows < 1;
    }
    public function add_parent($unique_id, $student_id, $fname, $lname, $email, $phone, $gender, $adress, $relation, $password) {
        $sql = "INSERT INTO parent(unique_id, student_id, first_name, last_name, email_address, phone,  gender, physical_address,  relation, password)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$unique_id, $student_id, $fname, $lname, $email, $phone, $gender, $adress, $relation, $password]);
    }
    public function delete_parent($student_id)
    {
        $sql = "DELETE FROM parent WHERE student_id = ?";
        return $this->database->execute_query($sql, [$student_id]);
    }
    public function get_student_parent($student_id){
        $sql = "SELECT * FROM parent WHERE student_id = ?";
        return $this->database->execute_query(query: $sql, params:[$student_id])->fetch_assoc();
    }
    public function update_parent($fname, $lname, $email, $phone, $gender, $address, $relation,  $student_id)
    {
        $sql = "UPDATE parent SET first_name = ?, last_name = ?, email_address = ?, phone = ?,  gender = ?, physical_address = ?,  relation = ? WHERE student_id = ?";
        return $this->database->execute_query(query: $sql, params: [$fname, $lname, $email, $phone, $gender, $address, $relation,  $student_id]);
    }
    public function login_parent($email, $password){
        $sql = "SELECT * FROM parent WHERE email_address = ? AND password = ?";
        return $this->database->execute_query(query: $sql, params: [$email, $password])->fetch_assoc();
    }

    public function is_parent_present($email)
    {
        $sql = "SELECT * FROM parent WHERE email_address = ?";
        return $this->database->execute_query(query: $sql, params: [$email])->fetch_assoc();
    }
    public function get_parent_by_id($user_id){
        $sql = "SELECT * FROM parent WHERE student_id = ?";
        return $this->database->execute_query(query: $sql, params: [$user_id])->fetch_assoc();
    }
    public function user_role($email){
        $sql = "SELECT role FROM parent WHERE email_address = ?";
        return $this->database->execute_query($sql, [$email])->fetch_assoc();
    }
    public function get_parents()
    {
        $sql = "SELECT * FROM parent ORDER BY first_name, last_name";
        return $this->database->execute_query(query: $sql)->fetch_all(MYSQLI_ASSOC);
    }
}
