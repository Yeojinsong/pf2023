<?php if (session_id() =='') session_start();

/*
Filename: registration.php
Author: Yeojin	Song
Date: 14 March 2018
Description: registration page for Fruits 'R' Us website
*/

// set the page title
$pageTitle = "registration";

// import the head section
include "includes/head.php";
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

			<!-- introduction row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">Customer Registration</h1>
							
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" onsubmit="return checkAddCustomer(this);">
					<!--onsubmit it works first -->
						<p>
							* Email: <input type="text" name="email" maxlength="50" size="40" value=""><br>							
						</p>
						<p>
							First Name: <input type="text" name="firstName" maxlength="30" size="20" value=""><br>							
						</p>
						<p>
							* Last Name: <input type="text" name="lastName" maxlength="30" size="20" value=""><br>							
						</p>
						<p>
							* Address: <input type="text" name="address" maxlength="50" size="40" value=""><br>							
						</p>
						<p>
							* Suburb: <input type="text" name="suburb" maxlength="30" size="20" value="" ><br>							
						</p>
							* State(Please select from the drop down list): 
							<p>
								<select name="stateId" size="1">
									<option value="">No State</option>
									<?php
									//call function to generate list of states
									getStateList();
									?>
								</select>
							</p>
						<p>
							* Post Code: <input type="text" name="postCode" maxlength="4" size="4" value=""><br>							
						</p>
						<p>
							* Password (7 to 12 characters): <input type="password" name="passWord" maxlength="12" size="20" value=""><br>							
						</p>
						<p>
							* Confirm Password: <input type="password" name="passWordConfirm" maxlength="12" size="20" value=""><br>							
						</p>
							<input type="submit" name="registrationSubmit" value="Add Registration">
							<input type="reset" name="Reset Form">
					</form>
				</section>
			</div> <!-- end of introduction row -->

			<br>
			
		</section> <!-- end of main content -->

		<!-- import the footer section -->
		<?php  
			//import the social media
			include "includes/socialMedia.php"; 
			//import the footer section 
			include "includes/footer.php";
		?>
	</body>
</html>


<?php
if(isset($_POST['registrationSubmit'])){
	// capture email data from form and clean 
	$email = cleanInput($_POST['email']);
	
	// connect to the database
	include "includes/connect.php";
	
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
		
		//stop script cuntinuing
		exit();
	}//end of number of matches test
	
	// capture data from form
	$firstName = cleanInput($_POST['firstName']);
	$lastName = cleanInput($_POST['lastName']);
	$address = cleanInput($_POST['address']);
	$suburb = cleanInput($_POST['suburb']);
	$stateId = cleanInput($_POST['stateId']);
	$postCode = cleanInput($_POST['postCode']);
	$passWord = cleanInput($_POST['passWord']);
	
	// prepare and run sql insert statement
	
	// write a sql statement to get data from the tbl_product table
	try {
		//create our SQL statment
		$sql = "INSERT INTO tbl_customer SET email = :email, firstName = :firstName, 
		lastName = :lastName, dateJoined = :dateJoined, discountRate = :discountRate, address = :address, suburb = :suburb, stateId = :stateId, 
		postCode = :postCode, passWord = :passWord;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':email', $email);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':dateJoined', date('Y-m-d'));
		$statement->bindValue(':discountRate', 0.00);
		$statement->bindValue(':address', $address);
		$statement->bindValue(':suburb', $suburb);
		$statement->bindValue(':stateId', $stateId);
		$statement->bindValue(':postCode', $postCode);
		$statement->bindValue(':passWord', sha1($passWord));
		
		//execute the sql statment
		$statement->execute();
	}//end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error inserting customer recode:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	
	
	//display sucess message
	
	echo "<script type='text/javascript'>alert('Registration Suceessful')</script>";
	
	
	
	
	
	
}
?>