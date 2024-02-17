<?php if(session_id() == '') session_start();
/*
Filename: index.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi
Date Created: 8/08/2018
Date Last updated: 8/08/2018
Last Updated By: Dahmon Bicheno
Description: Home page of the Kara House website
Version Number: 0.1
*/



if (!isset($_SESSION['login'])) {
	$_SESSION['login'] = "";
}

if (!isset($_SESSION['email'])) {
	$_SESSION['email'] = "";
}

if (!isset($_SESSION['accountLocked'])) {
	$_SESSION['accountLocked'] = "";
}

if (!isset($_SESSION['diff'])) {
	$_SESSION['diff'] = "";
}

// set the page title
$pageTitle = "Login";

// import the head section
include "includes/adminHead.php";

if ($_SESSION['accountLocked'] == 1) {
	unlockAccount();
}
?>
<?php

if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
	header("Location: welcome.php");
} else {
?>
<body>
	<div class="loginModal">
		<section class="modalContent">
			<form class="modalInputs" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return checkLogin(this)">
				<div class="form-group">
					<label>Email Address</label>
					<input type="email" name="email" class="form-control" value="" required>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="" required>
				</div>

				<button type="submit" name="adminLogInSubmit" class="formButton">Log In</button>

				<br><br>
				<a href="#forgotPassword" class="forgotPassword" data-toggle="modal">Forgot your password? Click Here</a>
				<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#forgotPassword">
				  Forgot your password? Click here
				</button> -->
			</form>
		</section>
	</div>

	<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" aria-label="forgotPasswordLabel">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return checkEmail(this)">
					<div class="modal-header">
			            <h4 class="modal-title">Forgot Password</h4>
			            <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <div class="modal-body">
						<div class="form-group">
							<label>Enter your email address and click the "Reset Password" button. Your new password will be emailed to you.</label>
							<input type="email" name="email" class="form-control" placeholder="Email Address" value="" required>
						</div>
			        </div>
			        <div class="modal-footer">
						<input class="formButton col-xs-12 col-md-6" type="submit" name="forgotPasswordSubmit" value="Reset Password">
			        </div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php
}

if (isset($_POST['forgotPasswordSubmit'])) {

	$email = cleanInput($_POST['email']);

	// see if the email is actually in use.
	try {

		$sql = "SELECT COUNT(*) FROM tbl_user WHERE email = :email;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':email', $email);

		$statement->execute();

	} catch(PDOException $e) {
		echo "Error fetching database information: ".$e->getMessage();

		exit();
	}

	$nbrOfMatches = $statement->fetchcolumn();

	if ($nbrOfMatches == 0) {
		echo "<script type='text/javascript'>alert('Email address was not found.')</script>";

		exit();
	} else {
		$password = generatePassword();

		// testing
		// echo "<script type='text/javascript'>alert('$password')</script>";

		try {

			$sql = "UPDATE tbl_user SET password = :password WHERE email = :email;";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':password', sha1($password));
			$statement->bindValue(':email', $email);

			$statement->execute();

			sendEmail($email, $password);

			echo "<script type='text/javascript'>alert('Password reset was successful. Your new password has been emailed to you.')</script>";

		} catch (PDOException $e) {
			echo "Error updating password: " .$e->getMessage();

			exit();
		}
	}
}

include "includes/adminJsLinks.php";
?>
</html>
