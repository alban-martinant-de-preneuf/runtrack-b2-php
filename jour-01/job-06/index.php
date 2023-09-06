<?php

function array_length(array $array): int
{
    $count = 0;

    foreach ($array as $element) {
        $count++;
    }

    return $count;
}

function my_array_sort(array $arrayToSort, string $order): array
{
    do {
        $swaped = false;
        for ($i = 0; $i < array_length($arrayToSort) - 1; $i++) {
            $condition = $order === 'DESC' ? ($arrayToSort[$i] < $arrayToSort[$i + 1]) : ($arrayToSort[$i] > $arrayToSort[$i + 1]);
            if ($condition) {
                $tmp = $arrayToSort[$i];
                $arrayToSort[$i] = $arrayToSort[$i + 1];
                $arrayToSort[$i + 1] = $tmp;
                $swaped = true;
            }
        }
    } while ($swaped);

    return $arrayToSort;
}