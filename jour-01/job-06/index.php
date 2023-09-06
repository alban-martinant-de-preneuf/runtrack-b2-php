<?php

function array_length(array $array) : int {
    $count = 0;

    foreach ($array as $element) {
        $count++;
    }

    return $count;
}

function my_array_sort(array $arrayToSort, string $order) : array {
    
    if ($order === 'ASC') {
        do {
            $swaped = false;
            for ($i = 0; $i < array_length($arrayToSort) - 1; $i++) {
                if ($arrayToSort[$i] > $arrayToSort[$i + 1]) {
                    $tmp = $arrayToSort[$i];
                    $arrayToSort[$i] = $arrayToSort[$i + 1];
                    $arrayToSort[$i + 1] = $tmp;
                    $swaped = true;
                }
            }
        } while ($swaped);
        
        return $arrayToSort;
    } elseif ($order === 'DESC') {
        do {
            $swaped = false;
            for ($i = 0; $i < array_length($arrayToSort) - 1; $i++) {
                if ($arrayToSort[$i] < $arrayToSort[$i + 1]) {
                    $tmp = $arrayToSort[$i];
                    $arrayToSort[$i] = $arrayToSort[$i + 1];
                    $arrayToSort[$i + 1] = $tmp;
                    $swaped = true;
                }
            }
        } while ($swaped);
        
        return $arrayToSort;
    }
}