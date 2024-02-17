<?php
/*
Filename: connect.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi 
Date Created: 6/08/2018
Date Last updated: 8/08/2018
Last Updated By: Dahmon Bicheno
Description: Team Database connect file for the Kara house website
Version Number: 0.1
*/

//attempt to connect to MariaDB
try {
	//init variables to store login credentials
	$user = "ictweb516_1";
	$password = "4JYnAyV9f5";
	$host = "feenix-mariadb.swin.edu.au";
	$dbname = "ictweb516_1_db";

	// create an object from the PDO Data Object ($pdo) class to establish connection
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

	// default mode (silent failure) for establishing connections
	// set our pdo object error mode to throw exceptions
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// execute the connection, changing the character set to UTF-8
	$pdo->exec("SET NAMES 'utf8'");

} // end of try block
catch(PDOException $e) {
	//create an error message
	echo "Unable to connect to database: ".$e->getMessage();

	//stop script continuing
	exit();


} // end of catch block

// echo "Connection Successful";

?>