#!/usr/bin/php
<?php 
$input = file('input');

foreach ($input as $seat) {
    echo "Seat code: $seat".PHP_EOL;
    
    $position = 128;
    for ($i = 0; $i < 7; $i++) {
        $position = step($seat[$i], $position);
        echo $position.PHP_EOL;
    }
}


function step($operator, $value) {
    echo "Operator: $operator ";
    $value = $value / 2;
    $val1 = $value / 2;
    $val2 = $value + $val1;
    echo "Val1: $val1, Val2: $val2";
    switch ($operator) {
        case 'F':
        case 'L':
            echo ("down ");
            $value = $value / 2;
        break;
    }
    return $value;
}