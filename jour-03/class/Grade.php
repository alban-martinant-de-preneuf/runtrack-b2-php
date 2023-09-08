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
}