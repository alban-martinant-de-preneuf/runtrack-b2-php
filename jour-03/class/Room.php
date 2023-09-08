<?php

class Room {

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
}