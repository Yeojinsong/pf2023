<?php
/*
Filename: myFunctions.php
Author: Yeojin Song 102060145
Date: 27 April 2018
Last Updated:
Description: User defined functions for the Play Wool Website
*/


function cleanInput($data) {
	// 'cleans' the input from a form

	$data = trim($data); // removes extra spaces, tabs, new lines
	$data = stripslashes($data); // remove back slashes
	$data = htmlspecialchars($data); // convert special characters to entity codes

	return $data;
} // end of cleanInput function

// =================================================================================



function checkCustomerLogin($email,$passWord){
	
	// connect to the database
	include "includes/connect.php";
	
	//test if email and password are valid
	try{
		//creaet out SQL statement
		$sql = "SELECT * FROM ass_customer WHERE email = :email AND passWord = :passWord;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':email', $email);
		$statement->bindValue(':passWord', $passWord);
		
		//execute the sql statment
		$statement->execute();
	} //end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error checking user login: ".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	// get count of rows in $statement - if count is 1, customer has provided valid login details
	$nbrOfRows = $statement->rowCount();
	
	if($nbrOfRows == 1){
		// set up login session variables 
		$_SESSION['login'] = "valid";
		
		// fetch row from result set
		$row = $statement->fetch();
		
		// assign customer details to session varialbes
		$_SESSION['custNbr'] = $row['custNbr'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['firstName'] = $row['firstName'];
		$_SESSION['lastName'] = $row['lastName'];
		//$_SESSION['discountRate'] = $row['discountRate'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['suburb'] = $row['suburb'];
		$_SESSION['state'] = $row['state'];
		$_SESSION['postCode'] = $row['postCode'];
		$_SESSION['country'] = $row['country'];
		
		$_SESSION['deliveryTo'] = $row['firstName'] ." ". $row['lastName'];
		$_SESSION['deliveryAddress'] = $row['address'];
		$_SESSION['deliverySuburb'] = $row['suburb'];
		$_SESSION['deliveryState'] = $row['state'];
		$_SESSION['deliveryPostCode'] = $row['postCode'];
		$_SESSION['deliveryCountry'] = $row['country'];
		$_SESSION['deliveryInstructions'] = "";
	}
	else{
		// set up login session variables 
		$_SESSION['login'] = "invalid";
		echo "<script type='text/javascript'>alert('Unsuccessul login attempt - Invalid email/password')</script>";
		
	}
	
	
} // end of checkCustomerLogin function

//-----------------------------------------------------------------------------------------------------------------------------------

function deliveryCharge($deliveryChargeNbr){
	
	// connect to the database
	include "includes/connect.php";
	
	//test if email and password are valid
	try{
		//creaet out SQL statement
		$sql = "SELECT deliveryChargeValue FROM ass_deliveryCharge WHERE deliveryChargeNbr = :deliveryChargeNbr;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':deliveryChargeNbr', $deliveryChargeNbr);
		
		//execute the sql statment
		$statement->execute();
	} //end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error getting delivery charge: ".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	$row = $statement->fetch();
	$deliveryCharge = $row['deliveryChargeValue'];
	
	return $deliveryCharge;
	
	
}

//-----------------------------------------------------------------------------------------------------------------------------------

function addTotalSales($custNbr, $currentSale){
	
	// connect to the database
	include "includes/connect.php";
	
	//test if email and password are valid
	try{
		//creaet out SQL statement
		$sql = "SELECT totalSales FROM ass_customer WHERE custNbr = :custNbr;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':custNbr', $custNbr);
		
		//execute the sql statment
		$statement->execute();
	} //end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error getting delivery charge: ".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	$row = $statement->fetch();
	$currentTotalSales = $row['totalSales'] + $currentSale;
	
	
	// prepare and run sql update statement
	// write a sql statement to get data from the ass_customer table
	try {
		//update  SQL statment
		$sql = "UPDATE ass_customer SET totalSales = :totalSales WHERE custNbr = :custNbr;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':totalSales', number_format($currentTotalSales));
		$statement->bindValue(':custNbr', $custNbr);		
		//execute the sql statment
		$statement->execute();
		
	}//end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error updating customer recode:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block

}// end of update Details Submit



//-----------------------------------------------------------------------------------------------------------------------------------

function insertOrderRecord(){
	// connect to the database
	include "includes/connect.php";
	
	try{
		//creat SQL insert statement
		$sql = "
		INSERT INTO ass_orderHeader 
		SET custNbr = :custNbr, orderDate = :orderDate, orderFinalTotal = :orderFinalTotal, orderDiscountValue = 0,
		orderDeliveryCharge = :orderDeliveryCharge, deliveryTo = :deliveryTo, deliveryAddress = :deliveryAddress,
		deliverySuburb = :deliverySuburb, deliveryState = :deliveryState, deliveryPostCode = :deliveryPostCode, 
		deliveryCountry = :deliveryCountry, deliveryInstructions = :deliveryInstructions;
		";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':custNbr', $_SESSION['custNbr']);
		$statement->bindValue(':orderDate', date('Y-m-d'));
		$statement->bindValue(':orderFinalTotal', $_SESSION['orderFinalTotal']);
		//$statement->bindValue(':orderDiscountValue', $_SESSION['orderDiscountValue']);
		$statement->bindValue(':orderDeliveryCharge', $_SESSION['deliveryCharge']);
		$statement->bindValue(':deliveryTo', $_SESSION['deliveryTo']);
		$statement->bindValue(':deliveryAddress', $_SESSION['deliveryAddress']);
		$statement->bindValue(':deliverySuburb', $_SESSION['deliverySuburb']);
		$statement->bindValue(':deliveryState', $_SESSION['deliveryState']);
		$statement->bindValue(':deliveryPostCode', $_SESSION['deliveryPostCode']);
		$statement->bindValue(':deliveryCountry', $_SESSION['deliveryCountry']);
		$statement->bindValue(':deliveryInstructions', $_SESSION['deliveryInstructions']);
		
		//execute the sql statment
		$statement->execute();
	} //end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error adding order: ".$e->getMessage();
		exit();						
	}//end of catch block
	
	// After creating the orders record get the number of the order
	$_SESSION['orderNbr'] = $pdo->lastInsertId();
}

