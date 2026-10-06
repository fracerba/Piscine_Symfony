<?php
class TemplateEngine {
	public function createFile(HotBeverage $text) {
		$templateName = 'template.html';

		if (!is_file($templateName)) {
			echo "Template file '$templateName' not found.";
			return;
		}

		if (!is_readable($templateName)) {
			echo "Template file '$templateName' is not readable.";
			return;
		}

		$reflector = new ReflectionClass($text::class);
		$parameters = [
			'nom' => 'name',
			'price' => 'price',
			'resistance' => 'resistence',
			'description' => 'description',
			'comment' => 'comment',
		];

		$file = file_get_contents($templateName);
		foreach ($parameters as $k => $v) {
			$method = $reflector->getMethod('get' . ucfirst($v));
			$file = str_replace("{{$k}}", $method->invoke($text), $file);
		}

		$fileName = $reflector->getName() . '.html';
		if (file_put_contents($fileName, $file))
			echo "HTML file '$fileName' created successfully.\n";
		else
			echo "Error";
	}
}