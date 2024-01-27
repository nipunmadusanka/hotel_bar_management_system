<?php

require_once('config.php');


// including the classes
require_once 'connection.php';
require_once 'User.php';
require_once 'Object.php';

// makeing global objects
global $pdo;
session_start();
$obj = new Objects($pdo);
$userrr = new User($pdo);
$userrr->login();

?>