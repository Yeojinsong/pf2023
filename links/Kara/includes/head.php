<?php
/*
Filename: head.php
Author: Dahmon Bicheno
Date Created: 10 October 2018
Last Updated:
Description: Head section for Kara House
*/

// set the page title
if (!isset($pageTitle)) {
	$pageTitle = "<<Page title not set>>";
}

// include the myFunctions file
include "includes/functions.php";

include "includes/connect.php";


// test if login details have been submitted
// if (isset($_POST['loginSubmit'])) {
// 	// capture and clean data
// 	$loginEmail = cleanInput($_POST['loginEmail']);
// 	$loginPassword = sha1(cleanInput($_POST['loginPassword']));
	
// 	// check if correct login details provided
// 	checkCustomerLogin($loginEmail, $loginPassword);
// } // end of login test
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Kara House">
		<meta name="keywords" content="">
		<meta name="author" content="MobiusWeb: Aleksander Tudorin, Blair Collins, Dahmon Bicheno, Daniel Busch, Harris Salehi, Yeojin Song">

		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

		<title>Kara House - <?php echo $pageTitle; ?></title>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

		<!-- Roboto -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

		<!-- link to Bootstrap CSS file -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- link to our custom CSS file to override any Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<!-- link to Font Awesome icons -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

		<!-- jQuery (necessary for Bootstrap's JS plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</head>
