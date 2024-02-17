<?php  if (session_id() =='') session_start();

/*
Filename: Update Personal Detail.php
Author: Yeojin Song
Date: 11 April 2018
Description: Update Personal Detail page for Fruits 'R' Us website
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
			$sql = "SELECT COUNT(*) FROM tbl_customer WHERE email = :email;";
			
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
	$stateId = cleanInput($_POST['stateId']);
	$postCode = cleanInput($_POST['postCode']);
	
	// prepare and run sql update statement
	// write a sql statement to get data from the tbl_product table
	try {
		//update  SQL statment
		$sql = "UPDATE tbl_customer SET email = :email, firstName = :firstName, lastName = :lastName, 
				address = :address, suburb = :suburb, stateId = :stateId, postCode = :postCode WHERE custNbr = :custNbr;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':email', $email);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':address', $address);
		$statement->bindValue(':suburb', $suburb);
		$statement->bindValue(':stateId', $stateId);
		$statement->bindValue(':postCode', $postCode);
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
	$_SESSION['stateId'] = $stateId;
	$_SESSION['postCode'] = $postCode;
	
	//update delivery info too		
	$_SESSION['deliveryTo'] = $firstName." ". $lastName;
	$_SESSION['deliveryAddress'] = $address;
	$_SESSION['deliverySuburb'] = $suburb;
	$_SESSION['deliveryStateId'] = $stateId;
	$_SESSION['deliveryPostCode'] = $postCode;
	
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

		<!-- main content -->
		<section class="container mainContent">

			<!-- Update Personal Detail row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">Update Personal Details</h1>
					<?php
					// test is user logged in before display update info .only user loged in it will display.					
					if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
					// for form html close php.
					?> 	<!--onsubmit for check valid customer -->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" onsubmit="return checkUpdateCustomer(this);">
						<!--onsubmit it works first -->
							<p>
								* Email: <input type="text" name="email" maxlength="50" size="40" value="<?php echo $_SESSION['email'];?>"><br>	<!--this session come from myfunctions.php checkcustomerslogin-->						
							</p>
							<p>
								First Name: <input type="text" name="firstName" maxlength="30" size="20" value="<?php echo $_SESSION['firstName'];?>"><br>							
							</p>
							<p>
								* Last Name: <input type="text" name="lastName" maxlength="30" size="20" value="<?php echo $_SESSION['lastName'];?>"><br>							
							</p>
							<p>
								* Address: <input type="text" name="address" maxlength="50" size="40" value="<?php echo $_SESSION['address'];?>"><br>							
							</p>
							<p>
								* Suburb: <input type="text" name="suburb" maxlength="30" size="20" value="<?php echo $_SESSION['suburb'];?>" ><br>							
							</p>
								* State(Please select from the drop down list): 
								<p>
									<select name="stateId" size="1">
										<!--<option value="">No State</option>user already selected something so we don't need it in update form.-->
										<?php
										//call function to generate list of states
										getStateListWithSelection($_SESSION['stateId']);
										?>
									</select>
								</p>
							<p>
								* Post Code: <input type="text" name="postCode" maxlength="4" size="4" value="<?php echo $_SESSION['postCode'];?>"><br>							
							</p>
							
								<input type="submit" name="updateDetailsSubmit" value="Upate Details">
								<input type="reset" name="Reset Form">
						</form>	
					<?php
					}
					else{
						
						exit();
						
					}
					
					?>
					















				</section>
			</div> <!-- end of Update Personal Detail row -->


		</section> <!-- end of main content -->

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>