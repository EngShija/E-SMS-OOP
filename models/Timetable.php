<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/School.php";
/**
 * Summary of Timetable
 */
class Timetable extends School
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
    public function set_type($type)
    {
        $this->type = $type;
    }
    public function get_type()
    {
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
    public function add_timetable($subject_id, $class_id, $day, $time_slot, $type, $date, $exam_id, $yos)
    {
        $sql = "INSERT INTO timetable(subject_id, class_id, day, time_slots, timetable_type, date, exam_id, yos) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$subject_id, $class_id, $day, $time_slot, $type, $date, $exam_id, $yos]);
    }
    public function is_space_free($class_id, $day, $time_slot, $yos)
    {
        $sql = "SELECT * FROM timetable WHERE class_id = ? AND day = ? AND time_slots = ? AND yos =?";
        return $this->database->execute_query(query: $sql, params: [$class_id, $day, $time_slot, $yos])->fetch_all(MYSQLI_ASSOC);
    }
    public function is_space_free_for_exam($class_id, $date, $time_slot, $yos)
    {
        $sql = "SELECT * FROM timetable WHERE class_id = ? AND date = ? AND time_slots = ? AND yos = ?";
        return $this->database->execute_query(query: $sql, params: [$class_id, $date, $time_slot, $yos])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_time_slots()
    {
        $sql = "SELECT DISTINCT time_slots FROM timetable ORDER BY time_slots";
        return $this->database->execute_query(query: $sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function get_timetable()
    {
        $sql = "SELECT * FROM timetable ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), time_slots";
        return $this->database->execute_query(query: $sql)->fetch_assoc();
    }
    public function delete_timetable_by_subject_id($subject_id)
    {
        $sql = "DELETE FROM timetable WHERE subject_id = ?";
        return $this->database->execute_query(query: $sql, params: [$subject_id]);
    }

    public function get_subject_id_by_name($subject_name)
    {
        $sql = "SELECT id FROM subjects WHERE sub_name = ?";
        return $this->database->execute_query(query: $sql, params: [$subject_name])->fetch_assoc()['id'];
    }

    public function update_timetable($class_id, $year_of_study, $day, $time_slot, $subject_id)
    {
        $sql = "UPDATE timetable SET subject_id = ? WHERE class_id = ? AND yos = ? AND day = ? AND time_slots = ?";
        return $this->database->execute_query(query: $sql, params: [$subject_id, $class_id, $year_of_study, $day, $time_slot]);
    }
    public function isClassAvailable($class, $day, $time, $school_id)
    {
        $classCheckSql = "SELECT * FROM timetable WHERE class_id = ? AND day = ? AND time_slots = ? AND school_id = ?";
        return $this->database->execute_query($classCheckSql, [$class, $day, $time, $school_id])->fetch_assoc();
    }
    public function isTeacherAvailable($teacher, $day, $time, $school_id)
    {
        $teacherCheckSql = "SELECT * FROM timetable WHERE teacher_id = ? AND day = ? AND time_slots = ? AND school_id = ?";
        return $this->database->execute_query($teacherCheckSql, [$teacher, $day, $time, $school_id])->fetch_assoc();
    }
    public function isRoomAvailable($room, $day, $time, $school_id)
    {
        $roomCheckSql = "SELECT * FROM timetable WHERE room_id = ? AND day = ? AND time_slots = ? AND school_id = ?";
        return $this->database->execute_query($roomCheckSql, [$room, $day, $time, $school_id])->fetch_assoc();
    }

public function getTimetableByClassId($class_id)
{
    $sql = "SELECT t.*, u.first_name AS teacher_name, s.sub_name 
            FROM timetable t
            JOIN users u ON t.teacher_id = u.unique_id
            JOIN subjects s ON t.subject_id = s.id
            WHERE t.class_id = ?";
    return $this->database->execute_query($sql, [$class_id])->fetch_all(MYSQLI_ASSOC);
}

public function getTimetableByRoomId($room_id)
{
    $sql = "SELECT t.*, u.first_name AS teacher_name, c.class_name, s.sub_name 
            FROM timetable t
            JOIN users u ON t.teacher_id = u.unique_id
            JOIN class c ON t.class_id = c.id
            JOIN subjects s ON t.subject_id = s.id
            WHERE t.room_id = ?";
    return $this->database->execute_query($sql, [$room_id])->fetch_all(MYSQLI_ASSOC);
}
public function getTimetableByTeacherId($teacher_id)
{
    $sql = "SELECT t.id, t.day, t.time_slots, t.teacher_id, s.sub_name, c.class_name, t.room_id 
            FROM timetable t
            JOIN subjects s ON t.subject_id = s.id
            JOIN class c ON t.class_id = c.id
            WHERE t.teacher_id = ?";
    return $this->database->execute_query($sql, [$teacher_id])->fetch_all(MYSQLI_ASSOC);
}
public function deleteTimetableEntry($id)
{
    $sql = "DELETE FROM timetable WHERE id = ?";
    $result = $this->database->execute_query($sql, [$id]);

    if ($result) {
        error_log("Timetable entry with ID $id deleted successfully."); // Debugging
    } else {
        error_log("Failed to delete timetable entry with ID $id."); // Debugging
    }

    return $result;
}
  public function updateTimetable($id, $teacher, $class, $room, $subject, $day, $timeSlot) {
        $sql = "UPDATE timetable SET teacher_id = ?, class_id = ?, room_id = ?, subject_id = ?, day = ?, time_slots = ? WHERE id = ?";
        return $this->database->execute_query($sql, [$teacher, $class, $room, $subject, $day, $timeSlot, $id]);
    }
}