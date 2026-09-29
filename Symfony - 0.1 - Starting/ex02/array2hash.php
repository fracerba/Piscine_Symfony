<?php
function array2hash(array $array) : array {
	$hash = [];
	foreach ($array as $a) {
		if (gettype($a) === 'array' && count($a) === 2)
			$hash[$a[1]] = $a[0];
	}

	return $hash;
}
?>