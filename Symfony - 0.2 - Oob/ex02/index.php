<?php
include 'HotBeverage.php';
include 'Coffee.php';
include 'Tea.php';
include 'TemplateEngine.php';

$coffee = new Coffee();
$tea = new Tea();
$engine = new TemplateEngine;

$engine->createFile($coffee);
$engine->createFile($tea);