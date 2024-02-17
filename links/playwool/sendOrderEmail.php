<?php  if (session_id() =='') session_start();

/*
Filename: sendOrderEmail.php
Author: Yeojin Song 102060145
Date: 27 February 2018
Description: send order email page for Play Wool website
*/

// set the page title
$pageTitle = "Send order email";

// import the function section
include "includes/myFunctions.php";

if(isset($_POST['Checkout4Submit'])){
	// capture email data from form and clean 
	
	$email = cleanInput($_POST['email']);
	
	// connect to the database
	include "includes/connect.php";
	try{
		$sql = "SELECT COUNT(*) FROM ass_customer WHERE email = :email;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':email', $email);
		
		//execute the sql statment
		$statement->execute();
	} //end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error checking for duplicate email:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	//get number of matches from result set 
	$nbrOfMatches = $statement->fetchColumn(); //returne the value 
	
	//test if number of matches = 0
	if($nbrOfMatches == 0){
		
		//display invaild email message		
		echo "<script type='text/javascript'>alert('Email not on file')</script>";
				
		//stop script cuntinuing
		exit();
	}//end of number of matches test
	
	if(isset($_POST['Checkout4Submit'])){
		//capture payment details and store in session variables
		$paymentType = $_POST['paymentType'] = cleanInput($_POST['paymentType']);
		$paymentRef = $_POST['paymentRef'] = cleanInput($_POST['paymentRef']);
		
		//capture date and store in session variable in Australian Format
		$orderDate = $_POST['orderDate'] = date('d-m-y');
		
		$name = $_POST['firstName'] .$_POST['lastName'];
		$deliveryTo = $_POST['deliveryTo'];
		$deliveryAddress = $_POST['deliveryAddress'];
		$deliverySuburb = $_POST['deliverySuburb'];
		$deliveryState = $_POST['deliveryState'];
		$deliveryPostCode = $_POST['deliveryPostCode'];
		$deliveryCountry = $_POST['deliveryCountry'] ;
		$deliveryCharge = $_POST['deliveryCharge'] ;
		$deliveryInstructions = $_POST['deliveryInstructions'] ;
		$cartString = $_POST['cartString'] ;
		
		
		$orderTotal = number_format($_POST['orderTotal'],2);
		
		//calcualted extended value
		$extendedValue = 0;
		
		// add exteneded value to grand total
		
		$subTotal = $_POST['subTotal'] ;
		
	}
	
	// send out the email.
	$to = $email;
	$subject = "Payment Details";
	$msg = "<html>
	<head>
	<title>bla</title>
	</head>
	
	<body>
		<h1>$subject</h1>
		<h3>ORDER CONFIRMATION</h3>
		<!-- delivery details -->
		<table>
			<tr>
				<th colspan='4'>Delivery Details</th>
			</tr>
			<tr>
				<th>Charge To:</th>
				<td>$name</td>
				<th>Delivery To:</th>
				<td>$deliveryTo</td>
			</tr>
			<tr>
				<th>Delivery Address:</th>
				<td colspan='3'> $deliveryAddress $deliverySuburb $deliveryState $deliveryPostCode $deliveryCountry</td>
			</tr>
			<tr>
				<th>Delivery Instructions:</th>
				<td colspan='3'>$deliveryInstructions</td>
			</tr>
		</table>
		<!-- end of delivery details -->
		<table>								
			<tr>
				<th colspan='4'>Products</th>
			</tr>
			<tr>
				<th>Product Name</th>
				<th>Quantity Ordered</th>
				<th>List Price $</th>
				<th>Extended Value $</th>
			</tr>
		";
		
		
		$msg .= $cartString;
		
		$msg .= "
		<!-- before closing the table the display sub total -->
		<tr>
		<td colspan='3' class='right'>Sub Total: </td>
		<td class='right'>".number_format($subTotal,2)."</td></tr>
		
		<!-- display the shipping value -->
		<tr>
		<td colspan='3' class='right'>Delivery Charge: </td>
		<td class='right'>$deliveryCharge</td></tr>		
	
		<!-- display the shipping value -->
		<tr>
		<td colspan='3' class='right'><strong>Grand Total: </strong></td>
		<td class='right'><strong>$orderTotal</strong></td></tr>
	</table>
	
	</body>
	
	</html>";
	$headers = "From: playwool.com.au";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	
	//if return value is fales
	//mail($to, $subjet, $msg, $headers);
	if (!mail($to, $subject, $msg, $headers)){
		//display invaild password reset message		
		echo "<script type='text/javascript'>alert('Something went wrong. Please try again later.')</script>";
				
		//stop script cuntinuing
		exit();
	}//end of number of email sent test
		
		
		//display sucess message
		echo "<script type='text/javascript'>alert('invoice sent to email: $email')</script>";
	
// return to checkout file
header("Location: /ictprg413/s102060145/assignment/checkout5.php");
	// force the exit from this file if return fails
exit();
}//end of isset test
?>

	
	
	
	
	
	
	