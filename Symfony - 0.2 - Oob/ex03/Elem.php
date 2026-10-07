<?php
class Elem {
	function __construct(
		private string $element,
		private array $content = [],
	) {}

    public function pushElement(Elem $element) {
        $this->content[] = $element;
    }

	public function getHTML() {
		return $this->element;
	}
}