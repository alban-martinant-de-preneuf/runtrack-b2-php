<?php

function my_fizz_buzz(int $length) : array {
    $fizzBuzzArray = [];
    
    for ($i = 1; $i - 1 < $length; $i++) {
        if ($i % 3 === 0 && $i % 5 === 0) {
            $fizzBuzzArray[] = 'FizzBuzz';
        } elseif ($i % 3 === 0) {
            $fizzBuzzArray[] = 'Fizz';
        } elseif ($i % 5 === 0) {
            $fizzBuzzArray[] = 'Buzz';
        } else  {
            $fizzBuzzArray[] = $i;
        }
    }

    return $fizzBuzzArray;
}
