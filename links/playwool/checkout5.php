<?php if (session_id() == '') session_start();

/*
Filename: Checkout.php
Author: Yeojin Song 102060145
Date: 27 May 2018
Last Updated:
Description: Checkout 5 for the Play Wool Website
*/

// set the page title
$pageTitle = "Order Confirmed";

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
			<div class="py-5 text-center">
				<img class="d-block mx-auto mb-4" src="images/RECEIPT.png" width="200" alt="checkout cart">
			</div>
		<!--Return customer to index page.-->
		<form class="well form-horizontal"action="index.php" method="post" id="contact_form">		
			<fieldset>
				<legend><center><h2><b>Your Order confirmed.</b></h2></center></legend><br>				
				<div class="form-group">
				<p class="text-center">Back to home page</p>				 
				</div>
				<!-- button for send user to index page-->
				<div class="text-center">				
					<input type="submit" name="checkout5Submit" value="HOME" class="btn btn-info">	
				</div>
			</fieldset>
		</form>
			<?php  
				//import the social media
				include "includes/socialMedia.php"; 
			?>
		</div><!-- /.container -->
			<?php  
			//import the footer section 
				include "includes/footer.php";
			?>
	
  </body>
</html>