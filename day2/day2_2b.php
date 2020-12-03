#!/usr/bin/php
<?php
echo array_reduce(file('day2data.txt'), function($count, $row){
    $re = '/^([\d]*)-([\d]*)\s([a-z]):\s([a-z]*)$/';
    preg_match($re, $row, $matches);
    if ($matches[4][$matches[1]-1] === $matches[3] xor $matches[4][$matches[2]-1] === $matches[3]) {
        $count++;
    }
    return $count;
}).PHP_EOL;