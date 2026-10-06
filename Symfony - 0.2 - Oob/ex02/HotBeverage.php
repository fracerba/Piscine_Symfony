<?php
class HotBeverage {
	function __construct(
		protected string $name,
		protected float $price,
		protected float $resistence,
	) {}

	public function getName() {
		return $this->name;
	}
	
	public function getPrice() {
		return $this->price;
	}

	public function getResistence() {
		return $this->resistence;
	}
}