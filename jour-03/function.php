<?php

require_once "./class/Student.php";
require_once "./class/Grade.php";
require_once "./class/Room.php";
require_once "./class/Floor.php";

function db_connect(): PDO
{
    $db = new PDO(
        'mysql:host=localhost;dbname=lp_official;charset=utf8',
        'root',
        ''
    );

    return $db;
}

function findOneStudent(int $id): Student
{
    $query = "SELECT * FROM student WHERE id = :id";
    $statement = db_connect()->prepare($query);
    $statement->execute([":id" => $id]);
    $student = $statement->fetch(PDO::FETCH_ASSOC);

    return (new Student(
            $student['id'],
            $student['grade_id'],
            $student['email'],
            $student['fullname'],
            new DateTime($student['birthdate']),
            $student['gender']
        )
    );
}

function findOneGrade(int $id): Grade
{
    $query = "SELECT * FROM grade WHERE id = :id";
    $statement = db_connect()->prepare($query);
    $statement->execute([":id" => $id]);
    $grade = $statement->fetch(PDO::FETCH_ASSOC);

    return (new Grade(
            $grade['id'],
            $grade['room_id'],
            $grade['name'],
            new DateTime($grade['year'])
        )
    );
}

function findOneFloor(int $id): Floor
{
    $query = "SELECT * FROM floor WHERE id = :id";
    $statement = db_connect()->prepare($query);
    $statement->execute([":id" => $id]);
    $floor = $statement->fetch(PDO::FETCH_ASSOC);

    return (new Floor(
            $floor['id'],
            $floor['name'],
            $floor['level']
        )
    );
}

function findOneRoom(int $id): Room
{
    $query = "SELECT * FROM room WHERE id = :id";
    $statement = db_connect()->prepare($query);
    $statement->execute([":id" => $id]);
    $room = $statement->fetch(PDO::FETCH_ASSOC);

    return (new Room(
            $room['id'],
            $room['floor_id'],
            $room['name'],
            $room['capacity']
        )
    );
}