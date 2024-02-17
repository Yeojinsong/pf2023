<?php
/*
Filename: connect.php
Author: Yeojin Song
Date: 27 April 2018
Last Updated:
Description: conect to database for the Play Wool Website
*/

//attempt to connect to MariaDB
/*
      $database = 's102060145_db';
      $username = 's102060145';
      $password = '241287';
      $dbh = new PDO("mysql:host=feenix-mariadb.swin.edu.au;dbname=$database", $username, $password);
      foreach($dbh->query('SELECT * from ass_product') as $row)
      {
         print_r($row);
      }
 */  


try {
	//init variables to store login credentials
	$database = 's102060145_db';
	$username = 'u5f8u88lt7xn';
	$password = '-English11';

	// create an object from the PDO Data Object ($pdo) class to establish connection
	$pdo = new PDO("mysql:host=sg3plcpnl0009.prod.sin3.secureserver.net;dbname=$database", $username, $password);

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

// for testing purposes (comment out when live)
// echo "Connection Successful";

?>

