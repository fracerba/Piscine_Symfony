<?php
$table = explode("\n", file_get_contents('./ex06.txt'));
foreach ($table as $line) {
    $elements = explode(";", $line);
    foreach ($elements as $element)
        echo "$element\n";
}
?>