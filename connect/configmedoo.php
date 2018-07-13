<?php

use Medoo\Medoo;

$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'tot',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '12345678',
	'charset' => 'utf8',
]);



?>
