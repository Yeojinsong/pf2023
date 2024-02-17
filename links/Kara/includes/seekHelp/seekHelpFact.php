<?php
function seekHelpFact() {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_seekHelpFact table
		$sql = "SELECT * FROM tbl_seekHelpFact WHERE active is TRUE";
		
		// execute SQL statement
		$resultSet = $pdo->query($sql);

		foreach ($resultSet as $row) {
			$id = $row['id'];
			$heading = $row['heading'];
			$img = $row['img'];
			$fact = $row['fact'];
		?>
		<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent<?php echo 2+$id;?>')">
			<div class="accordionHeading">
				<h3><?php echo $heading;?></h3>
				<img class="accordionArrow" src="images/arrow.png" alt="arrow">
			</div>
		</a>
		<div class="accordionContent accordionContent<?php echo 2+$id;?> row">
			<div class="accordionImg col-lg-5">
				<img class="img-fluid" src="<?php echo $img;?>" alt="<?php echo $heading;?>">
			</div>
			<div class="accordionDescription col-lg-7">
				<?php echo $fact;?>
			</div>
		</div>
	<?php
		}
	}// end of try block
	catch (PDOException $e) {
		// create error message
		echo "Error fetching Seek Help Fact:".$e->getMessage();
		exit();
	}// end catch block
}
?>