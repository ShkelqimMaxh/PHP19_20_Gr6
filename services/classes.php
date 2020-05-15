<?php
class Student {
    private $studentName;
    private $studentEmail;
    private $studentAvatar;

    function __construct($studentName, $studentEmail, $studentAvatar){
        $this->studentName   = $studentName;
        $this->studentEmail  = $studentEmail;
        $this->studentAvatar = $studentAvatar;
    }
        function getName(){
            return $this->studentName;
        }
        function getEmail(){
            return $this->studentEmail;
        }
        function getAvatar(){
            return $this->studentAvatar;
        }
        function setName($newName){
            $this->studentName=$newName;
        }
        function setEmail($newEmail){
            $this->studentEmail=$newEmail;
        }
        function setAvatar($newAvatar){
            $this->studentAvatar = $newAvatar;
        }
}

class Teacher extends Student    {
    private $teacherSubject;

        function __construct($teacherName,$teacherEmail,$teacherAvatar, $teacherSubject){
            parent::__construct($teacherName,$teacherEmail,$teacherAvatar);
            $this->teacherSubject= $teacherSubject;
        }

        function getSubject(){
            return $this->teacherSubject;
        }
        function setSubject($newSubject){
            $this->teacherSubject = $newSubject;
        }
}