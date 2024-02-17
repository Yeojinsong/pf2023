<?php  if (session_id() =='') session_start();

/*
Filename: Change password.php
Author: Yeojin Song 102060145
Date: 11 April 2018
Description: Change password page for Play Wool website
*/

// set the page title
$pageTitle = "Change password";

// import the head section
include "includes/head.php";
// this code has different location compare with registraion.php
if(isset($_POST['changePasswordSubmit'])){
	// connect to the database
	include "includes/connect.php";
	
	//set variable to store status of current password
	$currentPasswordConfirmed = true;
	
	//test if correct current password provided for logged in customer
			
	try{
		$sql = "SELECT COUNT(*) FROM ass_customer WHERE custNbr = :custNbr AND passWord = :passWord ;";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':custNbr', $_SESSION['custNbr']);
		$statement->bindValue(':passWord', sha1(cleanInput($_POST['passWord'])));
		
		
		//execute the sql statment
		$statement->execute();
	} //end of try block

		// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Incorrect password:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	//get number of matches from result set 
	$nbrOfMatches = $statement->fetchColumn(); //returne the value 
	
	//test if number of matches > 0
	if($nbrOfMatches == 0){
		//display sucess message		
		echo "<script type='text/javascript'>alert('Invalid current password - please try again.')</script>";
		$currentPasswordConfirmed = false;
	}//end of number of matches test
			
	// if we have confirmed password it will run
	if($currentPasswordConfirmed == true){
		try {
			//update  SQL statment
			$sql = "UPDATE ass_customer SET passWord = :passWord WHERE custNbr = :custNbr;";
			
			// prepare the statement
			$statement = $pdo->prepare($sql);
			
			// bind the values to the statement's placeholders
			$statement->bindValue(':custNbr',$_SESSION['custNbr']);		
			$statement->bindValue(':passWord', sha1(cleanInput($_POST['passWordNew'])));
			
			//execute the sql statment
			$statement->execute();
			
		}//end of try block
		
		// what to do if sql statement fails
		catch(PDOException $e){
			// create an error message with excepiton details
			echo "Error updating password:".$e->getMessage();
			
			// stop script from contiuning
			exit();						
		}//end of catch block
		
		//display sucess message
		echo "<script type='text/javascript'>alert('Suceessfully updateed your password')</script>";
	}
	
	
	
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

			<form class="well form-horizontal"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" onsubmit="return checkUpdatePassWord(this);"  id="contact_form">
			<!--onsubmit it works first -->
				<fieldset>

				<!-- Form Name -->
				<legend><center><h2><b>Change Password</b></h2></center></legend><br>
				
					<!--current passWord input-->

					<div class="form-group">
					  <label class="col-md-4 control-label" >Current Password</label> 
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
					  <input name="passWord" placeholder="" class="form-control"  maxlength="12" size="20" type="password">
						</div>
					   </div>
					</div>
					
					<!-- New passWord input-->

					<div class="form-group">
					  <label class="col-md-4 control-label" >New Password <small>(password musb be 7 to 12)</small></label> 
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
					  <input name="passWordNew" placeholder="" class="form-control"  maxlength="12" size="20" type="password">
						</div>
					   </div>
					</div>
					
					<!-- New password Confirm input-->
					
					<div class="form-group">
					  <label class="col-md-4 control-label" >Password Confirm</label> 
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
					  <input name="PassWordNewConfirm" placeholder="" class="form-control"  maxlength="12" size="20" type="password">
						</div>
					   </div>
					</div>

					<div class="text-center">
					<input type="reset" name="Reset Form" class="btn btn-default" >
					<input type="submit" name="changePasswordSubmit" class="btn btn-info" value="Change Password">
					</div>
				
				</fieldset>
			</form>
		</div><!--container end-->
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