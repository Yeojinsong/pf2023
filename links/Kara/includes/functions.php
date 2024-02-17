<?php 
/*
File Name: functions.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi 
Date Created: 6/08/2018
Date Last updated: 8/08/2018
Last Updated By: Dahmon Bicheno
Description: functions for Kara House Website
Version Number: 0.1
*/

function cleanInput($data) {
	// 'cleans' the input from a form

	$data = trim($data); // removes extra spaces, tabs, new lines
	$data = stripslashes($data); // remove back slashes
	$data = htmlspecialchars($data); // convert special characters to entity codes

	return $data;
} // end of cleanInput function

// =================================================================================

?>
