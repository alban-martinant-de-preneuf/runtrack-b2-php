<?php

require_once "./class/Student.php";
require_once "./class/Grade.php";
require_once "./class/Room.php";
require_once "./class/Floor.php";
require_once "./function.php";

$student = new Student(1, 1, "email@email.com", "Terry Cristinelli", new DateTime("1998-01-18"), "male");
$student2 = new Student();

$grade = new Grade(1, 1, "Bachelor 1", new DateTime("2023-01-09"));
$grade2 = new Grade();

$room = new Room(1, 1, "RDC Food and Drinks", 90);
$room2 = new Room();

$floor = new Floor(1, "Rez-de-chaussée", 0);
$floor2 = new Floor();

$students = $grade->getStudents();

var_dump($students);

var_dump(findOneStudent(5));
var_dump(findOneGrade(5));
var_dump(findOneRoom(5));
var_dump(findOneFloor(1));

