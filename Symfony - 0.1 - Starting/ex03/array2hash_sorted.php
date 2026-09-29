<?php
function array2hash_sorted(array $array) : array {
	$hash = [];
	foreach ($array as $a) {
		if (gettype($a) === 'array' && count($a) === 2)
			$hash[$a[0]] = $a[1];
	}

	krsort($hash);
	return $hash;
}
?>