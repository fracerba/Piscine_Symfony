<?php
function capital_city_from (string $state) : string {
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

	$capital = 'Unknown';
	$postal_code = $states[$state] ?? null;
	if ($postal_code)
		$capital = $capitals[$postal_code] ?? 'Unknown';
	return "$capital\n";
}