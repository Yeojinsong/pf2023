<?php
/*
File Name: functions.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi
Date Created: 6/08/2018
Date Last updated: 31/08/2018
Last Updated By: Daniel Busch
Description: functions for Kara House Website
Version Number: 0.3
*/

function cleanInput($data) {
	// 'cleans' the input from a form

	$data = trim($data); // removes extra spaces, tabs, new lines
	$data = stripslashes($data); // remove back slashes
	$data = htmlspecialchars($data); // convert special characters to entity codes

	return $data;
} // end of cleanInput function

// =================================================================================

// checks customer login details to make sure they are correct.
function checkUserLogin($e, $p) {
	// connect to the data base
	include "connect.php";

	try {
		// create our SQL statement
		$sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password;";


		//Prepare the statement
		$statement = $pdo->prepare($sql);

		//Bind the values to the statement's placeholders
		$statement->bindValue(':email', $e);
		$statement->bindValue(':password', $p);

		//Execute the SQL
		$statement->execute();
	} // End of try block
	catch(PDOException $e) {
		//create an error message with the exception details
		echo "Error checking customer login credentials: ".$e->getMessage();

		//stop script from continuing
		exit();
	// end of catch block
	}

	// get count of rows in $statement
	$nbrOfRows = $statement->rowCount();

	// assign admin details to session variables
	$_SESSION['email'] = $e;

	$emailCheck = $_SESSION['email'];

	if(isset($_SESSION['diff'])) {
		$diff = $_SESSION['diff'];
	}

	try {
		// create our SQL statement
		$sql = "SELECT userRole, userLocked FROM tbl_user WHERE email = '$emailCheck';";

		$resultSet = $pdo->query($sql);
	} // End of try block

	catch(PDOException $e) {
		//create an error message with the exception details
		echo "Error retrieving database information: ".$e->getMessage();

		//stop script from continuing
		exit();
	// end of catch block
	}

	foreach($resultSet as $row) {
		$userLocked = $row['userLocked'];
		$userRole = $row['userRole'];
	}

	if ($userLocked == 1) {

		// invalid credentials error
		echo "<script type='text/javascript'>alert('Too many failed login attempts.\\n \\nAccount has been locked for 30 minutes.\\n \\nElapsed time ". gmdate('H:i:s', $diff) . "');</script>";
	} else {
		if ($nbrOfRows == 1) {
			// setup login session variables
			$_SESSION['login'] = "valid";
			$_SESSION['userRole'] = $userRole;

		} else {
			// setup login session variables
			$_SESSION['login'] = "invalid";

			// invalid credentials error
			echo "<script type='text/javascript'>alert('Invalid email or password, log in attempt was unsuccessful.');</script>";
		}
	}
}

// ================================================================

function logInFail() {
	// set up the sssion variable
	if (!isset($_SESSION['logInAttempts'])) {
		$_SESSION['logInAttempts'] = 0;
	}

	// set the counter to the value of the session variable
	$counter = $_SESSION['logInAttempts'];
	// my understanding is that this will convert counter into an interger (?) Not sure I actually ned this though
	$counter = (int)$counter;

	if (isset($_POST['adminLogInSubmit']) && $_SESSION['login'] == "invalid") {
		// add one to the login attempt counter
		$counter++;

		if ($counter > 5) {
			$counter = 5;
		}
		// set the session variable to the value of counter.
		$_SESSION['logInAttempts'] = $counter;
	} else if ($_SESSION['login'] == "valid") {
		// When log in is successful, reset the counters
		$counter = 0;
		$_SESSION['logInAttempts'] = $counter;
	}

	if ($_SESSION['accountLocked'] == 1) {
		$counter = 0;
		$_SESSION['logInAttempts'] = $counter;
	}

}
// ================================================================

function lockAccount() {
	try {
		include "includes/connect.php";

		$emailCheck = $_SESSION['email'];

		$sql = "UPDATE tbl_user SET userLocked = 1, lastLocked = now() WHERE email = '$emailCheck';";

		$statement = $pdo->prepare($sql);

		$statement->execute();

	} catch (PDOException $e) {
		//create an error message with the exception details
		echo "Error updating account status: ".$e->getMessage();

		//stop script from continuing
		exit();
	}
}

// ================================================================

