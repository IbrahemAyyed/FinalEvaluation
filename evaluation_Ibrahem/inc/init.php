<?php

// open the session
session_start();

$dsn = 'mysql:host=localhost; dbname=vtc';
$login = 'root';
$pwd = '';
$attributes = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn, $login, $pwd, $attributes);

//>> declare CONSTANTS
define('URL', 'http://localhost:8080/evaluation_Ibrahem/');
define('ROOT_TREE', $_SERVER['DOCUMENT_ROOT'] . 'evaluation_Ibrahem/');
// We just declared the way to access our files + URL

//>> declare VARIABLES
$msg_error = "";
$msg_success = "";
$page = "";
$content = "";

require_once("functions.php");