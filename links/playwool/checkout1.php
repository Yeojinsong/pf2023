<?php  if (session_id() =='') session_start();

/*
Filename: Checkout 1.php
Author: Yeojin Song 102060145
Date: 27 February 2018
Description: Checkout 1 page for Play Wool website
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
		
		
		
		<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/checkout.png" width="200" alt="checkout cart">
        <h2>Checkout</h2>
        <p class="lead"><strong>Delivery details >></strong> Confirmation >> Payment >> Order Recipe</p>
      </div>
		<?php
		// test the file access correctly
		if(isset($_POST['submitShowCart']) || isset($_POST['loginSubmit']) || isset($_POST['checkout2Return'])){
			//test that user is logged in
			if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
				// display delivery details form
		?>
        <div class="row">
		  <!--onsubmit for check valid customer -->
          <form class="needs-validation" action="checkout2.php" method="post" onsubmit="return checkDeliveryDetails(this);">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" name="deliveryTo" placeholder="" value="<?php echo $_SESSION['deliveryTo'];?>">                
              </div>         
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="deliveryAddress" value="<?php echo $_SESSION['deliveryAddress'];?>">             
            </div>

			<div class="row">
				<div class="col-md-5 mb-3">
				  <label for="Suburb">Suburb</label>
				  <input type="text" class="form-control" name="deliverySuburb" value="<?php echo $_SESSION['deliverySuburb'];?>">
				</div>
				<div class="col-md-4 mb-3">
					<label for="state">State</label>
					<input type="text" class="form-control" name="deliveryState" value="<?php echo $_SESSION['deliveryState'];?>">               
				</div>
				<div class="col-md-3 mb-3">
                <label for="postCode">Post Code</label>
                <input type="number" class="form-control" name="deliveryPostCode" value="<?php echo $_SESSION['deliveryPostCode'];?>">
              </div>
			</div>
			
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="deliveryCountry" value="<?php echo $_SESSION['deliveryCountry'];?>">                
              </div>

			  <div class="col-md-3 mb-3">
				<label for="country">Delivery Charge</label>
				<select name="deliveryCountryCharge" class="custom-select d-block w-100">
					<option value="1" selected>Domestic - Standard Mai $5</option>
					<option value="2">Domestic - Express Mail 10</option>
					<option value="3">International - Standard Mail $15</option>
					<option value="4">International - Express Mail $20</option>
					<option value="5">International - FedEx $40</option>
				</select>
				</div>
			
            </div>
			
			<div class="mb-3">
                <label for="Instructions">Dalivery Instructions</label>
                <textarea class="form-control" name="deliveryInstructions" cols="60" rows="4"><?php echo $_SESSION['deliveryInstructions'];?></textarea>
              </div>
			  
			<hr class="mb-4">
			 
			<div class="text-center">
				<input type="reset" class="btn btn-default" name="Reset Form">
				<input type="submit" class="btn btn-info" name="checkou1Submit" value="Continue">
			</div>
			
			
            </div> <!--col-md-8 order-md-1 end-->
			
			 
          </form>
        </div><!--container end-->
  
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
	


		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>