#!/usr/bin/php
<?php
$input = cleanData(file_get_contents('input'));
$input = explode("\n", $input);

$count = array_reduce($input, function($count, $line){
    $reg = '/^(?=.*\becl\b)(?=.*\bpid\b)(?=.*\beyr\b)(?=.*\bhcl\b)(?=.*\bbyr\b)(?=.*\biyr\b)(?=.*\bhgt\b).*$/m';
    if (preg_match($reg, $line)) $count++;
    return $count;
}, 0);

echo "Count: $count".PHP_EOL;

function cleanData($data){
    $re = '/(^|[^\n])\n{1}(?!\n)/';
    $subst = '\\1 ';
    return preg_replace($re, $subst, $data);
}
