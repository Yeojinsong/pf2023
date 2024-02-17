<?php  if (session_id() =='') session_start();

/*
Filename: checkout1.php
Author: Yeojin Song
Date: 27 February 2018
Description: checkout1 page for Fruits 'R' Us website
*/

// set the page title
$pageTitle = "Check out 1";

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

			<!-- checkout1 row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">checkout 1</h1>
					
					<br>
					
					<h5><span class="highlight">1. Get delivery details</span> --> 2. Confirm order --> 3. Make payment --> 4. Order recipe</h5>
					
					<?php
					// test the file access correctly
					if(isset($_POST['submitShowCart']) || isset($_POST['loginSubmit']) || isset($_POST['checkout2Return'])){
						//test that user is logged in
						if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
							// display delivery details form
					?>
					
						<!--onsubmit for check valid customer -->
						<form action="checkout2.php" method="post" onsubmit="return checkDeliveryDetails(this);">
						<!--onsubmit it works first -->
							<p>Please make your </p>
							
							<p>
								* Name: <input type="text" name="deliveryTo" maxlength="30" size="20" value="<?php echo $_SESSION['deliveryTo'];?>"><br>							
							</p>
							<p>
								* Address: <input type="text" name="deliveryAddress" maxlength="50" size="40" value="<?php echo $_SESSION['deliveryAddress'];?>"><br>							
							</p>
							<p>
								* Suburb: <input type="text" name="deliverySuburb" maxlength="30" size="20" value="<?php echo $_SESSION['deliverySuburb'];?>" ><br>							
							</p>
								* State(Please select from the drop down list): 
								<p>
									<select name="deliveryStateId" size="1">
										<!--<option value="">No State</option>user already selected something so we don't need it in update form.-->
										<?php
										//call function to generate list of states
										getStateListWithSelection($_SESSION['deliveryStateId']);
										?>
									</select>
								</p>
							<p>
								* Post Code: <input type="text" name="deliveryPostCode" maxlength="4" size="4" value="<?php echo $_SESSION['deliveryPostCode'];?>"><br>							
							</p>
							<p>
								* Dalivery Instructions:
								<textarea name="deliveryInstructions" cols="60" rows="4"><?php echo $_SESSION['deliveryInstructions'];?></textarea>
							</p>
							
								<input type="submit" name="checkou1Submit" value="Continue Checkout">
								<input type="reset" name="Reset Form">
						</form>	
						
					<?php		
						}// end of login test
						else{
							// display not logged in message
							echo "Please login to continue the checkout process!";
						}//end login test
					}	
					else{
						// display no aceess message
						echo "unauthorised access - connot acess this file directly.";
					}// end of file access test
					?>
					















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