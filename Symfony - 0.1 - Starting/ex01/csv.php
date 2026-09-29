<?php
$filename = 'ex01.txt';

if (!is_file($filename)) {
	echo "File not found: $filename\n";
	exit(1);
}

$file = file_get_contents($filename);
$array = explode(',', trim($file));

foreach ($array as $a)
	echo "$a\n";
?>
