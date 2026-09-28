<?php
$a = 10;
$b = '10';
$c = 'ten';
$d = 10.0;
$array = ['a' => $a, 'b' => $b, 'c' => $c, 'd' => $d];

echo "My first variables:\n";
foreach ($array as $x => $y)
	echo "$x contains : $y and has type : " . gettype($y) . "\n";
?>