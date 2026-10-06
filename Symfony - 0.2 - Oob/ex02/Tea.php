<?php
class Tea extends HotBeverage {
	private string $description = 'C';
	private string $comment = 'D';

	function __construct() {
		parent::__construct('Tea', 3.50, 2.5);
	}

	public function getDescription() {
		return $this->description;
	}

	public function getComment() {
		return $this->comment;
	}
}