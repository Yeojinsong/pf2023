<?php if (session_id() =='') session_start();

/*
Filename: Shopping Cart.php
Author: Yeojin Song
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
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<div class="container">
		<h1 class="text-success">Shopping Cart</h1>
						<?php
						if(empty($_SESSION['cart'])){
							echo"<p>Your Cart is empty</p>";
							
						}
						else{
							
						
						?>
			<table id="cart" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:50%">Product</th>
						<th style="width:10%">Price</th>
						<th style="width:8%">Quantity</th>
						<th style="width:22%" class="text-center">Subtotal</th>
						<th style="width:10%"></th>
						
					</tr>
				</thead>
				<tbody>
					<tr>
					
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
							$description = $_SESSION['cart'][$prodId]['description'];
							$thumbNail = $_SESSION['cart'][$prodId]['thumbNail'];
							
							//calcualted extended value
							$extendedValue = $qtyOrdered * $listPrice;
							
							// add exteneded value to grand total
							
							$grandTotal = $grandTotal + $extendedValue;
							
							// disiplay product in table row
							echo "<tr>";
							echo "<td>$prodName</td>";
							// echo "<td>$qtyOnHand</td>";
							// echo "<td>$qtyOrdered</td>";
							?>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-2 hidden-xs"><img src=<?php echo $thumbNail; ?> alt="..." class="img-responsive"/></div>
								<div class="col-sm-10">
									<h4 class="nomargin"><?php echo $prodName; ?></h4>
									<p><?phpecho $description;?></p>
								</div>
							</div>
						</td>
						<td data-th="Price"><?php echo $listPrice; ?></td>
						<td data-th="Quantity">
							<input type="hidden" name="qtyOnHand" value="<?php echo $qtyOnHand;?>">
							<input type="number" class="form-control text-center" value="<?php echo $qtyOrdered;?>">
						</td>
						<td data-th="Subtotal" class="text-center"><?php echo number_format($extendedValue,2);?></td>
						<td class="actions" data-th="">
							<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
							<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr class="visible-xs">
						<td class="text-center"><strong>Total 1.99</strong></td>
					</tr>
					<tr>
						<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
						<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
					</tr>
				</tfoot>
			</table>
	</div>


							<td>
							<form action="updateCart.php" method="POST">
								<input type="hidden" name="prodId" value="<?php echo $prodId;?>">
								<input type="hidden" name="qtyOnHand" value="<?php echo $qtyOnHand;?>">
								<input type="number" name="qtyOrdered" value="<?php echo $qtyOrdered;?>" size="2">
								<input type="submit" value="Update">						 	
							</form>
							</td>
							<?php
							echo "<td>$listPrice</td>";
							echo "<td>".number_format($extendedValue,2) ."</td>";
							
							//test for no more stock
							if($qtyOrdered == $qtyOnHand){
								
								echo "<td><strong>No further stock available</strong></td>";
							}
							
							
							
							echo "</tr>";
						}// ebd of foreach loop
							
						//disiplay the grandTotal
						echo "<tr><td colspan='3'>Grand Total: </td><td>" .number_format($grandTotal, 2) ."</td></tr>";
						?>
					</table>
					
					<br>
					
					<p> Enter a new quantity ordered and click update to change.</p>
					<p> Enter 0 and click update to remove a product from the shopping cart.</p>
						
					<!-- add checkout option -->
					<form action="checkout1.php" method="post">
						<input type="submit" name="submitShowCart" value="Check out">
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