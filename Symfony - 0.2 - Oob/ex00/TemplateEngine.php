<?php
class TemplateEngine {
	public function createFile(string $fileName, string $templateName, array $parameters) {
		if (!is_file($templateName)) {
			echo "Template file '$templateName' not found.\n";
			return;
		}

		if (!is_readable($templateName)) {
			echo "Template file '$templateName' is not readable.\n";
			return;
		}

		if ($fileName === null || !strlen($fileName)) {
			echo "No file name provided.\n";
			return;
		}

		$file = file_get_contents($templateName);
		if ($file === false) {
			echo "Failed to retrieve file contents from template: $templateName\n";
			return;
		}

		foreach ($parameters as $k => $v) 
			$file = str_replace("{{$k}}", $v, $file);

		$fileName .= '.html';
		if (file_put_contents($fileName, $file))
			echo "HTML file '$fileName' created successfully.\n";
		else
			echo "Failed to create file '$fileName'.\n";
	}
}