function unlockAccount() {
	include "includes/connect.php";

	$emailCheck = $_SESSION['email'];

	//try {

		//$sql = "SELECT * FROM tbl_user WHERE email = '$emailCheck';";

		//Prepare the statement
		//$statement = $pdo->prepare($sql);

		//Execute the SQL
		//$statement->execute();
	//} // End of try block

	//catch(PDOException $e) {
		//create an error message with the exception details
		//echo "Error checking database: ".$e->getMessage();

		//stop script from continuing
		//exit();
	// end of catch block
	//}

	try {

		$sql = "SELECT * FROM tbl_user WHERE email = '$emailCheck';";

		$resultSet = $pdo->query($sql);
	} // End of try block

	catch(PDOException $e) {
		//create an error message with the exception details
		echo "Error checking customer login credentials: ".$e->getMessage();

		//stop script from continuing
		exit();
	// end of catch block
	}

	foreach ($resultSet as $row) {
		$lastLocked = $row['lastLocked'];
	}

	$lockOutTime = 1800;

	// it is my understanding that strtotime converts a datetime pice of data into a
	// unix based time (in total seconds) dependant on how much time has passed since
	// a specific date. so If I check the current time, and then lastLocked from the
	// database and then I minus LastLocked from current time, it should give me the
	// difference in seconds. dividing that by 60 would give me the minutes, but I can
	// just test it to be 1800 (30 minutes).
	// alternatively, I could store the 1800 in the database so that it can't be
	// tampered with as easily (?) though I'm not sure I need to do that.

 	$currentTime = strtotime(date('H:i:s'));

 	if(!$lastLocked == NULL) {
		$_SESSION['diff'] = $currentTime - strtotime($lastLocked);
 	}


	$diff = $currentTime - strtotime($lastLocked);

	if(!isset($_SESSION['diff'])) {

		$diff = 0;

	} else {

		$_SESSION['diff'] = $diff;

	}


	// echo $currentTime . "<br>";

	// echo $lastLocked . "<br>";

	// echo $diff;

	if ($_SESSION['diff'] >= $lockOutTime) {
		try {

			$sql = "UPDATE tbl_user SET userLocked = 0, lastLocked = null WHERE email = '$emailCheck';";

			$statement = $pdo->prepare($sql);

			$statement->execute();

		} catch (PDOException $e) {
			//create an error message with the exception details
			echo "Error updating account status: ".$e->getMessage();

			//stop script from continuing
			exit();
		}
	}
}

// ================================================================

function generatePassword() {
	$target_length=rand(8, 12); // Minimum length of 8 and maximum length of 12

	$min_numbers = 2; //Minimum count of numbers
	$min_specials = 2; //Minimum count of special characters
	$min_capitals = 2; //Minimum count of capital letters

	$password = '';

	$numbers = 0;
	$specials = 0;
	$capitals = 0;
	$length = 0;

	// generate minimum number of numbers
	while ($numbers < $min_numbers) {
		$password .= chr(rand(48, 57)); //numbers
		$numbers+=1;
		$length+=1;
	}

	// generate minimum number of specials
	while ($specials < $min_specials) {
		$specialsArray = array(33,35,45,64,95);
		$password .= chr($specialsArray[array_rand($specialsArray, 1)]); //! or @ or # or _ or -
		$specials+=1;
		$length+=1;
	}

	// generate minimum number of capitals
	while ($capitals < $min_capitals) {
		$password .= chr(rand(65, 90)); //A->Z
		$capitals+=1;
		$length+=1;
	}

	// fill remainder of places in target_length password with lowercase letters
	while ($length <= $target_length) {
		$password .= chr(rand(97, 122)); //a->z
		$length+=1;
	} // end of loop

	// shuffle $password;
	$password = str_shuffle($password);

	return $password;
} // end of function generatePassword

// ================================================================

function sendEmail($email, $password) {
	$to = $email;
	$subject = "Kara House Admin Password Reset";
	$msg = "Your New Password is: " .$password . ".\r\nPlease log in and change your password.";
	$headers = "From: karahouse.org.au";
	mail($to, $subject, $msg, $headers);
}

// ================================================================

function newAccountEmail($email, $password) {
	$to = $email;
	$subject = "Kara House Admin Password Reset";
	$msg = "Your password is: " .$password . " \r\nPlease log in and change your password.";
	$headers = "From: karahouse.org.au";
	mail($to, $subject, $msg, $headers);
}

// ================================================================

function updatePassword() {

	include "includes/connect.php";

	$emailCheck = $_SESSION['email'];

	if (isset($_POST['updatePasswordSubmit'])) {

		$oldPassword = sha1(cleanInput($_POST['oldPassword']));
		$newPassword = sha1(cleanInput($_POST['newPassword']));

		try {

			$sql = "SELECT COUNT(*) FROM tbl_user WHERE password = :password AND email = '$emailCheck';";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':password', $oldPassword);

			$statement->execute();

		} catch (PDOException $e) {

			echo "Error checking old password: " .$e->getMessage();

			exit();
		}

		$nbrOfMatches = $statement->fetchColumn();

		if ($nbrOfMatches > 0) {

			try {

				$sql = "UPDATE tbl_user SET password = :password WHERE email = '$emailCheck';";

				$statement = $pdo->prepare($sql);

				$statement->bindValue(':password', $newPassword);

				$statement->execute();

				echo "<script type='text/javascript'>alert('Your password was successfully changed.')</script>";

			} catch (PDOException $e) {
				echo "Error updating Password: " .$e->getMessage();

				exit();
			}

		} else {
			echo "<script type='text/javascript'>alert('Old password was entered incorrectly.')</script>";
		}
	}
}

// ================================================================






