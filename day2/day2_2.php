<?php
$re = '/^([\d]*)-([\d]*)\s([a-z]):\s([a-z]*)$/';
$i=0;
foreach (file('day2data.txt') as $str) {
    preg_match($re, $str, $matches);
    if ($matches[4][$matches[1]-1] === $matches[3] xor $matches[4][$matches[2]-1] === $matches[3]) {
        $i++;
    }
}

echo $i;