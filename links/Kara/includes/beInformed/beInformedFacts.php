<?php
function beInformedFacts($type) {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_slider table
		$sql = "SELECT id, heading, img, captionTitle, captionText, fact FROM tbl_beInformedFact WHERE factType LIKE $type AND active IS TRUE;";

		// prepare the statement 
		$statement = $pdo->prepare($sql);

		// execute SQL statement
		$resultSet = $pdo->query($sql);

		$rowCount = $resultSet->rowCount();

		if($rowCount > 0 && $type == 1) {
			// Make type 1 facts
			?>
			<div class="row">
				<div class="statDetails col-12">
				<?php
				$i = 1;
				foreach ($resultSet as $row) {
					$id = $row['id'];
					$heading = $row['heading'];
					$img = $row['img'];
					$captionTitle = $row['captionTitle'];
					$captionText = $row['captionText'];
					$fact = $row['fact'];
					if ($i == 1 || $i == 4 || $i == 7) {
						$colour = 'Pink';
					} else if ($i == 2 || $i == 5 || $i == 8) {
						$colour = 'Purple';
					} else {
						$colour = 'Blue';
					}
					?>
					<a href="#/" class="accordionButton" onclick="toggleAccordion('beInformedFact<?php echo $id; ?>')">
						<div class="accordionHeading">
							<h3><?php echo $heading; ?></h3>
							<img class="<?php if ($i == 1) {echo 'accordionArrowOpen';} else {echo 'accordionArrow';} ?>" src="images/arrow.png" alt="arrow">
						</div>
					</a>
					<div class="<?php if ($i == 1) {echo 'accordionContentOpen';} else {echo 'accordionContent';} ?> beInformedFact<?php echo $id; ?> row">
						<div class="accordionImg col-lg-5">
							<img class="img-fluid" src="<?php echo $img; ?>" alt="placeholder">
							<div class="white fact<?php echo $colour; ?>">
								<h1><?php echo $captionTitle; ?></h1>
								<p><?php echo $captionText; ?></p>
							</div>
						</div>
						<div class="accordionDescription col-lg-7">
							<?php echo $fact; ?>
						</div>
					</div>
					<?php
					$i++;
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
				<a href="#/" class="accordionButton" onclick="toggleAccordion('beInformedFact<?php echo $id; ?>')">
					<div class="accordionHeading">
						<h3><?php echo $heading; ?></h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent beInformedFact<?php echo $id; ?>">
					<?php echo $fact; ?>
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