<?php

function my_is_prime(int $number) : bool {
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}