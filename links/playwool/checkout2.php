<?php  if (session_id() =='') session_start();

/*
Filename: Checkout 2 .php
Author: Yeojin Song 102060145
Date: 27 May 2018
Description: Checkout 2 page for Play Wool website
*/

// set the page title
$pageTitle = "Confirmation";

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
		<div class="container">

			<!-- checkout2 row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="py-5 text-center">
						<img class="d-block mx-auto mb-4" src="images/confirmationTop.png" width="200" alt="checkout cart">
						<h2>Confirmation</h2>
						<p class="lead">Delivery details >><strong> Confirmation >></strong> Payment >> Order Recipe</p>
					 </div>
					<?php
					// test the file access correctly from checkout1.php page
					if(isset($_POST['checkou1Submit']) || isset($_POST['checkout2Return'])){
						//we don't need it because if user not logged in there is no way to get it no this page.
						//if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
						//test access from checkout 1 specificall
						if (isset($_POST['checkou1Submit'])) {
							// capture the informaiton from the form
							$_SESSION['deliveryTo'] = cleanInput($_POST['deliveryTo']);
							$_SESSION['deliveryAddress'] = cleanInput($_POST['deliveryAddress']);
							$_SESSION['deliverySuburb'] = cleanInput($_POST['deliverySuburb']);
							$_SESSION['deliveryState'] = cleanInput($_POST['deliveryState']);
							$_SESSION['deliveryPostCode'] = cleanInput($_POST['deliveryPostCode']);
							$_SESSION['deliveryCountry'] = cleanInput($_POST['deliveryCountry']);
							$_SESSION['deliveryCountryCharge'] = cleanInput($_POST['deliveryCountryCharge']);
							$_SESSION['deliveryInstructions'] = cleanInput($_POST['deliveryInstructions']);
							
							// get the coast deliveryAddress
							$_SESSION['deliveryCharge'] = deliveryCharge($_SESSION['deliveryCountryCharge']);
						
						}
					//display details of the order
					?>	
					<table class="table">
						
						<tr class="bg-primary">
							<th colspan="4">Delivery Details</th>
						</tr>
						<tr>
						
							<th>Charge To:</th>
							<td><?php echo $_SESSION['firstName'] ." " .$_SESSION['lastName'];?></td>
							<th>Delivery To:</th>
							<td><?php echo $_SESSION['deliveryTo'];?></td>
						</tr>
						<tr>
							<th>Delivery Address:</th>
							<td colspan="3"><?php echo $_SESSION['deliveryAddress']." " .$_SESSION['deliverySuburb']. " " .$_SESSION['deliveryState']." ".$_SESSION['deliveryPostCode']." ".$_SESSION['deliveryCountry'];?></td>
						</tr>
						<tr>
							<th>Delivery Instructions:</th>
							<td colspan="3"><?php echo $_SESSION['deliveryInstructions'];?></td>
						</tr>
					</table>
					<br>
				
						
						
						<!-- display products-->
						
						<?php
						if(empty($_SESSION['cart'])){
							echo"<p>Your Cart is empty</p>";
							
						}
						else{
							
						
						?>
						<table class="table">
							
							<tr class="bg-primary">
								<th colspan="4">Products</th>
							</tr>
							<tr>
								<th>Product Name</th>
								<th>Quantity Ordered</th>
								<th>List Price $</th>
								<th>Extended Value $</th>
							</tr>
							
							<?php
							//set up local variables
							$subTotal = 0;
							
							// read from the cart and display the data
							foreach($_SESSION['cart'] as $prodId=>$value){
								// store cart data in local variables 
								$prodName = $_SESSION['cart'][$prodId]['prodName'];
								$qtyOnHand = $_SESSION['cart'][$prodId]['qtyOnHand'];
								$qtyOrdered = $_SESSION['cart'][$prodId]['qtyOrdered'];
								$listPrice = $_SESSION['cart'][$prodId]['listPrice'];
								$thumbNail = $_SESSION['cart'][$prodId]['thumbNail'];
								
								//calcualted extended value
								$extendedValue = $qtyOrdered * $listPrice;
								
								// add exteneded value to grand total
								
								$subTotal = $subTotal + $extendedValue;
								
								// disiplay product in table row
								echo "<tr>";
								echo "<td><img src='$thumbNail' alt='$prodName' width='50'> $prodName</td>";
								echo "<td class='right'>$qtyOrdered</td>";
								echo "<td class='right'>$ ".number_format($listPrice,2) ."</td>";
								echo "<td class='right'>$ ".number_format($extendedValue,2) ."</td></tr>";
							}//// FOREACH loop end
							
								//before closing the table the display sub total
								echo "<tr>";
								echo "<td colspan='3' class='right'>Sub Total: </td>";
								echo "<td class='right'>$ ".number_format($subTotal,2)."</td></tr>";
								
								//display the shipping value
								echo "<tr>";
								echo "<td colspan='3' class='right'>Delivery Charge: </td>";
								echo "<td class='right'>$ ".number_format($_SESSION['deliveryCharge'],2)."</td></tr>";
								
								// calculate the order grand total
								$_SESSION['orderFinalTotal'] = $subTotal + $_SESSION['deliveryCharge'];
								
								//display the shipping value
								echo "<tr>";
								echo "<td colspan='3' class='right'><strong>Grand Total: </strong></td>";
								echo "<td class='right'><strong>$ ".number_format($_SESSION['orderFinalTotal'],2)."</strong></td></tr>";
							echo "</table>";	
								
							}// else end
								
						
						?>
					
					<div class="row">
						<div class="col-md-6 mb-3 text-right">						
							<form action="checkout1.php" method="post">
								<input type="submit" class="btn btn-default" name="checkout2Return" value="Return">
							</form>
						</div>
						<div style="margin:0; padding:0;"class="col-md-6 mb-3">	
							<form action="checkout3.php" method="post">
								<input type="submit" class="btn btn-info" name="Checkout2Submit" value="Continue">
							</form>
						</div>
					</div>
					
					<?php
				}
				else{
					//display no access message
					echo "Unauthorised access -cannot access this file directly.";
				}// end of file access test
				?>
					

				</div>
			</div> <!-- checkout 2 row end-->
		</div> <!-- main content end-->

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>