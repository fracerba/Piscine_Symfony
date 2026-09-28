<?php
function array2hash(array $array) : array {
	$hash = [];
	foreach ($array as $a)
		$hash[$a[1]] = $a[0];

	return $hash;
}
?>