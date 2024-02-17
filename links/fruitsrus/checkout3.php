<?php  if (session_id() =='') session_start();

/*
Filename: checkout2.php
Author: Yeojin Song
Date: 27 February 2018
Description: checkout1 page for Fruits 'R' Us website
*/

// set the page title
$pageTitle = "Check out 2";

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

			<!-- checkout2 row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">checkout 2</h1>
				
					<br>
					
					<h5>1. Get delivery details --> 2. Confirm order--><span class="highlight"> 3. Make payment</span>  --> 4. Order recipe</h5>
							<?php
					// test the file access correctly
					if(isset($_POST['Checkout2Submit']))
						
					echo "<p>Order Total: $".number_format($_SESSION['orderNetValue'],2)."</p>"
					
					?>
					<!-- payment form -->
					<form action="checkout4.php" method="post" onclick="">
						<label>
						<p>
						<strong>Payment Method</strong><br>
						<input type="radio" name="paymentType" value="paypal" selected><img width="60px" src="images/paypal.svg" alt="paypal">
						<input type="radio" name="paymentType" value="Visa"><img width="60px" src="images/visa.svg" alt="Visa">
						<input type="radio" name="paymentType" value="masterCard"><img width="60px "src ="images/mastercard.svg" alt="Master Card">
						<input type="radio" name="paymentType" value="americanExpress"><img width="60px" src="images/americanexpress.svg" alt="American Express">
						</p>
						<p>
							Card Number<br><input type="number" name="paymentRef" maxlength="16" size="16" value=""><br>							
						</p>
						<p>
							Card Expiration Date<br>
							<select>
							<option value="" selected>Month</option>
							<option>January</option>
							<option>February</option>
							<option>March</option>
							<option>April</option>
							<option>May</option>
							<option>June</option>
							<option>July</option>
							<option>August</option>
							<option>September</option>
							<option>October</option>
							<option>November</option>
							<option>December</option>
							</select>
							<select>
							<option value="" selected>Year</option>
							<option>2018</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							</select>
							<br>							
						</p>
						</label>						
						
						<p>
							card Security Code<br><input type="number" name="cardSecurityCode" maxlength="4" size="4" value="CCV"><br>							
						</p>
						
					<!-- forward -->
						<input type="submit" name="Checkout3Submit" value="Continue Payment">
					</form>
					<br>
		
					<!-- previous -->
					<form action="checkout2.php" method="post">
						<input type="submit" name="checkout2Return" value="Return To Confirm Order">
					</form>
					<br>

				</section>
			</div> <!-- end of checkout1 row -->


		</section> <!-- end of main content -->

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>