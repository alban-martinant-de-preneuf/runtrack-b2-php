<?php

function toPositive(int $number) : int {
    if ($number < 0) {
        return $number * -1;
    } else {
        return $number;
    }
}

function my_closest_to_zero(array $array) : int {
    $closest = $array[0];
    foreach ($array as $number) {
        if (toPositive($number) < toPositive($closest)) {
            $closest = $number;
        }
    }

    return $closest;
}