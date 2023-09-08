<?php

require_once "./class/Student.php";
require_once "./class/Grade.php";
require_once "./class/Room.php";
require_once "./class/Floor.php";

$student = new Student(1, 1, "email@email.com", "Terry Cristinelli", new DateTime("1998-01-18"), "male");
$student2 = new Student();

$grade = new Grade(1, 1, "Bachelor 1", new DateTime("2023-01-09"));
$grade2 = new Grade();

$room = new Room(1, 1, "RDC Food and Drinks", 90);
$room2 = new Room();

$floor = new Floor(1, "Rez-de-chaussée", 0);
$floor2 = new Floor();

var_dump($student2, $student);
var_dump($grade2, $grade);
var_dump($room2, $room);
var_dump($floor2, $floor);