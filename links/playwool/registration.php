<?php if (session_id() =='') session_start();

/*
Filename: registration.php
Author: Yeojin Song 102060145
Date: 14 March 2018
Description: Registration page for Play Wool website
*/

// set the page title
$pageTitle = "Registration";

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
    <div class="container">

		<form class="well form-horizontal"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" onsubmit="return checkAddCustomer(this);"  id="contact_form">
			<fieldset>

			<!-- Form Name -->
			<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

				<!-- email input-->
				<div class="form-group">
				  <label class="col-md-4 control-label">E-Mail</label>  
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
					</div>
				  </div>
				</div>

				<!-- First Name input-->

				<div class="form-group">
				  <label class="col-md-4 control-label">First Name</label>  
				  <div class="col-md-4 inputGroupContainer">
				  <div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <input  name="firstName" placeholder="firstName" class="form-control"  type="text">
					</div>
				  </div>
				</div>

				<!-- Last Name input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Last Name</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <input name="lastName" placeholder="lastName" class="form-control"  type="text">
					</div>
				  </div>
				</div>

				<!-- Address input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Address</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="address" placeholder="Address" class="form-control"  type="text">
					</div>
				   </div>
				</div>
				<!-- Suburb input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Suburb</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="suburb" placeholder="suburb" class="form-control"  type="text">
					</div>
				   </div>
				</div>

				<!-- State input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >State</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="state" placeholder="state" class="form-control"  type="text">
					</div>
				   </div>
				</div>

				<!-- postCode input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Post Code</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="postCode" placeholder="postCode" class="form-control"  type="number">
					</div>
				   </div>
				</div>

				<!-- country input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Country</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				  <input name="country" placeholder="country" class="form-control"  type="text">
					</div>
				   </div>
				</div>

				<!-- passWord input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Password <small>(password musb be 7 to 12)</small></label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
				  <input name="passWord" placeholder="passWord" class="form-control"  maxlength="12" size="20" type="password">
					</div>
				   </div>
				</div>

				<!-- password Confirm input-->

				<div class="form-group">
				  <label class="col-md-4 control-label" >Password Confirm</label> 
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
				  <input name="passWordConfirm" placeholder="passWordConfirm" class="form-control"  maxlength="12" size="20" type="password">
					</div>
				   </div>
				</div>

				<!-- RESET Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label"></label>
				  <div class="col-md-4"><br>
					  <button type="reset" class="btn btn-default" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRESET <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>

				<!-- SUBMIT Button -->
					  <button type="submit" name="registrationSubmit" class="btn btn-info" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
				  </div>
				</div>

			</fieldset>
		</form>
		</div><!-- /.container -->

						

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
	//when user click submit button it runs
if(isset($_POST['registrationSubmit'])){
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
	$state = cleanInput($_POST['state']);
	$postCode = cleanInput($_POST['postCode']);
	$country = cleanInput($_POST['country']);
	$passWord = cleanInput($_POST['passWord']);
	
	// prepare and run sql insert statement
	
	// write a sql statement to get data from the tbl_product table
	try {
		//create our SQL statment
		$sql = "INSERT INTO ass_customer SET email = :email, firstName = :firstName, 
		lastName = :lastName, dateJoined = :dateJoined, address = :address, suburb = :suburb, state = :state, 
		postCode = :postCode, country = :country, totalSales = :totalSales, passWord = :passWord;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':email', $email);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':dateJoined', date('Y-m-d'));
		$statement->bindValue(':address', $address);
		$statement->bindValue(':suburb', $suburb);
		$statement->bindValue(':state', $state);
		$statement->bindValue(':postCode', $postCode);
		$statement->bindValue(':country', $country);		
		$statement->bindValue(':totalSales', 0.00);
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