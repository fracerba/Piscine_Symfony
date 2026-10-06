<?php
class TemplateEngine {
	public function createFile(string $fileName, Text $text) {
		$file = '<!DOCTYPE html>
<html>
	<head>
		<title>Cassilda\'s Song</title>
	</head>
	<body>
' . $text->readData() .
'	</body>
</html>';

		$fileName .= '.html';
		if (file_put_contents($fileName, $file))
			echo "HTML file '$fileName' created successfully.\n";
	}
}