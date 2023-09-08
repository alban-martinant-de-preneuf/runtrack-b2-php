<?php

require_once "./class/Student.php";
require_once "./class/Grade.php";
require_once "./class/Room.php";
require_once "./class/Floor.php";
require_once "./function.php";

$student = findOneStudent(1);
$grade = findOneGrade(1);
$room = findOneRoom(4);
$floor = findOneFloor(1);

$students = $grade->getStudents();
$grades = $room->getGrades();
$rooms = $floor->getRooms();

