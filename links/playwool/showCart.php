<?php if (session_id() =='') session_start();

/*
Filename: Shopping Cart.php
Author: Yeojin Song 102060145
Date: 21 March 2018
Description: Shopping Cart page for Play Wool website
*/

// set the page title
$pageTitle = "Shopping Cart";

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

			<!-- Shopping Cart row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">Shopping Cart</h1>
					<?php
					if(empty($_SESSION['cart'])){
						echo"<p>Your Cart is empty</p>";
						
					}
					else{
						
					
					?>
					<table class="table">
						<tr class="active">
							<th>Product</th>
							<!-- <th>Quantity On Hand</th> -->
							<th>Quantity Ordered</th>
							<th>Price $</th>
							<th>Sub Total $</th>
						</tr>
						
						<?php
						//set up local variables
						$grandTotal = 0;
						
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
							
							$grandTotal = $grandTotal + $extendedValue;
							
							// disiplay product in table row
							echo "<tr>";
							echo "<td><img src='$thumbNail' alt='$prodName' width='50'> &nbsp;&nbsp;&nbsp;$prodName</td>";
							// echo "<td>$qtyOnHand</td>";
							// echo "<td>$qtyOrdered</td>";
							?>
							<td>
							<form action="updateCart.php" method="POST">
								<input type="hidden" name="prodId" value="<?php echo $prodId;?>">
								<input type="hidden" name="qtyOnHand" value="<?php echo $qtyOnHand;?>">
								<input type="number" name="qtyOrdered" value="<?php echo $qtyOrdered;?>" size="2">
								<input type="submit" value="Update">						 	
							</form>
							<?php
							//test for no more stock
							if($qtyOrdered == $qtyOnHand){
								
								echo "<strong>No further stock available!</strong>";
							}
							?>
							</td>
							<?php
							echo "<td>$listPrice</td>";
							echo "<td>".number_format($extendedValue,2) ."</td>";
							
						
							
							
							
							echo "</tr>";
						}// ebd of foreach loop
							
						//disiplay the grandTotal
						echo "<tr class='active'><td colspan='3'><strong>Grand Total:</strong> </td><td>" .number_format($grandTotal, 2) ."</td></tr>";
						?>
					</table>
					
					<br>
					
					<p> * Enter a new quantity ordered and click update to change.</p>
					<p> * Enter 0 and click update to remove a product from the shopping cart.</p>
						
					<!-- add checkout option -->
					<form action="checkout1.php" method="post">
						<input type="submit" name="submitShowCart" class="btn btn-info" value="Checkout">
					</form>
					
					<?php
					}
					?>
				</section>
			</div> <!-- end of Shopping Cart row -->
		</section> <!-- end of main content -->


		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>