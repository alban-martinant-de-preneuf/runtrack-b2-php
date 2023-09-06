<?php

function length(string $str) : int {
    $count = 0;

    for ($i = 0; isset($str[$i]); $i++) {
        $count++;
    }

    return $count;
}

function my_str_reverse(string $str) : string {
    $reverseStr = '';

    for ($i = length($str) - 1; $i >= 0; $i--) {
        $reverseStr .= $str[$i];
    }
    
    return $reverseStr;
}