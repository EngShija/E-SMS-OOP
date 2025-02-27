<?php
require_once __DIR__ . "/Database.php";
/**
 * Summary of Timetable
 */
class Timetable
{
    private $database;
    private $day;
    private $time_slot;
    private $type;
    private $date;
    /**
     * Summary of __construct
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }
    public function set_day($day)
    {
        $this->day = $day;
    }
    public function get_day()
    {
        return $this->day;
    }
    public function set_date($date)
    {
        $this->date = $date;
    }
    public function get_date()
    {
        return $this->date;
    }
    public function set_time_slot($time_slot)
    {
        $this->time_slot = $time_slot;
    }
    public function get_time_slot()
    {
        return $this->time_slot;
    }
    public function set_type($type){
        $this->type = $type;
    }
    public function get_type(){
        return $this->type;
    }
    /**
     * Summary of add_timetable
     * @param mixed $subject_id
     * @param mixed $class_id
     * @param mixed $day
     * @param mixed $time_slot
     * @param mixed $type
     * @return bool|mysqli_result
     */
    public function add_timetable($subject_id, $class_id, $day, $time_slot, $type, $date, $exam_id, $yos){
        $sql = "INSERT INTO timetable(subject_id, class_id, day, time_slots, timetable_type, date, exam_id, yos) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$subject_id, $class_id, $day, $time_slot, $type, $date, $exam_id, $yos]);
    }
    public function is_space_free($class_id, $day, $time_slot, $yos){
        $sql = "SELECT * FROM timetable WHERE class_id = ? AND day = ? AND time_slots = ? AND yos =?";
        return $this->database->execute_query(query: $sql, params: [$class_id, $day, $time_slot, $yos])->fetch_all(MYSQLI_ASSOC);
    }
    public function is_space_free_for_exam($class_id, $date, $time_slot, $yos){
        $sql = "SELECT * FROM timetable WHERE class_id = ? AND date = ? AND time_slots = ? AND yos = ?";
        return $this->database->execute_query(query: $sql, params: [$class_id, $date, $time_slot, $yos])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_time_slots(){
        $sql = "SELECT DISTINCT time_slots FROM timetable ORDER BY time_slots";
        return $this->database->execute_query(query: $sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function get_timetable(){
        $sql = "SELECT * FROM timetable ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), time_slots";
        return $this->database->execute_query(query: $sql)->fetch_assoc();
    }
    public function delete_timetable_by_subject_id($subject_id){
        $sql = "DELETE FROM timetable WHERE subject_id = ?";
        return $this->database->execute_query(query: $sql, params: [$subject_id]);
    }
}