<?php
function getInvolvedFact($type) {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_slider table
		$sql = "SELECT id, heading, fact FROM tbl_getInvolvedFact WHERE factType LIKE $type AND active IS TRUE;";

		// prepare the statement 
		$statement = $pdo->prepare($sql);

		// execute SQL statement
		$resultSet = $pdo->query($sql);

		$rowCount = $resultSet->rowCount();

		if($rowCount > 0 && $type == 1) {
			// Make type 1 facts
			?>
			<div class="row">
				<div class="col-12">
				<?php
				foreach ($resultSet as $row) {
					$id = $row['id'];
					$heading = $row['heading'];
					$fact = $row['fact'];
					?>
					<a href="#/" class="accordionButton" onclick="toggleAccordion('getInvolvedFact<?php echo $id; ?>')">
						<div class="accordionHeading">
							<h3><?php echo $heading; ?></h3>
							<img class="accordionArrow" src="images/arrow.png" alt="arrow">
						</div>
					</a>
					<div class="accordionContent getInvolvedFact<?php echo $id; ?> row">
						<div class="accordionDescription col-lg-12">
							<?php echo $fact; ?>
						</div>
					</div>
					<?php
				}
				?>
				</div>
			</div>
			<?php
		} else if ($rowCount > 0 && $type == '2') {
			// Make type 2 facts
			foreach ($resultSet as $row) {
				$id = $row['id'];
				$heading = $row['heading'];
				$fact = $row['fact'];
				?>
				<a href="#/" class="accordionButton" onclick="toggleAccordion('getInvolvedFact<?php echo $id; ?>')">
					<div class="accordionHeading">
						<h3><?php echo $heading; ?></h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent getInvolvedFact<?php echo $id; ?>">
					<div class="accordionDescription col-lg-12">
						<?php echo $fact; ?>
					</div>
				</div>
				<?php
			}
		}
	} // end of try block
	catch (PDOException $e) {
		// create error message
		echo "Error fetching Fact data: " .$e->getMessage();
		exit();

	} // end catch block
}
?>