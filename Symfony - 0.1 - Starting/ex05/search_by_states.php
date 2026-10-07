<?php
function search_by_states (string $words) : array {
	$states = [
		'Oregon' => 'OR',
		'Alabama' => 'AL',
		'New Jersey' => 'NJ',
		'Colorado' => 'CO',
	];
	$capitals = [
		'OR' => 'Salem',
		'AL' => 'Montgomery',
		'NJ' => 'trenton',
		'KS' => 'Topeka',
	];

	$array = explode(',', trim($words));
	$err_msg = ' is neither a capital nor a state.';
	foreach ($array as &$a){
		$a = trim($a);
		$postal_code = $states[$a] ?? null;
		if ($postal_code) {
			$capital = $capitals[$postal_code] ?? null;
			$a = $capital ? "$capital is the capital of $a." : "$a$err_msg";
		}
		else {
			$postal_code = array_search($a, $capitals, true);
			if ($postal_code){
				$state = array_search($postal_code, $states, true);
				$a = $state ? "$a is the capital of $state." : "$a$err_msg";
			}
			else
				$a .= $err_msg;
		}
	}
	return $array;
}