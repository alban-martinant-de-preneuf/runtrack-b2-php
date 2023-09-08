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

    public function getId(): ?int {
        return $this->id;
    }

    public function getFloor(): ?int {
        return $this->floor;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getCapacity(): ?int {
        return $this->capacity;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setFloor(?int $floor): void {
        $this->floor = $floor;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }

    public function setCapacity(?int $capacity): void {
        $this->capacity = $capacity;
    }
}