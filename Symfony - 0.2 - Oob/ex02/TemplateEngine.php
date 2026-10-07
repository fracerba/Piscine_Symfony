<?php
class TemplateEngine {
	public function createFile(HotBeverage $text) {
		$templateName = 'template.html';

		if (!is_file($templateName)) {
			echo "Template file '$templateName' not found.\n";
			return;
		}

		if (!is_readable($templateName)) {
			echo "Template file '$templateName' is not readable.\n";
			return;
		}

		$file = file_get_contents($templateName);
		if ($file === false) {
			echo "Failed to retrieve file contents from template: $templateName\n";
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

		foreach ($parameters as $k => $v) {
			$method = $reflector->getMethod('get' . ucfirst($v));
			$file = str_replace("{{$k}}", $method->invoke($text), $file);
		}

		$fileName = $reflector->getName() . '.html';
		if (file_put_contents($fileName, $file))
			echo "HTML file '$fileName' created successfully.\n";
		else
			echo "Failed to create file '$fileName'.\n";
	}
}