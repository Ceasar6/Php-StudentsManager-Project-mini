<?php


namespace projectMini\src\StudentManager;


use projectMini\src\Student\Student;

class StudentManager
{
    protected $studentList = [];
    protected $filePath;

    public function __construct($filePath)
    {
        return $this->filePath = $filePath;
    }

    public function getDataJson()
    {
        $dataJson = file_get_contents($this->filePath);
        return json_decode($dataJson);
    }

    public function addStudent($student)
    {
        $students = $this->getDataJson();
        $data = [
            "fullName" => $student->fullName,
            "email" => $student->email,
            "address" => $student->address
        ];
        array_push($students, $data);
        $this->saveDataJson($students);
    }

    public function getStudents()
    {
        $students = $this->getDataJson();
        foreach ($students as $obj) {
            $student = new Student($obj->fullName, $obj->email, $obj->address);
            array_push($this->studentList, $student);
        }
        return $this->studentList;
    }

    public function saveDataJson($data)
    {
        $dataJson = json_encode($data);
        file_put_contents($this->filePath, $dataJson, JSON_PRETTY_PRINT);
    }

    public function deleteStudent($index)
    {
        $students = $this->getDataJson();
        array_splice($students, $index, 1);
        $this->saveDataJson($students);
    }

    public function updateStudent($student, $index)
    {
        $students = $this->getDataJson();
        $data = [
            "fullName" => $student->fullName,
            "email" => $student->email,
            "address" => $student->address
            ];
        $students[$index] = $data;
        $this->saveDataJson($students);

    }

    public function getStudentByIndex($index)
    {
        $dataArr = $this->getDataJson();
        return $student =  new Student($dataArr[$index]->fullName, $dataArr[$index]->email, $dataArr[$index]->address);
    }


}