// New User Functions
function getUserRole() {
	// connect to the database
	include "includes/connect.php";
	
	// write a sql statment to get data from the tbl_product table
	try{
		// create our sql statment
		$sql = "SELECT userRole FROM tbl_userRole WHERE active IS TRUE;";
		
		// execute the sql statement and store the output
		$resultSet = $pdo->query($sql);
	}	// end of try block
	
	// waht to do if sql statement fails
	catch(PDOException $e) {
		// create an error message with exception details
		echo "Error fetching user roles: ".$e->getMessage();
		
		// stop script from continuing
		exit();					
	} //end of catch block
	
	foreach($resultSet as $row) {
		//store row data in variables
		$userRole = $row['userRole'];
		
		// put data into drop down list
		echo "<option value='$userRole'>$userRole</option>";

	} // end of foreach

} //end of getUserRole

function getUserRoleWithSelection($selectedUserType) {
	// connect to the database
	include "includes/connect.php";
	
	// write a sql statment to get data from the tbl_product table
	try{
		// create our sql statment
		$sql = "SELECT userRole FROM tbl_userRole;";
		
		// execute the sql statement and store the output
		$resultSet = $pdo->query($sql);
	}	// end of try block
	
	// waht to do if sql statement fails
	catch(PDOException $e) {
		// create an error message with exception details
		echo "Error fetching User Roles: ".$e->getMessage();
		
		// stop script from continuing
		exit();					
	} //end of catch block
	
	foreach($resultSet as $row) {
		//store row data in variables
		$userType = $row['userRole'];

		
		// put data into drop down list
		echo "<option value='$userType'";
		if ($userType == $selectedUserType) {
			echo " selected";
		}
		echo ">$userType</option>";

	} // end of foreach

} //end of getStateListWithSelection


function getPrintOrder() {
	// connect to the data base
	include "includes/connect.php";

	// write and sql statement o get data from the tbl_product table
	try {
		// create our SQL statement
		$sql = "SELECT printOrder FROM tbl_mediaType;";

		// Executethe sql statement and store the output
		$resultSet = $pdo->query($sql);

		$rowCount = $resultSet->rowCount();
	} // end of try block

	// what ot do if sql statement fails
	catch(PDOException $e) {
		//create an error message with the exception details
		echo "Error fetching Print Order: ".$e->getMessage();

		//stop script from continuing
		exit();
	}// end of catch block

	for($i = 1; $i <= $rowCount; $i++) {
		echo "<option value='$i'>$i</option>";
	}

	$nextPrintOrder = $rowCount + 1;
	echo "<option value='$nextPrintOrder' selected>$nextPrintOrder</option>";
}

function listPrintOrder($currentPrintOrder) {
	// connect to the data base
	include "includes/connect.php";

	// write and sql statement o get data from the tbl_product table
	try {
		// create our SQL statement
		$sql = "SELECT displayType FROM tbl_mediaType;";

		// Executethe sql statement and store the output
		$resultSet = $pdo->query($sql);

		// rowcount
		$rowCount = $resultSet->rowCount();
	} // end of try block

	// what ot do if sql statement fails
	catch(PDOException $e) {
		//create an error message with the exception details
		echo "Error fetching Print Order: ".$e->getMessage();

		//stop script from continuing
		exit();
	}// end of catch block

	for($i = 1; $i <= $rowCount; $i++) {
		?>
		<option value='<?php echo $i; ?>' <?php if ($i == $currentPrintOrder) {echo 'selected';} ?>><?php echo $i; ?></option>
		<?php
	}
}

// ================================================================

function getPositionList() {
	// connect to the database
	include "includes/connect.php";
					
	// writea sql statement to get data from the tbl_committee table
	try {
		// create our sql statement 
		$sql = "SELECT committeePosition FROM tbl_committeePosition WHERE active IS TRUE;";
						
		// execute our SQL statement and store the output
		$resultSet = $pdo->query($sql);
	} // end of try block
					
	// what to do if sql statement fails
	catch(PDOException $e) {
			// create an error message with the exception details
			echo "Error fetching positions: ".$e->getMessage();
						
			// stop script from continuing
			exit();
		} // end of catch block

	
	foreach($resultSet as $row) {
		// store row data in variables
		$committeePosition = $row['committeePosition'];
		
		// put data into drop down list
		echo "<option value='$committeePosition'>$committeePosition</option>";
		
		
	}	// end of foreach


} // end of getPositionList function

// ================================================================

// This function will get the position list selection
function getCommitteePosition($selectedPosition) {
	// connect to the database
	include "includes/connect.php";
					
	// writea sql statement to get data from the tbl_committee table
	try {
		// create our sql statement 
		$sql = "SELECT committeePosition FROM tbl_committeePosition WHERE active IS TRUE;";
						
		// execute our SQL statement and store the output
		$resultSet = $pdo->query($sql);
	} // end of try block
					
	// what to do if sql statement fails
	catch(PDOException $e) {
			// create an error message with the exception details
			echo "Error fetching positions: ".$e->getMessage();
						
			// stop script from continuing
			exit();
		} // end of catch block

	
	foreach($resultSet as $row) {
		// store row data in variables
		$position = $row['committeePosition'];
		
		// put data into drop down list
		echo "<option value='$position'";
		if ($position == $selectedPosition) {
			echo " selected";
		}
		echo ">$position</option>";
	}	// end of foreach
} // end of getCommitteePosition function
?>
