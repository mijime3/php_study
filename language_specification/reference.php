<?php

$a1 = '1';
$b1 = &$a1;
$b1 = '11111';
var_dump(compact(['a1', 'b1']));

$a2 = '2';
$b2 = &$a2;
$c2 = $b2;
$c2 = '22222';
var_dump(compact(['a2', 'b2', 'c2']));

$a3 = '3';
$b3 = &$a3;
$c3 = &$b3;
$c3 = '33333';
var_dump(compact(['a3', 'b3', 'c3']));
