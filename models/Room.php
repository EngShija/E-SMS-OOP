<?php
require_once __DIR__ . "/School.php";

class Room extends School
{
    private $database;
    private $room_name;
    private $room_capacity;
    private $id;
    public function __construct(Database $database){
        $this->database =  $database->getConnection();
    }

    public function set_room_name($room_name){
        $this->room_name = $room_name;
    }
    public function get_room_name(){
        return $this->room_name;
    }
        public function set_room_capacity($room_capacity){
        $this->room_capacity = $room_capacity;
    }
    public function get_room_capacity(){
        return $this->room_capacity;
    }
        public function set_id($id){
        $this->id = $id;
    }
    public function get_id(){
        return $this->id;
    }
    public function get_all_rooms(){
        $sql = "SELECT * FROM room WHERE school_id = ?";
        return $this->database->execute_query($sql, [$this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }

    public function add_room()
    {
        $sql = "INSERT INTO room(room_name, capacity, school_id) VALUES(?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$this->get_room_name(), $this->get_room_capacity(), $this->getSchoolId()]);
    }
    public function is_room_present(){
        $sql = "SELECT * FROM room WHERE room_name = ? AND school_id = ?";
        return $this->database->execute_query(query: $sql, params: [$this->get_room_name(), $this->getSchoolId()])->fetch_assoc();
    }

    public function get_room_by_id(){
        $sql = "SELECT * FROM room WHERE id = ?";
        return $this->database->execute_query(query: $sql, params: [$this->get_id()])->fetch_assoc();
    }

    public function delete_room(){
        $sql = "DELETE FROM room WHERE id = ? AND school_id = ?";
        return $this->database->execute_query(query: $sql, params: [$this->get_id()]);
    }
}