<?php
include './Text.php';
include './TemplateEngine.php';

$text = new Text([
	'Along the shore the cloud waves break,',
	'The twin suns sink behind the lake,',
	'The shadows lengthen',
	'	In Carcosa.',

	'Strange is the night where black stars rise,',
	'And strange moons circle through the skies',
	'But stranger still is',
	'	Lost Carcosa.',

	'Songs that the Hyades shall sing,',
	'Where flap the tatters of the King,',
	'Must die unheard in',
	'	Dim Carcosa.',
]);

$text->append('Song of my soul, my voice is dead;');
$text->append('Die thou, unsung, as tears unshed');
$text->append('Shall dry and die in');
$text->append('	Lost Carcosa.');

$engine = new TemplateEngine;
$engine->createFile('Cassilda_Song', $text);