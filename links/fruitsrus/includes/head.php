<?php

/*
Filename: head.php
Author: Yeojin Song
Date: 28 March 2018
Last Updated:
Description: Head section for the Fruits 'R' Us Website
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

		<meta name="description" content="Fruits 'R' Us Website">
		<meta name="keywords" content="Fruit, Fruits 'R' Us">
		<meta name="author" content="Janet Bott">

		<title>Fruits 'R' Us :: <?php echo $pageTitle; ?></title>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

		<!-- link to Bootstrap CSS file -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- link to Bootstrap CSS file for social media -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">

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
