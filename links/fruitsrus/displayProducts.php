<?php

/*
Filename: displayProducts.php
Author: Janet Bott
Date: 27 February 2018
Description: Display Products page for Fruits 'R' Us website
*/

// set the page title
$pageTitle = "Display Products";

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
					<h1 class="text-success">Display products (Basic)</h1>
					
					<?php
					// connect to the database
					include "includes/connect.php";
					
					// write a sql statement to get data from the tbl_product table
					try {
						//create our SQL statment
						$sql = "SELECT prodId, prodName, qtyOnHand, listPrice, thumbNail FROM tbl_product;";
						
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
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Quantity On Hand</th>
							<th>List Price $</th>
							<th>thumbNail</th>
							</tr>
							<?php
							// extract data from the result set row by row
							foreach($resultSet as $row){
								// store row data in variables
								$prodId = $row['prodId'];
								$prodName = $row['prodName'];
								$qtyOnHand = $row['qtyOnHand'];
								$listPrice = $row['listPrice'];
								$thumbNail = $row['thumbNail'];
								
								//display data in next row of the table
								echo "<tr>";
								echo "<td>$prodId</td>";
								echo "<td>$prodName</td>";
								echo "<td class='text-center'>$qtyOnHand</td>";
								echo "<td class='text-right'>$listPrice</td>";
								echo "<td><img src=\"$thumbNail\"></td>";}								
								echo "<td>";
								if($qtyOnHand <= 0)
								{
								echo "<img src=\"images\outOfStock.png\"></td>";
								}
								else
								{
									echo "<img src=\"images\addToCart.png\"></td>";
								}
								
									
								
								
							 //end dof foreach
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