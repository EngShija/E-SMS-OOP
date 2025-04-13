<?php
class School{
    private $database;
    protected $school_id;

    private $school_name;

    private $school_address;

    private $school_phone_number;

    private $school_email_address;

    public function __construct(private $db){
        $this->database = $db->getConnection();
    }
    public function setSchoolName($school_name){
        $this->school_name = $school_name;
    }
    public function setSchoolAddress($school_address){
        $this->school_address = $school_address;
    }
    public function setSchoolPhoneNumber($school_phone_number){
        $this->school_phone_number = $school_phone_number;
    }
    public function setSchoolEmailAddress($school_email_address){
        $this->school_email_address = $school_email_address;
    }
    public function getSchoolName(){
        return $this->school_name;
    }
    public function getSchoolAddress(){
        return $this->school_address;
    }
    public function getSchoolPhoneNumber(){
        return $this->school_phone_number;
    }
    public function getSchoolEmailAddress(){
        return $this->school_email_address;
    }
    public function setSchoolId($school_id){
        $this->school_id = $school_id;
    }
    public function getSchoolId(){
        return $this->school_id;
    }
    public function addSchoolDetails(){
        $query = "INSERT INTO school_details(school_name, school_address, school_phone_number, school_email_address) VALUES(?, ?, ?, ?)";
        $stmt = $this->database->prepare($query);
        $stmt->bind_param("ssss", $this->school_name, $this->school_address, $this->school_phone_number, $this->school_email_address);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function getSchoolDetails(){
        $query = "SELECT * FROM schools WHERE id = ?";
        return $this->database->execute_query($query, [$this->school_id])->fetch_assoc();
    }
}