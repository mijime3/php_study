<?php

$num_max = isset($argv[1]) ? $argv[1] : 10;
echo "num_max={$num_max}\n";

$array = [
1,
3,
5,
7,
9,
];

$array = [];
for($i=0; $i<=$num_max; $i++){
    if($i % 2 == 1){
        $array[$i] = $i;
    }
}

$start = microtime(true);

$max = 2000000;
for($i=0; $i < $max; $i++) {
    if(in_array($i%$num_max, $array)){}
}

$end = microtime(true);

echo $end - $start."\n";


$start = microtime(true);

$max = 2000000;
for($i=0; $i < $max; $i++) {
    if(isset($array[$i%$num_max])){}
}

$end = microtime(true);

echo $end - $start."\n";


