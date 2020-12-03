#!/usr/bin/php
<?php
$map = file('map.txt');
//$map = file('testdata.txt');
$sizeY = count($map);
$count = nextStep(0, $map, (object)['x' => 0, 'y' => 0], $sizeY, (object)['right' => 3, 'down' => 1]);
echo "COUNT: $count".PHP_EOL;

function nextStep($count, $map, $coords, $limit, $rule) { 
    // Right three or wrap
    $coords->x += $rule->right;
    if($coords->x >= strlen($map[0]) -1) {
        $coords->x = abs(strlen($map[0]) -1 - $coords->x);
    } 

    // Down one
    $coords->y += $rule->down;
    
    // Tree or no tree?
    if (checkForTree($map, $coords->x, $coords->y)) $count++;
    
    // Neeeext!
    if ($coords->y < $limit -1) {
        return nextStep($count, $map, $coords, $limit, $rule);
    } else {
        return $count;
    }
}

function checkForTree($map, $x,$y) {
    // In PHP strings can be accessed like arrays. <3
    return $map[$y][$x] === '#';
}
