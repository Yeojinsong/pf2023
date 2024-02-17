<?php if(session_id() == '') session_start();
/*
Filename: getInvolved.php
Author: Harris salehi 101616136
Date Created: 10/10/18
Date Last updated: 23/11/2018
Last Updated By: Harris salehi
Description: Get Involved page of the Kara House website
*/

// set the page title
$pageTitle = "Get Involved";

// import the head section
include "includes/head.php";
?>

<body>
	<?php
		// include the navbar
		include "includes/nav.php";

		// import quick escape button
		include "includes/quickEscape.php";

		// import the scroll to top of page button
		include "includes/topPage.php";

		include "includes/shared/hero.php";
		hero("activeGetInvolved");
	?>
	
	<div class="container">	
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">HOME</a></li>
				<li class="breadcrumb-item active" aria-current="page">GET INVOLVED</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<h1 class="pageTitle">Get Involved</h1>
				<h1>Donate now</h1>

				<h4 class="mainColour">Your gift will help provide a safe and secure future for women and children.</h4>
				<p>There are many ways to Kara House - financial donation, material aid or partner with us.</p>
			</div>
		</div>

		<?php
			// The donation tab from the home page
			include "includes/shared/donation-area.php";
		?>
		
		<!-- Individual donors section -->
		<div class="row">
			<div class="statDetails col-12">
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent1')">
					<div class="accordionHeading">
						<h3>Individual donors</h3>
						<img class="accordionArrowOpen" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				
				<div class="accordionContentOpen accordionContent1 row">
					<div class="accordionDescription col-lg-12">
						<p>Since 1978 Kara House have found innovative and effective ways to help the clients in our care rebuild stable and secure futures. Your generosity provides vital support for women and children escaping family violence with safe accommodation, emotional support and basic necessities when they need it most.</p>
						
						<?php
							// the donation table from the database 
							include "includes/getInvolved/donationTable.php";
						?>
						<!-- Static accordion content -->
						<p class="margin ">Our support services are funded by the Department of Health and Human Services, but we are continuously fundraising to provide the women and children with basic necessities and programs to improve their long-term outcomes.</p>
						<p class="margin ">100% of your monies donated are used for special programs, project and purchases. All administration costs are funded by the Department of Human Services and Kara House.</p>
						<p class="margin ">To donate via the phone please call <a href="tel:1800900520">1800 900 520</a></p>
						<br>
						
						
						<!-- The other ways to give section - static -->
						<p class="mainColour margin textSize2">Other ways to give</p>
		
						<div>	
							<p class="mainColour waysToGive">Fundraising</p>
							<p class="waysToGive">Organise or take part in a fundraising activity or challenge.</p> 
		
							<br>
							
							<p class="mainColour waysToGive">Gift in will</p>
							<p class="waysToGive">Leaving a bequest creates a lasting impact.</p> 
							
							
							<br>
							
							<p class="mainColour waysToGive">Partner with us</p>
							<p class="waysToGive">There are a number of ways your organisation can partner with Kara House.</p> 
							
							<br>
							
							<p>For more information, please call us on <a href="tel:1800900520">1800 900 520</a> or email <a href="mailto:admin@karahouse.org.au">admin@karahouse.org.au</a></p>
						</div>
					</div>
				</div>
				
				<!-- The Fact Type 1 (top of the page) accordions from the database -->
				<?php
					include "includes/getInvolved/getInvolvedFact.php";
					getInvolvedFact(1);
				?>
				
				<!-- Partner with us section -->
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent3')">
					<div class="accordionHeading">
						<h3>Partner with us</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent accordionContent3">
					<div class="imageRow">	
						<!-- The partners with the logos -->
						<?php
							include "includes/getInvolved/partnerWithUsLogo.php";
						?>
					</div>
					
					<br>
					
					<!-- Partner content that is static -->
					<p>Partnerships with business or organisations are a crucial area of support for Kara House. By Funding programs, hosting fundraising events, getting involved in workplace giving, donating goods in-kind, or supporting us in a myriad of other ways, partnerships enable us to help improve the lives of women and children escaping family violence.</p>
					
					<p>If you would like to support our work, here are some ways your organisation or business can help:</p>
					
					<ul>
					  <li><b>Fund one of our program areas</b> - Improvements to our refuge, support services or programs by supplying much needed items</li>
					  <li><b>Provide pro-bono support</b> - Volunteer your professional skills</li>
					  <li><b>Host a fundraising event</b> - Organise an event within your workplace or community</li>
					  <li><b>Workplace giving programs</b> - Workplace giving enables employees to make a regular donation to the charity of their choice with an automatic deduction of a set amount from their earnings</li>
					  <li><b>Material Aid donations</b> - You can give Material Aid donations</li>
					</ul>
					
					<p>These are just some of the forms of support that partnership can take. We’d love to talk to you about how your business or organisation can get involved and partner with Kara House.</p>
					
					<p>For further information, contact:</p>
					
					<p>Ruby Lampard - Development Officer on <a href="tel:0398995666">(03) 9899 5666</a> or email <a href="mailto:ruby.l@karahouse.org.au">ruby.l@karahouse.org.au</a></p>
					
					<p><b>Thanks</b></p>
					
					<p>We would also like to thank the numerous individuals, businesses and organisations that have kindly supported Kara House.</p>
					
					
					<!-- The partner names from the database -->
					<?php
					include "includes/getInvolved/partnerWithUsContent.php";
					?>
					
				</div>
				
			</div>	
		</div>	
		
		<!-- The Client Stories from the shared includes folder -->
		<?php
		include "includes/shared/clientStories.php";
		clientStories("activeGetInvolved");
		?>
		
		<!-- The Work with us section -->
		<div>
			<h1><b>Work with us</b></h1>
			<p>Kara House is committed to creating a community in which all women and children have the right to live free of family violence, harassment, discrimination and abuse. We are a small, nimble group who providing specialist family violence services that prioritise the safety of our clients.</p>	
		</div>	
		
		<br>
		<!-- The Profesional Positions Section -->
		<div class="row">
			<div class="statDetails col-12">
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent4')">
					<div class="accordionHeading">
						<h3>Current professional positions</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent accordionContent4 row">
					<div class="accordionDescription col-lg-12 ">
						<?php
						// The Profesional Positions from the database
							include "includes/getInvolved/jobVacancyContent.php";
						?>						
						
						<p class="margin">Vacancies are published regularly and if you would like to submit you CV as an expression of interest for future positions, please email <a href="mailto:admin@karahouse.org.au">admin@karahouse.org.au</a></p>
					</div>
				</div>
				
				<!-- The Fact Type 2 (bottom of the page) accordions from the database -->
				<?php
				getInvolvedFact(2);
				?>

			</div>
		</div>
		
		<br>
		
		<!-- The Get Involveds page Connect with us section -->
		<div class="row connectContact">
			<div class="col-sm-6 formBox">
				<h1><b>Connect with us</b></h1>
				<div>	
					<?php
					include "includes/getInvolved/connectWithUsContent.php";
					?>
					<form class="d-inline" id="seekHelpRedirect" action="be-informed.php" method="POST">
						<input type="hidden" name="seekHelpRedirect">
						<a href="javascript:{}" onclick="document.getElementById('seekHelpRedirect').submit();">Our Useful Resources</a>
					</form>
					<p class="d-inline">
						section has more information about other family violence support services and brochures.
					</p>
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
	
	<br>

	<?php
		// include the footer
		include "includes/footer.php";
		
		// include the js links
		include "includes/jsLinks.php";
	?>
</body>
</html>
