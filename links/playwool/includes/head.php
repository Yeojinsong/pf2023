<?php  

/*
Filename: head.php
Author: Yeojin Song
Date: 27 April 2018
Last Updated:
Description: Head section for the Play Wool Website
*/

// set the page title
if (!isset($pageTitle)) {
	$pageTitle = "<<Page title not set>>";
}

// include the myFunctions file
include "includes/myFunctions.php";

//test if login details have been submitted
if(isset($_POST['loginSubmit'])){
	//capture and clean data from login form
	$loginEmail = cleanInput($_POST['loginEmail']);
	$loginPassWord = sha1(cleanInput($_POST['loginPassWord']));
	
	// call function to check if correct login details provided 
	checkCustomerLogin($loginEmail,$loginPassWord);
} // end of login test	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<meta name="description" content="Play Wool Website">
		<meta name="keywords" content="knitting, Play Wool">
		<meta name="author" content="Yeojin Song">

		<title>Play Wool :: <?php echo $pageTitle; ?></title>

		<!-- link to Bootstrap CSS file -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
		<!-- Custom styles for this template -->
		<link rel="stylesheet" type="text/css" href="css/carousel.css">

		<!-- link to our custom CSS file to override any Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/customStyles.css">
		
		<link rel="stylesheet" type="text/css" href="css/printStyles.css" media="print">
		

		<!-- link to Font Awesome icons -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- jQuery (necessary for Bootstrap's JS plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<!-- link to Bootstrap JS file -->
		<script src="js/bootstrap.min.js"></script>

		<!-- link to our custom JS file -->
		<script src="js/scripts.js"></script>
	</head>
