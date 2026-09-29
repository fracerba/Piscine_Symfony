<?php
$filename = 'ex06.txt';

if (!is_file($filename)) {
	echo "File not found: $filename\n";
	exit(1);
}

$table = explode("\n", file_get_contents($filename));
$file = "<!DOCTYPE html>
<html lang=\"en\">
<head>
	<meta charset=\"UTF-8\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
	<title>Periodic Table</title>
	<style>
		td {
			border: 1px solid black;
			padding: 10px;
		}
	</style>
</head>
<body>
	</table>
";

foreach ($table as $line) {
	$data = explode(",", trim($line));
	if (count($data) !== 5)
		continue;

	preg_match("a-z", trim($data[0]), $element);
	$group = trim($data[0]);
	$atomic_number = trim($data[1]);
	$symbol = trim($data[2]);
	$atomic_weight = trim($data[3]);
	$electrons = trim($data[4]);

	if ($group === '0')
		$file .= "		<tr>";

	$file .= "		<td class=\"$group\">
			<h4>$element[0]</h4>
			<ul>
				<li>$atomic_number</li>
				<li>$symbol</li>
				<li>$atomic_weight</li>
				<li>$electrons</li>
			</ul>
		</td>
";

	if ($group === '17')
		$file .= "		</tr>";
}

$file .= "	</table>
</body>
</html>";

file_put_contents('mendeleiev.html', $file);
?>