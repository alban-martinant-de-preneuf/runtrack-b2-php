<?php

function my_is_prime(int $number) : bool {
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

var_dump(my_is_prime(3));
var_dump(my_is_prime(12));