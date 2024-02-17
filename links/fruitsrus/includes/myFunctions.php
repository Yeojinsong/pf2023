<?php
/*
Filename: myFunctions.php
Author: Janet Bott
Date Created: 27 February 2017
Last Update:
Description: User defined functions for the Fruits 'R' Us Website
*/


function cleanInput($data) {
	// 'cleans' the input from a form

	$data = trim($data); // removes extra spaces, tabs, new lines
	$data = stripslashes($data); // remove back slashes
	$data = htmlspecialchars($data); // convert special characters to entity codes

	return $data;
} // end of cleanInput function

// =================================================================================

function getStateList() {
	
	// connect to the database
	include "includes/connect.php";
	
	// write a sql statement to get data from the tbl_product table
	try {
		//create our SQL statment
		$sql = "SELECT stateId, stateName FROM tbl_state;";
		
		//excute the SQL statment and store the output
		$resultSet = $pdo->query($sql);						
	}//end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error fetching states:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	foreach($resultSet as $row){
		// store row data in variables
		$stateId = $row['stateId'];
		$stateName = $row['stateName'];	

		//put data into drop down list
		echo "<option value='$stateId'>$stateName</option>";
	}// end of getStateList function
}
//=================================================================================


function getStateListWithSelection($selectedStateId){
		// connect to the database
	include "includes/connect.php";
	
	// write a sql statement to get data from the tbl_product table
	try {
		//create our SQL statment
		$sql = "SELECT stateId, stateName FROM tbl_state;";
		
		//excute the SQL statment and store the output
		$resultSet = $pdo->query($sql);						
	}//end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error fetching states:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	foreach($resultSet as $row){
		// store row data in variables
		$stateId = $row['stateId'];
		$stateName = $row['stateName'];	

		//put data into drop down list
		echo "<option value='$stateId'";// line 86,  echo have been seprated to put if statement.
		if($stateId == $selectedStateId ){
			echo " selected";
		}
		echo ">$stateName</option>";
	}// end of getStateList function
}

function checkCustomerLogin($email,$passWord){
	
	// connect to the database
	include "includes/connect.php";
	
	//test if email and password are valid
	try{
		//creaet out SQL statement
		$sql = "SELECT * FROM tbl_customer WHERE email = :email AND passWord = :passWord;";
		
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
		$_SESSION['discountRate'] = $row['discountRate'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['suburb'] = $row['suburb'];
		$_SESSION['stateId'] = $row['stateId'];
		$_SESSION['deliveryPostCode'] = $_SESSION['postCode'] = $row['postCode'];
		
		$_SESSION['deliveryTo'] = $row['firstName'] ." ". $row['lastName'];
		$_SESSION['deliveryAddress'] = $row['address'];
		$_SESSION['deliverySuburb'] = $row['suburb'];
		$_SESSION['deliveryStateId'] = $row['stateId'];
		$_SESSION['deliveryInstructions'] = "";
	}
	else{
		// set up login session variables 
		$_SESSION['login'] = "invalid";
		echo "<script type='text/javascript'>alert('Unsuccessul login attempt - Invalid email/password')</script>";
		
	}
	
	
} // end of checkCustomerLogin function

//-----------------------------------------------------------------------------------------------------------------------------------

function getDeliveryCharge($stateId){
	
	// connect to the database
	include "includes/connect.php";
	
	//test if email and password are valid
	try{
		//creaet out SQL statement
		$sql = "SELECT deliveryCharge FROM tbl_state WHERE stateId = :stateId;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':stateId', $stateId);
		
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
	$deliveryCharge = $row['deliveryCharge'];
	
	return $deliveryCharge;
}

//-----------------------------------------------------------------------------------------------------------------------------------

function insertOrderRecord(){
	// connect to the database
	include "includes/connect.php";
	
	try{
		//creat SQL insert statement
		$sql = "INSERT INTO tbl_order SET custNbr = :custNbr, orderDate = :custNbr, orderNetValue = :orderNetValue, 
		deliveryCharge = :deliveryCharge, deliveryTo = :deliveryTo, deliveryAddress = :deliveryAddress, deliverySuburb = :deliverySuburb, 
		deliveryStateId = :deliveryStateId, deliveryPostCode = :deliveryPostCode, deliveryInstructions = :deliveryInstructions;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':custNbr', $_SESSION['custNbr']);
		$statement->bindValue(':orderDate', date('Y-m-d'));
		$statement->bindValue(':orderNetValue', $_SESSION['orderNetValue']);
		$statement->bindValue(':deliveryCharge', $_SESSION['deliveryCharge']);
		$statement->bindValue(':deliveryTo', $_SESSION['deliveryTo']);
		$statement->bindValue(':deliveryAddress', $_SESSION['deliveryAddress']);
		$statement->bindValue(':deliverySuburb', $_SESSION['deliverySuburb']);
		$statement->bindValue(':deliveryStateId', $_SESSION['deliveryStateId']);
		$statement->bindValue(':deliveryPostCode', $_SESSION['deliveryPostCode']);
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
		$sql = "INSERT INTO tbl_orderedProduct SET orderNbr = :orderNbr, prodId = :prodId, qtyOrdered = :qtyOrdered, 
		listPrice = :listPrice, discountedPrice = :discountedPrice;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':orderNbr', $_SESSION['orderNbr']);
		$statement->bindValue(':prodId', $prodId);
		$statement->bindValue(':qtyOrdered', $qtyOrdered);
		$statement->bindValue(':listPrice', $listPrice);
		$statement->bindValue(':discountedPrice', $listPrice);
		
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
		$sql = "UPDATE tbl_product SET qtyOnHand = :qtyOnHand WHERE prodId = :prodId;";
		
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