<?php if(session_id() == '') session_start();
/*
Filename: index.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi
Date Created: 8/08/2018
Date Last updated: 11/10/2018
Last Updated By: Dahmon Bicheno
Description: Home page of the Kara House website
Version Number: 0.2
*/

// set the page title
$pageTitle = "Home";

// import the head section
include "includes/head.php";

// import quick escape button
include "includes/quickEscape.php";
?>

<body>

	<div class="container">	
		<div class="navLogo">
			<img src="images/Karahouselogo.jpg" alt="Kara house logo" class="homeLogo" >
		</div>
	</div>


	<div class="container">
		<div class="col-12 text-center tempText">
		<br>
		<h1 style="color:#af74af;">The Kara House website is undergoing an upgrade.</h1>
		<h1 style="color:#af74af;">Sorry for any inconvenience.</h1>
		<h1 style="color:#af74af;">You can still contact us by using the form below.</h1>
		<br>
		</div>
		<!-- The Get Involveds page Connect with us section -->
		<div class="row connectContact">
			<div class="col-sm-6 formBox">
				<h1><b>Connect with us</b></h1>
				<div>	
					<?php
					include "includes/getInvolved/connectWithUsContent.php";
					?>
					
				</div>
			</div>

			
			<div class="col-sm-6 formInputs">
				<!-- Connect with us form -->
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return checkGetInvolvedFormInput(this)">
					<div class="row formMargin">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							First name
							<input type="text" class="form-control" name="firstName">
						</div>
						<div class="col-sm-2">
						</div>
					</div>
					
					<div class="row formMargin">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							Last name
							<input type="text" class="form-control" name="lastName" required>
						</div>
						<div class="col-sm-2">
						</div>
					</div>
				
					<div class="row formMargin">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							Email address
							<input type="text" class="form-control" name="email" required>
						</div>
						<div class="col-sm-2">
						</div>
					</div>
					
					<div class="row formMargin">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							Phone number (optional)
							<input type="text" class="form-control" name="phone">
						</div>
						<div class="col-sm-2">
						</div>
					</div>
				
					<div class="row formMargin">
						<div class="col-sm-2">
						</div>
						<div class="form-group col-sm-8">
							Message
							<textarea class="form-control" name="message" rows="3" required></textarea>
						</div>
						<div class="col-sm-2">
						</div>
					</div>
					
					<div class="row formMargin">
						<div class="col-sm-2">
						</div>
						<div class="form-group col-sm-8">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck" required>
								<label class="form-check-label formCheck" for="gridCheck">I agree to the terms and conditions as set out in the Kara House Privacy Policy
								</label>
							</div>
							<button type="submit" class="btn btn-primary float-right formBtn" name="connectFormSubmit">Submit</button>
						</div>
						<div class="col-sm-2">
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>

<?php
	// This will send an email to admin after the submit has been clicked
	if (isset($_POST['connectFormSubmit'])) {
		try {

			$firstName = cleanInput($_POST['firstName']);
			$lastName = cleanInput($_POST['lastName']);
			$emailAddress = cleanInput($_POST['email']);
			$phone = cleanInput($_POST['phone']);
			$message = cleanInput($_POST['message']);

		function sendEmail($firstName, $lastName, $emailAddress, $phone, $message) {
			$email = "mobiusweb.swin@gmail.com";
			$to = $email;
			$subject = "New Message";
			$msg = "Name: ". $firstName ." " . $lastName ."\r\n";
			$msg .= "Email:  $emailAddress \r\n";
			$msg .= "Phone:  $phone \r\n";
			$msg .= "Message:  $message \r\n";
			$headers = "From: $emailAddress";
			mail($to, $subject, $msg, $headers);
		}

		sendEmail($firstName, $lastName, $emailAddress, $phone, $message);

		echo "<script type='text/javascript'>alert('Your message has been sent successfully.')</script>";
		} catch (PDOException $e) {

			echo "Error sending message: " . $e->getMessage();
			
			exit();
		}
	}
	?>
	<?php
		// include the footer
		include "includes/footer.php";
		include "includes/jsLinks.php";
	?>
</body>
</html>
