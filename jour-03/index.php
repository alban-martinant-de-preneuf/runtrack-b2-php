<?php

require_once "./class/Student.php";

$student = new Student(1, 1, "email@email.com", "Terry Cristinelli", new DateTime("1998-01-18"), "male");
$student2 = new Student();

var_dump($student2, $student);