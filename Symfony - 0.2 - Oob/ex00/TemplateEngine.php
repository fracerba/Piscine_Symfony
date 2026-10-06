<?php
class TemplateEngine {
	public function createFile(string $fileName, string $templateName, array $parameters) {
		if (!is_file($templateName)) {
			echo "Template file '$templateName' not found.";
			return;
		}

		if (!is_readable($templateName)) {
			echo "Template file '$templateName' is not readable.";
			return;
		}

		if (!$fileName) {
			echo "No file name provided.";
			return;
		}

		$file = file_get_contents($templateName);
		foreach ($parameters as $k => $v) 
			$file = str_replace("{{$k}}", $v, $file);

		$fileName .= '.html';
		if (file_put_contents($fileName, $file))
			echo "HTML file '$fileName' created successfully.\n";
	}
}