<?php
require_once __DIR__.'factory/EyeFactory.php';
require_once __DIR__.'Eye.php';

$eyeFactory = new Factory\EyeFactory();
echo "<br>";
var_dump($eyeFactory);
echo "<br>";

$eyeFactory = new EyeFactory();
echo "<br>";
var_dump($eyeFactory);
echo "<br>";