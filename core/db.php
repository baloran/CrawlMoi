<?php
/*
* Base de donnée
*/

$database = 'mysql:host=localhost;dbname=crawler';
$user_db  = 'root';
$pass_db  = '';
$options  = '';

$db = new PDO($database, $user_db, $pass_db) or die (print_r($db->errorInfo()));
$db->exec('SET NAMES utf8');
/*
 * Fin Base de donnée
*/