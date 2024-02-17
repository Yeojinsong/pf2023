<?php if (session_id() =='') session_start();

/*
Filename: catalogue.php
Author: Yeojin Song
Date: 21 March 2018
Description: catalogue for Play Wool website
*/

// set the page title
$pageTitle = "Catalogue";

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
		
		// connect to the database
		include "includes/connect.php";
		
		
		$catID = 0;
		if(isset($_POST['categoryName'])){
			$categoryName = cleanInput($_POST['categoryName']);
			if ($categoryName != "All") {
				$sql = "SELECT catNbr FROM ass_category WHERE catName = :catName";
				$statement = $pdo->prepare($sql);
				$statement->bindValue(':catName', $categoryName);
				$statement->execute();
				$res = $statement->fetchAll();
				foreach($res as $row)
				{
					$catID = $row[0];
				}		
			}
		}		
		?>
		
		
		<!-- main content -->
		<div class="container">
		
			<div class="row">
				<div class="col">
					<div class="list-group">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method='POST'><!--catalogue menu start-->
							<select name="categoryName">
								<option value="All">All</option>
								<option value="Acrylic">Acrylic</option>
								<option value="Cotton">Cotton</option>
								<option value="Nylon">Nylon</option>
								<option value="Organic">Organic</option>
								<option value="Polyester">Polyester</option>
								<option value="Wool">Wool</option>
							</select>
							<input type="submit" class="btn btn-info" name="categorySubmit" value="Go">
						</form><!--catalogue menu end-->
					<div>
				</div> <!--end of col-->
			
			</div><!--end of row-->
			
		

			<!-- display products row -->
			<div class="row">
				<div class="col">
					<h1 class="text-success">Catalogue</h1>
					
				
					<?php
					
						// write a sql statement to get data from the tbl_product table
						try {
							if ($catID == 0) {
								$sql = "SELECT prodId, prodName, description, qtyOnHand, listPrice, thumbNail, image FROM ass_product";
								$statement = $pdo->prepare($sql);
							}
							else {
								//create our SQL statment
								$sql = "SELECT prodId, prodName, description, qtyOnHand, listPrice, thumbNail, image FROM ass_product WHERE catNbr = :catId;";
								$statement = $pdo->prepare($sql);
								$statement->bindValue(':catId', $catID);
							}
							$statement->execute();
							//excute the SQL statment and store the output
							$resultSet = $statement->fetchAll();						
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
							<th class="hidden">Product Name</th>
							<th class="hidden">Product Description</th>
							<th class="hidden">List Price $</th>
							<th class="hidden">thumbNail</th>
							</tr>
							<?php
							$count=0;
							
							echo "<tr>";
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
								
								echo "<td><img src='$thumbNail' alt='$prodName' width='250' onclick='displayImage(\"$image\", \"$prodName\", \"$description\")'>";								
								echo "<p><strong>$prodName</strong></p>";
								echo "<p>$description</p>";
								echo "<p>\$$listPrice</p>";
								
								if($qtyOnHand <= 0){
									echo "<img src=\"images/outOfStock.png\">";}
								else if(isset($_SESSION['cart'][$prodId])&& $qtyOnHand <= $_SESSION['cart'][$prodId]['qtyOrdered']){
									echo "<img src='images/noMoreStock.png' alt='no More Stoctk'>";
									
								}
								else {
									?>
									
									<form action="addToCart.php" method="post">
										<input type="hidden" name="prodId" value="<?php echo $prodId; ?>">
										<input type="hidden" name="prodName" value="<?php echo $prodName ; ?>">
										<input type="hidden" name="qtyOnHand" value="<?php echo $qtyOnHand; ?>">
										<input type="hidden" name="listPrice" value="<?php echo $listPrice; ?>">
										<input type="hidden" name="thumbNail" value="<?php echo $thumbNail; ?>">
										<input type="image" src='images\addToCart.png' name="addToCartSubmit">
									</form>
									<?php
								}
								echo "</td>";
								
								
								
								$count++;
								
								if ($count == 4) {
								echo "</tr>";
								echo "<tr>";
								$count = 0;
								
								}
							
							} //end dof foreach
							
							if ($count == 4) {
								echo "</tr>";
								
							}
							
							//close table
							echo"</table>";
							
							
							?>
							
						</section>
					</div><!-- end of display products row-->

				</div>
			</div> <!-- end of displayProduct row -->


		</div> <!-- end of main content -->

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>