//-----------------------------------------------------------------------------------------------------------------------------------

function insertORderedProductRecord(){
	// connect to the database
	include "includes/connect.php";
	
	//read cart and add record to table
	foreach($_SESSION['cart'] as $prodId => $value){
		//store required details in variables
		$qtyOrdered =$_SESSION['cart'][$prodId]['qtyOrdered'];
		$listPrice =$_SESSION['cart'][$prodId]['listPrice'];
		
	
	try{
		//creat SQL insert statement
		$sql = "INSERT INTO ass_orderDetail SET orderNbr = :orderNbr, prodId = :prodId, qtyOrdered = :qtyOrdered, 
		listPrice = :listPrice;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':orderNbr', $_SESSION['orderNbr']);
		$statement->bindValue(':prodId', $prodId);
		$statement->bindValue(':qtyOrdered', $qtyOrdered);
		$statement->bindValue(':listPrice', $listPrice);
		
		//execute the sql statment
		$statement->execute();
	} //end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error adding order product: ".$e->getMessage();
		exit();						
	}//end of catch block
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------

function updateProductQtyOnHand(){
	// connect to the database
	include "includes/connect.php";
	
	//read cart and add record to table
	foreach($_SESSION['cart'] as $prodId => $value){
		//store required details in variables
		$qtyOrdered = $_SESSION['cart'][$prodId]['qtyOrdered'];
		$listPrice = $_SESSION['cart'][$prodId]['listPrice'];
		$qtyOnHand = $_SESSION['cart'][$prodId]['qtyOnHand'];
		
		// calculate new quantity on hand for the product
		$newQtyOnHand = $qtyOnHand - $qtyOrdered;
		
	
	try{
		//creat SQL insert statement
		$sql = "UPDATE ass_product SET qtyOnHand = :qtyOnHand WHERE prodId = :prodId;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':qtyOnHand', $newQtyOnHand);
		$statement->bindValue(':prodId', $prodId);
		
		//execute the sql statment
		$statement->execute();
	} //end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error adding update product quantity on hand: ".$e->getMessage();
		exit();						
	}//end of catch block
	}
}
?>