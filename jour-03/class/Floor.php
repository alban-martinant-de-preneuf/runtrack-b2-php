<?php

require_once "./class/Room.php";

class Floor {

    private ?int $id;
    private ?string $name;
    private ?int $level;

    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?int $level = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getLevel(): ?int {
        return $this->level;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }

    public function setLevel(?int $level): void {
        $this->level = $level;
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

    public function getRooms(): ?array
    {
        $query = "SELECT * FROM room WHERE floor_id = :id";
        $statement = $this->db_connect()->prepare($query);
        $statement->execute([":id" => $this->id]);
        $rooms = $statement->fetchAll(PDO::FETCH_ASSOC);

        $roomsList = [];
        foreach ($rooms as $room) {
            $roomsList[] = new Room(
                $room['id'],
                $room['floor_id'],
                $room['name'],
                $room['capacity']
            );
        }

        return $roomsList;
    }
}