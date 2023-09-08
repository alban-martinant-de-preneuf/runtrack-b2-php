<?php

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
}