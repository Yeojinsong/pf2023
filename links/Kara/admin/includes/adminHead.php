<?php
/*
Filename: head.php
Author: Daniel Busch
Date Created: 17/08/2018
Date Last updated: 17/08/2018
Last Updated By: Daniel Busch
Description: Head section for admin login test
Version Number: 0.1
*/

if (!isset($pageTitle)) {
	$pageTitle = ":Page Title Not Set:";
}

include "includes/connect.php";

// include the my functions file.
include "includes/adminFunctions.php";

if (isset($_POST['adminLogInSubmit'])) {
	$email = cleanInput($_POST['email']);
	$password = sha1(cleanInput($_POST['password']));

	// check to see if the login credentials are correct
	checkUserLogin($email, $password);

	// check to see if the account should be locked, if it shouldn't, unlock it.
	unlockAccount();

	// if login fails, initiate the counter
	logInFail();

	// if the counter is 5, lock the account.
	if ($_SESSION['logInAttempts'] == 5) {

		$_SESSION['accountLocked'] = 1;

		lockAccount();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- These first three meta tags (below) must come first. Do NOT move them -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Admin Area for the Kara House Website">
		<meta name="keywords" content="">
		<meta name="author" content="MobiusWeb: Aleksander Tudorin, Blair Collins, Dahmon Bicheno, Daniel Busch, Harris Salehi, Yeojin Song">

		<link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>
		<link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>

		<!-- Bootstrap responsive mobile meta tag -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Kara House: <?Php echo $pageTitle; ?></title>

		<!-- HTML 5 shim and Respond.js for IE8 support ofHTML 5 Elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page from file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">

		<!-- link to Font Awesome icons -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

		<!-- Link to Google "Roboto" font font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

		<!-- Link to my style sheet-->
		<link href="css/adminStyles.css" type="text/css" rel="stylesheet">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

		<!-- CKEditor -->
		<script src="ckeditor/ckeditor.js"></script>

	</head>
