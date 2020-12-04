#!/usr/bin/php
<?php
$input = cleanData(file_get_contents('input'));
$input = explode("\n\n", $input);

$count = array_reduce($input, function($count, $line){
    $reg = '/^(?=.*\becl:(amb|blu|brn|gry|grn|hzl|oth)\b)(?=.*\bpid:([0-9]{9})\b)(?=.*\beyr:(202[0-9]{1}|2030)\b)(?=.*\bhcl:#([a-z0-9]{6})\b)(?=.*\bbyr:(19[2-9]{1}[0-9]{1}|200[0-2]{1})\b)(?=.*\biyr:(201[0-9]{1}|2020)\b)(?=.*\bhgt:((?:(?:1[5-8]{1}[0-9]{1}|19[0-3]{1})cm)|(?:59|6[0-9]{1}|7[0-6]{1})in)\b).*$/m';
    if (preg_match($reg, $line)) $count++;
    return $count;
}, 0);

echo "Count: $count".PHP_EOL;

function cleanData($data){
    $re = '/(^|[^\n])\n{1}(?!\n)/';
    $subst = '\\1 ';
    return preg_replace($re, $subst, $data);
}