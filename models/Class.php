<?php
class StudentClass{
    private $class_name;
    public function set_class_name($class_name){
        $this->class_name = $class_name;
    }
    public function get_class_name(){
        return $this->class_name;
    }
}