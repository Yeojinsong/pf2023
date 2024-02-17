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
					
					<h5>1. Get delivery details --><span class="highlight"> 2. Confirm order</span> --> 3. Make payment --> 4. Order recipe</h5>
					
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
							$_SESSION['deliveryStateId'] = cleanInput($_POST['deliveryStateId']);
							$_SESSION['deliveryPostCode'] = cleanInput($_POST['deliveryPostCode']);
							$_SESSION['deliveryInstructions'] = cleanInput($_POST['deliveryInstructions']);
							
							// get the coast deliveryAddress
							$_SESSION['deliveryCharge'] = getDeliveryCharge($_SESSION['deliveryStateId']);
						
						}
					//display details of the order
					?>	
					<table class="table1">
						<tr>
							<th colspan="4">Your Order</th>
						</tr>
						<tr>
							<th>Charge To:</th>
							<td><?php echo $_SESSION['firstName'] ." " .$_SESSION['lastName'];?></td>
							<th>Delivery To:</th>
							<td><?php echo $_SESSION['deliveryTo'];?></td>
						</tr>
						<tr>
							<th>Delivery Address:</th>
							<td colspan="3"><?php echo $_SESSION['deliveryAddress']." " .$_SESSION['deliverySuburb']. " " .$_SESSION['deliveryStateId']." ".$_SESSION['deliveryPostCode'];?></td>
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
						<table class="table1">
							<tr>
								<th colspan="4">Selected Items</th>
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
								
								//calcualted extended value
								$extendedValue = $qtyOrdered * $listPrice;
								
								// add exteneded value to grand total
								
								$subTotal = $subTotal + $extendedValue;
								
								// disiplay product in table row
								echo "<tr>";
								echo "<td>$prodName</td>";
								echo "<td class='right'>$qtyOrdered</td>";
								echo "<td class='right'>$".number_format($listPrice,2) ."</td>";
								echo "<td class='right'>$".number_format($extendedValue,2) ."</td></tr>";
							}//end of foreach loop
							
								//before closing the table the display sub total
								echo "<tr>";
								echo "<td colspan='3' class='right'>Sub Total: </td>";
								echo "<td class='right'>".number_format($subTotal,2)."</td></tr>";
								
								//display the shipping value
								echo "<tr>";
								echo "<td colspan='3' class='right'>Delivery Charge: </td>";
								echo "<td class='right'>".number_format($_SESSION['deliveryCharge'],2)."</td></tr>";
								
								// calculate the order grand total
								$_SESSION['orderNetValue'] = $subTotal + $_SESSION['deliveryCharge'];
								
								//display the shipping value
								echo "<tr>";
								echo "<td colspan='3' class='right'><strong>Grand Total: </strong></td>";
								echo "<td class='right'><strong>".number_format($_SESSION['orderNetValue'],2)."</strong></td></tr>";
							echo "</table>";	
								
							}// ebd of foreach loop
								
						
						?>
					
					
					
					<!-- previous -->
					<form action="checkout1.php" method="post">
						<input type="submit" name="checkout2Return" value="Return To delivery Details">
					</form>
					<br>
					<!-- forward -->
					<form action="checkout3.php" method="post">
						<input type="submit" name="Checkout2Submit" value="Continue Check Out">
					</form>
					<?php
				}
				else{
					//display no access message
					echo "Unauthorised access -cannot access this file directly.";
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