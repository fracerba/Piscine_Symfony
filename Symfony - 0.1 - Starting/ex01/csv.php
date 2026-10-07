<?php
$filename = 'ex01.txt';

if (!is_file($filename)) {
	echo "File not found: $filename\n";
	exit(1);
}

if (!is_readable($filename)) {
	echo "File not readable: $filename\n";
	exit(1);
}

$file = file_get_contents($filename);
if ($file === false) {
	echo "Failed to retrieve file contents: $filename\n";
	exit(1);
}

$array = explode(',', trim($file));
foreach ($array as $a)
	echo trim($a) . "\n";