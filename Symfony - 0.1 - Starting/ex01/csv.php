<?php
$file = file_get_contents('ex01.txt');
$array = explode(',', str_replace("\n", "", $file));

foreach ($array as $a)
	echo "$a\n";
?>
