<?php
class Text {
	private array $text = [];

	function __construct(array $words) {
		$this->text = $words;
	}

	public function append(string $word) {
		$this->text[] = $word;
	}

	public function readData() {
		$data = '';
		foreach ($this->text as $t)
			$data .= "<p>" . htmlspecialchars($t, ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8') . "</p>\n";

		return $data;
	}
}