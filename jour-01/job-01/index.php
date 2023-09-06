<?php

function my_str_search(string $haystack, string $needle) : int 
{
    $count = 0;

    for ($i = 0; isset($haystack[$i]); $i++) {
        if ($haystack[$i] === $needle) 
        {
            $count++;
        }
    }

    return $count;
}