<?php  if (session_id() =='') session_start();

/*
Filename: forgettenPassword.php
Author: Yeojin Song 102060145
Date: 27 February 2018
Description: Forgetten Password page for Play Wool website
*/

// set the page title
$pageTitle = "Forgetten Password";

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
		<!--form capture customers data-->
		<form class="well form-horizontal"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" onsubmit="return checkEmail(this);"  id="contact_form">
		<!--onsubmit it works first -->
			<fieldset>

			<!-- Form Name -->
			<legend><center><h2><b>Forgetten Password</b></h2></center></legend><br>

				<!-- email input-->
				<div class="form-group">
				<p class="text-center">plase enter your email address and submit.</p>
				  <label class="col-md-4 control-label">E-Mail</label>  
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
					</div>
				  </div>
				</div>
				
				<div class="text-center">
					<!-- SUBMIT Button -->
					<input type="submit" name="forgettenPasswordSubmit" value="Reset Password" class="btn btn-info">					
					<!-- RESET Button -->
					<input type="reset" name="Reset Form" class="btn btn-default">
				</div>
			
			</fieldset>
		</form>
		</div><!-- /.container -->





		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>

<?php
if(isset($_POST['forgettenPasswordSubmit'])){
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
	
	// generate random password and send in an email
	$chars = "abcdefghijklmonpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_#!%&*";
	$passwordLength = 9;
	$randomPassword = "";
	
	for ($index = 0; $index < $passwordLength; $index++){
		$randomPassword = $randomPassword . $chars[mt_rand(0, strlen($chars) - 1)];
	}
	
	// add a random number to make the password better
	$randomNbr = mt_rand(0, 999);
	
	$randomPassword = $randomPassword . $randomNbr;

	//display invaild email message		
	echo "<script type='text/javascript'>alert('$randomPassword')</script>";	

	// send out the email.
	$to = $email;
	$subject = "Play Wool Password Reset:";
	$msg = "your password has been reset to " .$randomPassword ."\r\n Please, Log in and update your password";
	$headers = "From: playwool.com.au";
	
	//if return value is fales
	//mail($to, $subjet, $msg, $headers);
	if (!mail($to, $subject, $msg, $headers)){
		//display invaild password reset message		
		echo "<script type='text/javascript'>alert('Your password could not be reset. Please try again later.')</script>";
				
		//stop script cuntinuing
		exit();
	}//end of number of email sent test
	
	//update cusmoter record
	try {
			//update  SQL statment
			$sql = "UPDATE ass_customer SET passWord = :passWord WHERE email = :email;";
			
			// prepare the statement
			$statement = $pdo->prepare($sql);
			
			// bind the values to the statement's placeholders
			$statement->bindValue(':email',$email);		
			$statement->bindValue(':passWord', sha1($randomPassword));
			
			//execute the sql statment
			$statement->execute();
			
		}//end of try block
		
		// what to do if sql statement fails
		catch(PDOException $e){
			// create an error message with excepiton details
			echo "Error resetting password:".$e->getMessage();
			
			// stop script from contiuning
			exit();						
		}//end of catch block
		
		//display sucess message
		echo "<script type='text/javascript'>alert('Suceessfully reset your password')</script>";
}//end of isset test
?>

	
	
	
	
	
	
	