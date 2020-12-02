<?php
$re = '/^([\d]*)-([\d]*)\s([a-z]):\s([a-z]*)$/';
$i=0;
foreach (file('day2data.txt') as $str) {
    preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0);
    if ($matches[4][0][$matches[1][0]-1] === $matches[3][0] xor $matches[4][0][$matches[2][0]-1] === $matches[3][0]) {
        $i++;
    }
}

echo $i;