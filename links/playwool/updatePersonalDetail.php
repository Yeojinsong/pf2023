<?php  if (session_id() =='') session_start();

/*
Filename: Update Personal Detail.php
Author: Yeojin Song 102060145
Date: 11 April 2018
Description: Update Personal Detail page for Play Wool website
*/

// set the page title
$pageTitle = "Update Personal Detail";

// import the head section
include "includes/head.php";

// this code has different location compare with registraion.php
if(isset($_POST['updateDetailsSubmit'])){
	// connect to the database
	include "includes/connect.php";
	
	// capture email data from form and clean 
	$email = cleanInput($_POST['email']);
	// test if email has been changed and if so check if new email already on file.
	if($_SESSION['email'] != $email){
		//test if new eamil is already on file
		
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
		
		//test if number of matches > 0
		if($nbrOfMatches > 0){
			
			//display sucess message		
			echo "<script type='text/javascript'>alert('Email address already on file. Please use antoehr email address to register.')</script>";
			
			//reload page
			echo "<script type='text/javascript'>var url = window.location.pathname; var filename = url.substring(url.lastIndexOf('/')+1); location=filename;</script>";
			
			//stop script cuntinuing
			exit();
		}//end of number of matches test
			
	} // end of email test
	
	// capture data from form
	$firstName = cleanInput($_POST['firstName']);
	$lastName = cleanInput($_POST['lastName']);
	$address = cleanInput($_POST['address']);
	$suburb = cleanInput($_POST['suburb']);
	$state = cleanInput($_POST['state']);
	$postCode = cleanInput($_POST['postCode']);
	$country = cleanInput($_POST['country']);
	
	// prepare and run sql update statement
	// write a sql statement to get data from the ass_product table
	try {
		//update  SQL statment
		$sql = "UPDATE ass_customer SET email = :email, firstName = :firstName, lastName = :lastName, 
				address = :address, suburb = :suburb, state = :state, postCode = :postCode, country = :country WHERE custNbr = :custNbr;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':email', $email);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':address', $address);
		$statement->bindValue(':suburb', $suburb);
		$statement->bindValue(':state', $state);
		$statement->bindValue(':postCode', $postCode);
		$statement->bindValue(':country', $country);
		$statement->bindValue(':custNbr',$_SESSION['custNbr']);		
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
	
	//update session variables 
	$_SESSION['email'] = $email;
	$_SESSION['firstName'] = $firstName;
	$_SESSION['lastName'] = $lastName;
	$_SESSION['address'] = $address;
	$_SESSION['suburb'] = $suburb;
	$_SESSION['state'] = $state;
	$_SESSION['postCode'] = $postCode;
	$_SESSION['country'] = $country;
	
	//update delivery info too		
	$_SESSION['deliveryTo'] = $firstName." ". $lastName;
	$_SESSION['deliveryAddress'] = $address;
	$_SESSION['deliverySuburb'] = $suburb;
	$_SESSION['deliverystate'] = $state;
	$_SESSION['deliveryPostCode'] = $postCode;
	$_SESSION['deliveryCountry'] = $country;
	
	//display sucess message
	echo "<script type='text/javascript'>alert('Suceessfully updateed your personal details')</script>";
	
	
	
	
}// end of update Details Submit
?>
	<body>
		<?php
		// import the nav section
		include "includes/nav.php";

		// import the head section
		include "includes/header.php";

		// import the login modal
		include "includes/loginModal.php";
				
		// import the top of page button
		include "includes/topofpagebutton.php";
		?>
		
		<div class="container">
		<?php
					// test is user logged in before display update info .only user loged in it will display.					
					if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
					// for form html close php.
					?> 	<!--onsubmit for check valid customer -->

		<form class="well form-horizontal"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" onsubmit="return checkUpdateCustomer(this);"  id="contact_form">
			<fieldset>

			<!-- Form Name -->
			<legend><center><h2><b>Update Personal Details</b></h2></center></legend><br>

				<!-- email input-->
				<div class="form-group">
				  <label class="col-md-4 control-label">E-Mail</label>  
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" value="<?php echo $_SESSION['email'];?>">
					</div>
				  </div>
				</div>

				<!-- First Name input-->

				<div class="form-group">
				  <label class="col-md-4 control-label">First Name</label>  
				  <div class="col-md-4 inputGroupContainer">
				  <div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <input  name="firstName" placeholder="firstName" class="form-control"  type="text" value="<?php echo $_SESSION['firstName'];?>">
					</div>
				  </div>
				</div>

				<!-- Last Name input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Last Name</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <input name="lastName" placeholder="lastName" class="form-control"  type="text" value="<?php echo $_SESSION['lastName'];?>">
					</div>
				  </div>
				</div>

				<!-- Address input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Address</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="address" placeholder="Address" class="form-control"  type="text" value="<?php echo $_SESSION['address'];?>">
					</div>
				   </div>
				</div>
				<!-- Suburb input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Suburb</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="suburb" placeholder="suburb" class="form-control"  type="text" value="<?php echo $_SESSION['suburb'];?>">
					</div>
				   </div>
				</div>

				<!-- State input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >State</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="state" placeholder="state" class="form-control"  type="text" value="<?php echo $_SESSION['state'];?>">
					</div>
				   </div>
				</div>

				<!-- postCode input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Post Code</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="postCode" placeholder="postCode" class="form-control"  type="number" value="<?php echo $_SESSION['postCode'];?>">
					</div>
				   </div>
				</div>

				<!-- country input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Country</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="country" placeholder="country" class="form-control"  type="text" value="<?php echo $_SESSION['country'];?>">
					</div>
				   </div>
				</div>

			
				<div class="text-center">
				<input type="reset" name="Reset Form" class="btn btn-default" >
				<input type="submit" name="updateDetailsSubmit" class="btn btn-info" value="Upate Details">
				</div>

			</fieldset>
		</form>
		</div><!-- /.container -->
						
		<?php
		}
		else{
			
			exit();
			
		}
		
		?>
					


		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>