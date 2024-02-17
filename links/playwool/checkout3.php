<?php  if (session_id() =='') session_start();

/*
Filename: Checkout 3.php
Author: Yeojin Song
Date: 27 May 2018
Description: Checkout 3 page for Play Wool website
*/

// set the page title
$pageTitle = "Payment";

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
				<img class="d-block mx-auto mb-4" src="images/paymentIcon.png" width="200" alt="checkout cart">
				<h2>Payment</h2>
				<p class="lead">Delivery details >> Confirmation >> <strong>Payment >></strong> Order Recipe</p>
			 </div>
			 
			<?php
				// test the file access correctly
				if(isset($_POST['Checkout2Submit']))
					
				echo "<h2 class='text-center'><Strong>Order Total: $".number_format($_SESSION['orderFinalTotal'],2)."</strong></h2>"
				
			?>

			<form class="well form-horizontal" action="checkout4.php" method="post" onsubmit="">
			
				<fieldset>

					<!--Payment Method input-->

					<div class="form-group">
					  <label class="col-md-4 control-label" >Payment Method</label> 
						<div class="col-md-4 inputGroupContainer">
					  <input type="radio" name="paymentType" value="paypal" selected><img width="60px" src="images/paypal.svg" alt="paypal">
							<input type="radio" name="paymentType" value="Visa"><img width="60px" src="images/visa.svg" alt="Visa">
							<input type="radio" name="paymentType" value="masterCard"><img width="60px "src ="images/mastercard.svg" alt="Master Card">
							<input type="radio" name="paymentType" value="americanExpress"><img width="60px" src="images/americanexpress.svg" alt="American Express">
					   </div>
					</div>
					
					<!-- New passWord input-->

					<div class="form-group">
					  <label class="col-md-4 control-label" >Name on card</label> 
						<div class="col-md-4 inputGroupContainer">
					  <input type="text" name="paymentName"class="form-control" placeholder="" >
					   </div>
					</div>
					
					<!-- Credit card number input-->

					<div class="form-group">
					  <label class="col-md-4 control-label" >Credit card number</label> 
						<div class="col-md-4 inputGroupContainer">
					  <input type="number" name="paymentRef" class="form-control" placeholder="" >
					   </div>
					</div>
					
					
					<!-- Expiration input-->
					
					<div class="form-group">
					  <label class="col-md-4 control-label" >Expiration</label> 
						<div class="col-md-4 inputGroupContainer">
					  <input type="number" name="paymentExpire" class="form-control" placeholder="" >
					   </div>
					</div>
					
					<!-- CVV input-->
					
					<div class="form-group">
					  <label class="col-md-4 control-label" >CVV</label> 
						<div class="col-md-4 inputGroupContainer">
					  <input type="number" name="paymentCvv" class="form-control" placeholder="" >
					   </div>
					</div>
					
					
					<div class="row">
						<div class="col-md-6 mb-3 text-right">		
								<input type="submit" class="btn btn-info" name="Checkout3Submit" value="Continue">
						</div>
			</form>
						
						<div style="margin:0; padding:0;"class="col-md-6 mb-3">	
							<form action="checkout3.php" method="post">
								<input type="submit" class="btn btn-default" name="checkout2Return" value="Return">
							</form>
						</div>
					</div>
				
				</fieldset>
		</div><!--container end-->
		

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>