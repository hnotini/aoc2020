<?php

$data = file('day2data.txt');

$count = 0;
foreach ($data as $password) {
    if (validate(explode(' ', $password))) {
        $count++;
    }
}

echo $count;

function validate($password) {
    $char = trim($password[1], ':');
    $range = explode('-', $password[0]);
    $pwd = $password[2];

    $regex = "/^([^$char]*$char){{$range[0]},{$range[1]}}[^$char]*$/";
    //var_dump($regex);
    //var_dump($pwd);
    return (bool)preg_match($regex, $pwd);
}