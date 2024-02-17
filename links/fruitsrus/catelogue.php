<?php if (session_id() =='') session_start();

/*
Filename: catelogue.php
Author: Yeojin Song
Date: 21 March 2018
Description: catelogue for Fruits 'R' Us website
*/

// set the page title
$pageTitle = "catelogue";

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

			<!-- display products row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">Catelogue</h1>
					
					<?php
					// connect to the database
					include "includes/connect.php";
					
					// write a sql statement to get data from the tbl_product table
					try {
						//create our SQL statment
						$sql = "SELECT prodId, prodName, description, qtyOnHand, listPrice, thumbNail, image FROM tbl_product;";
						
						//excute the SQL statment and store the output
						$resultSet = $pdo->query($sql);						
					}//end of try block
					
					// what to do if sql statement fails
					catch(PDOException $e){
						// create an error message with excepiton details
						echo "Error fetching products:".$e->getMessage();
						
						// stop script from contiuning
						exit();						
					}//end of catch block						
					?>
					
					<!-- drop into HTMl to set up heading of the table that the products will be displayed in -->
					<table class="table1">
						<tr>
							<th>Product Name</th>
							<th>Product Description</th>
							<th>List Price $</th>
							<th>thumbNail</th>
							</tr>
							<?php
							// extract data from the result set row by row
							foreach($resultSet as $row){
								// store row data in variables
								$prodId = $row['prodId'];
								$prodName = $row['prodName'];
								$description = $row['description'];
								$qtyOnHand = $row['qtyOnHand'];
								$listPrice = $row['listPrice'];
								$thumbNail = $row['thumbNail'];
								$image = $row['image'];
								
								//display data in next row of the table
								echo "<tr>";
								echo "<td>$prodName</td>";
								echo "<td>$description</td>";
								echo "<td class='text-right'>$listPrice</td>";
								echo "<td><img src='$thumbNail' alt='$prodName' onclick='displayImage(\"$image\", \"$prodName\", \"$description\")'></td>";								
								echo "<td>";
								if($qtyOnHand <= 0){
									echo "<img src=\"images/outOfStock.png\">";}
								else if(isset($_SESSION['cart'][$prodId])&& $qtyOnHand <= $_SESSION['cart'][$prodId]['qtyOrdered']){
									echo "<img src='images/noMoreStock.png' alt='no More Stoctk'>";
									
								}
								else {
									?>
									
									<form action="addToCart.php" method="post">
										<input type="hidden" name="prodId" value="<?php echo $prodId; ?>">
										<input type="hidden" name="prodName" value="<?php echo $prodName; ?>">
										<input type="hidden" name="qtyOnHand" value="<?php echo $qtyOnHand; ?>">
										<input type="hidden" name="listPrice" value="<?php echo $listPrice; ?>">
										<input type="image" src='images\addToCart.png' name="addToCartSubmit">
									</form>
									<?php
								}
								echo "</td>";
								echo "</tr>";
									
						
								
							} //end dof foreach
							//close table
							echo"</table>";
							
							
							?>
							
						</section>
					</div><!-- end of display products row-->

				</section>
			</div> <!-- end of displayProduct row -->


		</section> <!-- end of main content -->

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>