<?php if (session_id() =='') session_start();
/*
Filename: updateCart.php
Author: Yeojin Song 102060145
Date Created: 28 March 2018
Last Updated:
Description: update the quantity ordered in the shopping cart
*/
// import the head section
include "includes/myFunctions.php";

//capture data from form and clean
$prodId = cleanInput($_POST['prodId']);
$qtyOrdered = cleanInput($_POST['qtyOrdered']);
$qtyOnHand = cleanInput($_POST['qtyOnHand']);

// test if qtyordered is numberic
if(is_numeric($qtyOrdered)){
	$qtyOrdered = (int)$qtyOrdered; // right one is old one left one is the new value
	
	//test if product to be deleted from cart
	if ($qtyOrdered == 0){
		unset($_SESSION['cart'][$prodId]);
	}
	else{
		// test that qtyOrdered is greater than 0 and less than or equal to the qtyOnHand
		if($qtyOrdered > 0 && $qtyOrdered <= $qtyOnHand){
			//update qtyOrdered in cart
			$_SESSION['cart'][$prodId]['qtyOrdered'] = $qtyOrdered;
		}
		elseif($qtyOrdered > 0 && $qtyOrdered > $qtyOnHand){
			$_SESSION['cart'][$prodId]['qtyOrdered'] = $qtyOnHand;
		}
	}
}// end of test





// return to showCart file
header("Location: ". $_SERVER['HTTP_REFERER']);

// force the exit from this file if return fails
exit();
?>