<?php

require_once "./class/Grade.php";

class Room
{

    private ?int $id;
    private ?int $floor;
    private ?string $name;
    private ?int $capacity;

    public function __construct(
        ?int $id = null,
        ?int $floor = null,
        ?string $name = null,
        ?int $capacity = null
    ) {
        $this->id = $id;
        $this->floor = $floor;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setFloor(?int $floor): void
    {
        $this->floor = $floor;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setCapacity(?int $capacity): void
    {
        $this->capacity = $capacity;
    }

    private function db_connect(): PDO
    {
        $db = new PDO(
            'mysql:host=localhost;dbname=lp_official;charset=utf8',
            'root',
            ''
        );
        return $db;
    }

    public function getGrades(): ?array
    {
        $query = ("SELECT * FROM grade WHERE room_id = :id");

        $statement = $this->db_connect()->prepare($query);
        $statement->execute([":id" => $this->id]);
        $rooms = $statement->fetchAll(PDO::FETCH_ASSOC);

        $room = [];

        foreach ($rooms as $room) {
            $roomsInstencies[] = new Grade(
                $room['id'],
                $room['room_id'],
                $room['name']
            );
        }

        return $room;
    }
}
