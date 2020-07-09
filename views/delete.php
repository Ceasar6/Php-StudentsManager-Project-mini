<?php
include_once "../src/Student.php";
include_once "../src/StudentManager.php";

$index = (int)$_GET['index'];

$studentManager  =  new \projectMini\src\StudentManager\StudentManager("../data.json");
$studentManager->deleteStudent($index);

header("Location: ../index.php");