<?php
require_once __DIR__ . "/Database.php";
class Subject
{
    private $database;
    private $subjectName;
    private $subjectCategory;

    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }
    public function set_subjectName($subjectName)
    {
        $this->subjectName = $subjectName;
    }
    public function get_subjectName()
    {
        return $this->subjectName;
    }
    public function set_subjectCategory($subjectCategory)
    {
        $this->subjectCategory = $subjectCategory;
    }
    public function get_subjectCategory()
    {
        return $this->subjectCategory;
    }
    public function is_subject_present($subjectName){
        $sql = "SELECT * FROM subjects WHERE sub_name = ?";
        return $this->database->execute_query(query: $sql, params: [$subjectName])->fetch_assoc();
    }
    public function add_subject($subjectName, $subjectCategory)
    {
        $sql = "INSERT INTO subjects(sub_name, category	) VALUES(?, ?)";
        return $this->database->execute_query(query: $sql, params: [$subjectName, $subjectCategory]);
    }

    public function get_all_subjects(){
        $sql = "SELECT * FROM subjects ORDER BY sub_name";
        return $this->database->execute_query(query: $sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function add_subject_category($subjectCategory)
    {
        $sql = "INSERT INTO subject_category(category) VALUES(?)";
        return $this->database->execute_query(query: $sql, params: [$subjectCategory]);
    }
    public function is_subject_category_present($subjectCategory){
        $sql = "SELECT * FROM subject_category WHERE category = ?";
        return $this->database->execute_query(query: $sql, params: [$subjectCategory])->fetch_assoc();
    }
    public function get_all_subject_categories(){
        $sql = "SELECT * FROM subject_category";
        return $this->database->execute_query(query: $sql);
    }

}
