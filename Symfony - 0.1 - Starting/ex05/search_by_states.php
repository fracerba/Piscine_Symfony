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

	$array = explode(",", $words);
	foreach ($array as &$a){
		$a = trim($a);
		$postal_code = $states[$a] ?? null;
		if ($postal_code) {
			$capital = $capitals[$postal_code] ?? null;
			if ($capital)
				$a = "$capital is the capital of $a";
			else
				$a = "$a is neither a capital nor a state.";
		}
		else {
			$postal_code = array_search($a, $capitals, true);
			if ($postal_code){
				$state = array_search($postal_code, $states, true);
				if ($state)
					$a = "$a is the capital of $state";
				else
					$a = "$a is neither a capital nor a state.";
			}
			else
				$a = "$a is neither a capital nor a state.";
		}
	}
	return $array;
}
?>