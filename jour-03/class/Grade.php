<?php

class Grade {

    private ?int $id;
    private ?int $room_id;
    private ?string $name;
    private ?DateTime $year;

    public function __construct(
        ?int $id = null,
        ?int $room_id = null,
        ?string $name = null,
        ?DateTime $year = null
    ) {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getRoomId(): ?int {
        return $this->room_id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getYear(): ?DateTime {
        return $this->year;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setRoomId(?int $room_id): void {
        $this->room_id = $room_id;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }

    public function setYear(?DateTime $year): void {
        $this->year = $year;
    }
}