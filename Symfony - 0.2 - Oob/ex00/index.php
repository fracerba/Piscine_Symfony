<?php
include './TemplateEngine.php';

$parameters = [
	'nom' => 'The King In Yellow',
	'auteur' => 'Robert W. Chambers',
	'description' => 'The King in Yellow is a book of short stories by the American writer Robert W. Chambers, first published in 1895. The book is named after a play with the same title which recurs as a motif through some of the stories. The first half of the book features highly esteemed horror stories, and the book has been described by critics such as E. F. Bleiler and T. E. D. Klein as a classic in the field of the supernatural.',
	'prix' => '25,48',
];

$engine = new TemplateEngine;
$engine->createFile('The_King_In_Yellow', 'book_description.html', $parameters);