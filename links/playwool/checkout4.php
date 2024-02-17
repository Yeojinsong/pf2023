<?php  if (session_id() =='') session_start();

/*
Filename: checkout2.php
Author: Yeojin Song 102060145
Date: 27 February 2018
Description: checkout4 page for Play wool website
*/

// set the page title
$pageTitle = "Checkout 4";

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
					<div class="py-5 text-center">
					<img class="d-block mx-auto mb-4" src="images/RECEIPT.png" width="200" alt="checkout cart">
					<h2>Checkout4</h2>
					<p class="lead">Delivery details >> Confirmation >> Payment >> <strong>Order Recipe</strong></p>
					</div>
					<?php
					
					// test the file access correctly from checkout1.php page					
					if(isset($_POST['Checkout3Submit'])||isset($_POST['Checkout4Submit'])){
						//capture payment details and store in session variables
						$_SESSION['paymentType'] = cleanInput($_POST['paymentType']);
						$_SESSION['paymentRef'] = cleanInput($_POST['paymentRef']);
						
						//capture date and store in session variable in Australian Format
						$_SESSION['orderDate'] = date('d-m-y');
						
						//insert details of order into to the ass_order table
						insertOrderRecord();
						
						//insert details of order into to the ass_orderProduct table
						insertORderedProductRecord();
						
						//update the qty on hand in the talbe
						updateProductQtyOnHand();
					
					?>	
					 <h3>ORDER CONFIRMATION</h3>
					<!-- delivery details -->
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
					<!-- end of delivery details -->
					<br>
					
					<!-- display ordered products-->
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
							}//end of foreach loop
							
								//before closing the table the display sub total
								echo "<tr>";
								echo "<td colspan='3' class='right'>Sub Total: </td>";
								echo "<td class='right'>$ ".number_format($subTotal,2)."</td></tr>";
								
								//display the shipping value
								echo "<tr>";
								echo "<td colspan='3' class='right'>Delivery Charge: </td>";
								echo "<td class='right'>$ ".number_format($_SESSION['deliveryCharge'],2)."</td></tr>";
								$orderTotal = $subTotal + $_SESSION['deliveryCharge'];
								// calculate the order grand total
								$_SESSION['orderFinalTotal'] = $orderTotal;
								addTotalSales($_SESSION['custNbr'], $orderTotal);
								//display the shipping value
								echo "<tr>";
								echo "<td colspan='3' class='right'><strong>Grand Total: </strong></td>";
								echo "<td class='right'><strong>$ ".number_format($_SESSION['orderFinalTotal'],2)."</strong></td></tr>";
							echo "</table>";	
								
							}// end of foreach loop
						?>
						<!-- end of display ordered products-->
						<br>
						<!-- payment details -->
							<table class="table">
								<tr class="bg-primary">
									<th colspan="4">Payment Details</th>
								</tr>
								<tr>
									<th>Name on Card:</th>
									<td><?php echo $_POST['paymentName'] ;?></td>
									<th>Order Total:</th>
									<td><?php echo number_format($_SESSION['orderFinalTotal'],2);?></td>
								</tr>
							</table>
							<!-- end of payment details -->
						
					
					<h5 class="text-center">Thanks for ordering</h5>
						
					<?php
					$msg = "";
					$subTotal = 0;
					$extendedValue = 0;
					// read from the cart and display the data
					foreach($_SESSION['cart'] as $prodId=>$value){
						// store cart data in local variables 
						$prodName = $_SESSION['cart'][$prodId]['prodName'];
						$qtyOrdered = $_SESSION['cart'][$prodId]['qtyOrdered'];
						$listPrice = $_SESSION['cart'][$prodId]['listPrice'];
						$thumbNail = $_SESSION['cart'][$prodId]['thumbNail'];
						
						//calcualted extended value
						$extendedValue = $qtyOrdered * $listPrice;
						
						// add exteneded value to grand total
						
						$subTotal = $subTotal + $extendedValue;
						
						// disiplay product in table row
						$msg .=  "<tr>";
						$msg .=  "<td>".$prodName."</td>";
						$msg .=  "<td class='right'>".$qtyOrdered."</td>";
						$msg .=  "<td class='right'>$ ".number_format($listPrice,2) ."</td>";
						$msg .=  "<td class='right'>$ ".number_format($extendedValue,2) ."</td></tr>";
					}
					?>
				
					<!-- print button -->
					<p class="hidden-print">
						<input type="button" value="print" class="btn btn-warning" onclick="window.print();">
					</p>
					
					<!-- forward -->
					<p class="hidden-print">
					<form class="hidden-print" action="sendOrderEmail.php" method="post">
						<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
						<input type="hidden" name="delivertyTo" value="<?php echo $delivertyTo; ?>">
						<input type="hidden" name="deliveryAddress" value="<?php echo$_SESSION['deliveryAddress']; ?>">
						<input type="hidden" name="deliverySuburb" value="<?php echo $_SESSION['deliverySuburb']; ?>">
						<input type="hidden" name="deliveryState" value="<?php echo $_SESSION['deliveryState']; ?>">
						<input type="hidden" name="deliveryPostCode" value="<?php echo $_SESSION['deliveryPostCode']; ?>">
						<input type="hidden" name="deliveryCountry" value="<?php echo $_SESSION['deliveryCountry']; ?>">
						<input type="hidden" name="deliveryInstructions" value="<?php echo $_SESSION['deliveryInstructions']; ?>">
						<input type="hidden" name="deliveryCharge" value="<?php echo $_SESSION['deliveryCharge']; ?>">
						<input type="hidden" name="prodName" value="<?php echo $prodName; ?>">
						<input type="hidden" name="qtyOrdered" value="<?php echo $qtyOrdered; ?>">
						<input type="hidden" name="listPrice" value="<?php echo $listPrice; ?>">
						<input type="hidden" name="thumbNail" value="<?php echo $thumbNail; ?>">
						<input type="hidden" name="orderFinalTotal" value="<?php echo $_SESSION['orderFinalTotal']; ?>">
						<input type="hidden" name="orderTotal" value="<?php echo $orderTotal; ?>">
						<input type="hidden" name="subTotal" value="<?php echo $subTotal; ?>">
						<input type="hidden" name="paymentType" value="<?php echo $_SESSION['paymentType']; ?>">
						<input type="hidden" name="paymentRef" value="<?php echo $_SESSION['paymentRef']; ?>">
						<input type="hidden" name="cartString" value="<?php echo $msg; ?>">
						<input type="submit" name="Checkout4Submit" value="Email" class="btn btn-info">
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
				
				//reset all relavant session variables
				//clear cart, reset customer delivery details and delete order details session variables
				unset($_SESSION['cart']);
				
				$_SESSION['deliveryTo'] = $_SESSION['firstName'] ." ". $_SESSION['lastName'];
				$_SESSION['deliveryAddress'] = $_SESSION['address'];
				$_SESSION['deliverySuburb'] = $_SESSION['suburb'];
				$_SESSION['deliveryState'] = $_SESSION['state'];
				$_SESSION['deliveryPostCode'] = $_SESSION['postCode'];
				$_SESSION['deliveryCountry'] = $_SESSION['country'];
				$_SESSION['deliveryInstructions'] = "";
				
				
				unset($_SESSION['deliveryCharge']);
				unset($_SESSION['orderNetValue']);
				unset($_SESSION['orderDate']);
				unset($_SESSION['orderNbr']);
				unset($_SESSION['paymentType']);
				unset($_SESSION['paymentRef']);
				
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