<?php
class Coffee extends HotBeverage {
	private string $description = 'A'; 
	private string $comment = 'B';

	function __construct() {
		parent::__construct('Coffee', 1.20, 4);
	}

	public function getDescription() {
		return $this->description;
	}

	public function getComment() {
		return $this->comment;
	}
}