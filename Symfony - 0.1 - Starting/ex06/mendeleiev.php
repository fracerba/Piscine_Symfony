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
		body {
			margin: 0;
			padding: 50px;
			font-family: Verdana, Geneva, Tahoma, sans-serif;
			min-width: max-content;
			min-height: 100vh;
			box-sizing: border-box;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		table { 
			border-collapse: collapse;
			table-layout: fixed; 
			width: 100%;
			max-width: 2160px;
			margin: 0 auto; 
		}
		td {
			box-sizing: border-box;
			vertical-align: top;
		}
		td:not([colspan]) {
			width: 120px;
			height: 120px;
			border: 1px solid black;
			text-align: left;
			padding: 10px;
			box-sizing: border-box;
			overflow: hidden; 
			word-wrap: break-word;
		}
		h4 {
			margin: 3px 0 5px 0;
			font-size: 12px;
		}
		ul {
			margin: 0;
			padding: 0;
		}
		li {
			list-style-type: none;
			font-size: 11px;
			line-height: 1.3;
		}
		.alkali-metals { background-color: #ff6666; }
		.alkaline-earth-metals { background-color: #ffdead; }
		.lanthanoids { background-color: #ffbfff; }
		.actinoids { background-color: #ff99cc; }
		.transition-metals { background-color: #ffc0c0; }
		.post-transition-metals { background-color: #cccccc; }
		.metalloids { background-color: #cccc99; }
		.nonmetals { background-color: #a0ffa0; }
		.halogens { background-color: #ffff99; }
		.noble-gases { background-color: #c0ffff; }
	</style>
</head>
<body>
	<table>\n";

$last_group = 20;

foreach ($table as $line) {
	$data = explode(",", trim($line));
	if (count($data) !== 5)
		continue;

	if (!preg_match("/[a-zA-Z]+/", trim($data[0]), $element))
		continue;

	if (!preg_match("/position\s*:\s*\K\d+/", trim($data[0]), $group))
		continue;

	if (!preg_match("/number\s*:\s*\K\d+/", trim($data[1]), $atomic_number))
		continue;

	if (!preg_match("/small\s*:\s*\K[a-zA-Z]+/", trim($data[2]), $symbol))
		continue;

	if (!preg_match("/molar\s*:\s*\K[0-9.]+/", trim($data[3]), $atomic_weight))
		continue;

	if (!preg_match("/electron\s*:\s*\K[0-9 ]+/", trim($data[4]), $electrons))
		continue;

	$group_name = match ($group[0]) {
		'0' => $symbol[0] === 'H' ? 'nonmetals' : 'alkali-metals',
		'1' => 'alkaline-earth-metals',
		'2' => match ($symbol[0]) {
			'Sc', 'Y' => 'transition-metals',
			'La', 'Lu' => 'lanthanoids',
			'Ac', 'Lr' => 'actinoids',
			default => 'transition-metals'
		},
		'12', '13', '14', '15' => match ($symbol[0]) {
			'C', 'N', 'O', 'P', 'S', 'Se' => 'nonmetals',
			'B', 'Si', 'Ge', 'As', 'Sb', 'Te', 'Po' => 'metalloids',
			default => 'post-transition-metals'
		},
		'16' => 'halogens',
		'17' => 'noble-gases',
		default => 'transition-metals'
	};

	if ($group[0] === '0')
		$file .= "		<tr>\n";

	if ($last_group < $group[0] - 1) {
		$span = $group[0] - $last_group - 1;
		$file .= "			<td colspan=\"$span\"></td>\n";
	}

	$last_group = (int) $group[0];
	$electron_count = $symbol[0] === 'H' ? 'electron' : 'electrons';

	$file .= "			<td class=\"$group_name\">
				<h4>$element[0]</h4>
				<ul>
					<li>$atomic_number[0]</li>
					<li>$symbol[0]</li>
					<li>$atomic_weight[0]</li>
					<li>$electrons[0] $electron_count</li>
				</ul>
			</td>\n";

	if ($group[0] === '17')
		$file .= "		</tr>\n";
}

$file .= "	</table>
</body>
</html>";

$output_file = 'mendeleiev.html';
if (file_put_contents($output_file, $file))
	echo "HTML file '$output_file' created successfully.\n";