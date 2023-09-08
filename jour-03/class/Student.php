<?php

class Student {

    public ?int $id;
    public ?int $grade_id;
    public ?string $email;
    public ?string $fullname;
    public ?DateTime $birthdate;
    public ?string $gender;

    public function __construct(
        ?int $id = null,
        ?int $grade_id = null,
        ?string $email = null,
        ?string $fullname = null,
        ?DateTime $birthdate = null,
        ?string $gender = null
    ) {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }
}