<?php
class Tea extends HotBeverage {
	private string $description = 'Tea is an aromatic beverage prepared by infusion of hot or boiling fresh water with fresh or cured leaves of Camellia sinensis, an evergreen shrub native to East Asia.';
	private string $comment = 'Early credible record of tea drinking dates to the 3rd century AD, in a Chinese medical text written by Eastern Han dynasty physician Hua Tuo.';

	function __construct() {
		parent::__construct('Tea', 3.50, 1.2);
	}

	public function getDescription() {
		return $this->description;
	}

	public function getComment() {
		return $this->comment;
	}
}