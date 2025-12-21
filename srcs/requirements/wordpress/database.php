<?php
	/*
		MARIADB_DATABASE=wp_db
		MARIADB_USER=wp_user
		MARIADB_PASSWORD=wp_password
		MARIADB_ROOT_PASSWORD=root_password
	*/

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$db_server = getenv('MARIADB_HOST') ?: 'mariadb';
	$db_user =  getenv('MARIADB_USER') ?: 'wp_user';
	$db_pass =  getenv('MARIADB_PASSWORD') ?: 'wp_password';
	$db_name =  getenv('MARIADB_DATABASE') ?: 'wp_db';
//	$conn = '';

	try
	{
		$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
		echo "<p>You are connected to MariaDB!</p>";
	}
	catch(mysqli_sql_exception $e)
	{
		echo "<p>You are NOT connected to MariaDB!</p>";
		echo "<pre>" . $e->getMessage() . "</pre>";
	}
?>
