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
					<h1 class="text-success">checkout 4</h1>
					
					<br>
					
					<h5>1. Get delivery details --> 2. Confirm order--> 3. Make payment --> <span class="highlight">4. Order recipe</span></h5>
					
					<?php
					// test the file access correctly from checkout1.php page
					if(isset($_POST['Checkout3Submit'])){
						//capture payment details and store in session variables
						$_SESSION['paymentType'] = cleanInput($_POST['paymentType']);
						$_SESSION['paymentRef'] = cleanInput($_POST['paymentRef']);
						
						//capture date and store in session variable in Australian Format
						$_SESSION['orderDate'] = date('d-m-y');
						
						//insert details of order into to the tbl_order table
						insertOrderRecord();
						
						//insert details of order into to the tbl_orderProduct table
						insertORderedProductRecord();
						
						//update the qty on hand in the talbe
						updateProductQtyOnHand();
					
					?>	
					<!--display order details-->
					<h3>ORDER CONFIRMATION</h3>
					
					<h5>Thanks for order</h5>
						
					
					<!-- previous -->
					<p class="hidden-print">
						<input type="button" value="print" onclick="window.print();">
					</p>
					
					<!-- forward -->
					<p class="hidden-print">
					<form class="hidden-print" action="sendOrderEmail.php" method="post">
						<input type="submit" name="Checkout4Submit" value="Email">
					</form>
					</p>
					
					
					
					<?php
				}
				else{
					//display no access message
					echo "Unauthorised access -cannot access this file directly.";
				}// end of file access test
				?>
				
				
				
				<?php
				/*
				//reset all relavant session variables
				//clear cart, reset customer delivery details and delete order details session variables
				unset($_SESSION['cart']);
				
				$_SESSION['deliveryTo'] = $_SESSION['firstName'] ." ". $_SESSION['lastName'];
				$_SESSION['deliveryAddress'] = $_SESSION['address'];
				$_SESSION['deliverySuburb'] = $_SESSION['suburb'];
				$_SESSION['deliveryStateId'] = $_SESSION['stateId'];
				$_SESSION['deliveryPostCode'] = $_SESSION['postCode'];
				$_SESSION['deliveryInstructions'] = "";
				
				
				unset($_SESSION['deliveryCharge']);
				unset($_SESSION['orderNetValue']);
				unset($_SESSION['orderDate']);
				unset($_SESSION['orderNbr']);
				unset($_SESSION['paymentType']);
				unset($_SESSION['paymentRef']);
				*/
				?>
					





				</section>
			</div> <!-- end of checkout4 row -->


		</section> <!-- end of main content -->

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>