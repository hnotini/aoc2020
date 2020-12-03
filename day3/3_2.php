#!/usr/bin/php
<?php
$map = file('map.txt');
$sizeY = count($map);
$rules = [
    (object)['right' => 1, 'down' => 1],
    (object)['right' => 3, 'down' => 1],
    (object)['right' => 5, 'down' => 1],
    (object)['right' => 7, 'down' => 1],
    (object)['right' => 1, 'down' => 2],
];

$count = [];
foreach ($rules as $rule) {
    $count[] = nextStep(0, $map, (object)['x' => 0, 'y' => 0], $sizeY, $rule);
}

echo "Part 1: {$count[1]}".PHP_EOL;
echo "Part 2: ".array_product($count).PHP_EOL; // HAHA. Never though I would use array_product.

function nextStep($count, $map, $coords, $limit, $rule) { 
    // Right or wrap
    $coords->x += $rule->right;
    if($coords->x >= strlen($map[0]) -1) {
        $coords->x = abs(strlen($map[0]) -1 - $coords->x);
    } 

    // Down rule steps
    $coords->y += $rule->down;

    // Tree or no tree?
    if (checkForTree($map, $coords->x, $coords->y)) $count++;

    // Neeeext! ...or quit.
    if ($coords->y < $limit - ($rule->down)) {
        return nextStep($count, $map, $coords, $limit, $rule);
    } else {
        return $count;
    }
}

function checkForTree($map, $x,$y) {
    return $map[$y][$x] === '#';
}
