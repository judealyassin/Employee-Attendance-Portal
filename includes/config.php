<?php
// database connection config
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'ju_eap_summer_2024';

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass, $dbName) or die ('MySQL connect failed. ' . mysql_error());
mysqli_select_db($dbConn,$dbName) or die('Cannot select database. ' . mysql_error());

mysqli_set_charset($dbConn,'utf8'); 

date_default_timezone_set('Asia/Amman');


?>