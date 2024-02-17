<?php
if (isset($_POST['addUserSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	// test if email already in user_error
	$email = cleanInput($_POST['email']);
	// connect to the datbase
	
	// test if email already in use	
	try {
		// create our sql statment
		$sql = "SELECT COUNT(*) FROM tbl_user WHERE email = :email;";
		
		// prepare the staement
		$statement = $pdo->prepare($sql);

		// bind the values to the statement's paceholders
		$statement->bindValue(':email', $email);
		
		// execute the sql statment
		$statement->execute();
	} // end of try block
	
	// waht to do if sql statement fails
	catch(PDOException $e) {
		// create an error message with exception details
		echo "Error checking for duplicate email: ".$e->getMessage();
		
		// stop script from continuing
		exit();
	} //end of catch block
	
	// get number of matches from resultset
	$nbrOfMatches = $statement->fetchColumn();
	
	// test if number of matches is greater than zero
	if ($nbrOfMatches > 0) {
		// dispaly sucess message
		echo "<script type='text/javascript'>alert('That Email Address is taken. Try another.')</script>";
		
		// stop script from continuing 
		exit();
	} else {
		// capture date from form
		$firstName = cleanInput($_POST['firstName']);
		$lastName = cleanInput($_POST['lastName']);		
		$userRole = cleanInput($_POST['userRole']);
		
		// generate passord
		$password = generatePassword();
		
		// create sql statment
		try{
			// create our sql statment
			$sql = "INSERT INTO tbl_user SET email = :email, firstName = :firstName, lastName = :lastName, userRole = :userRole, password = :password, active = :active;";
			
			
			// prepare the staement
			$statement = $pdo->prepare($sql);

			// bind the values to the statement's paceholders
			$statement->bindValue(':email', $email);
			$statement->bindValue(':firstName', $firstName);
			$statement->bindValue(':lastName', $lastName);
			$statement->bindValue(':password', sha1($password));
			$statement->bindValue(':userRole', $userRole);
			$statement->bindValue(':active', TRUE);
			
			// execute the sql statment
			$statement->execute();		
			
		}	// end of try block
		
		// waht to do if sql statement fails
		catch(PDOException $e) {
			// create an error message with exception details
			echo "Error inserting user record: ".$e->getMessage();  // This error
			
			// stop script from continuing
			exit();		
		} //end of catch block
		
		// send email to new user
		newAccountEmail($email, $password);

		// dispaly success message
		echo "<script type='text/javascript'>
			alert('User Sucessfully Added.\\nTheir password has been sent to their email.\\nIf there are any issues, please contact the administrator.');
			window.history.go(-1);
		</script>";
	}
}
?>