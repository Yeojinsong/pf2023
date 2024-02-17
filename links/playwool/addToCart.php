<?php if (session_id() =='') session_start();
/*
Filename: addToCart.php
Author: Yeojin Song 102060145
Date Created: 21 March 2018
Last Updated:
Description: Add to cart for Play Wool website
*/
// import the head section
include "includes/myFunctions.php";

//capture data from form and clean

$prodId = cleanInput($_POST['prodId']);
$prodName = cleanInput($_POST['prodName']);
$qtyOnHand = cleanInput($_POST['qtyOnHand']);
$listPrice = cleanInput($_POST['listPrice']);
$thumbNail = cleanInput($_POST['thumbNail']);
// set up cart as a session variable
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

//add proudct to the cart 
if(!isset($_SESSION['cart'][$prodId])){
	$_SESSION['cart'][$prodId] = array('prodName'=>$prodName,'qtyOnHand'=>$qtyOnHand,'listPrice'=>$listPrice,'thumbNail'=>$thumbNail, 'qtyOrdered'=>1);
	
}
else{
	$_SESSION['cart'][$prodId]['qtyOrdered']++;
}



// return to catelogue file
header("Location: ". $_SERVER['HTTP_REFERER']);

// force the exit from this file if return fails
exit();
?>