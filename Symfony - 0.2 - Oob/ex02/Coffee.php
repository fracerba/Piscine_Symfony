<?php
class Coffee extends HotBeverage {
	private string $description = 'Coffee is a beverage brewed from roasted, ground coffee beans. Dark-colored and bitter, coffee has a stimulating effect on humans due to its caffeine content.'; 
	private string $comment = 'The earliest reports of coffee drinking pertain to the plant\'s use among the Sufis of Yemen in southern Arabia in the middle of the 15th century.';

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