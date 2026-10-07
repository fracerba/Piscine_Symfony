<?php
class TemplateEngine {
	public function createFile(string $fileName, Text $text) {
		if ($fileName === null || !strlen($fileName)) {
			echo "No file name provided.\n";
			return;
		}

		$file = '<!DOCTYPE html>
<html>
	<head>
		<title>Cassilda\'s Song</title>
	</head>
	<body>
' . str_replace("<p>", "\t\t<p>", $text->readData()) .
'	</body>
</html>';

		$fileName .= '.html';
		if (file_put_contents($fileName, $file))
			echo "HTML file '$fileName' created successfully.\n";
		else
			echo "Failed to create file '$fileName'.\n";
	}
}