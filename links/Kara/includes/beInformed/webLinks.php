<?php
include "includes/connect.php";
try {
	// write statement to get data from tbl_webLinks table
	$sql = "SELECT id, url, description FROM tbl_webLink WHERE active IS TRUE;";

	// prepare the statement 
	$statement = $pdo->prepare($sql);

	// execute SQL statement
	$resultSet = $pdo->query($sql);

	$rowCount = $resultSet->rowCount();

	if($rowCount > 0) {
		?>
		<div class="row">
			<div class="webLinks sectionAccordion col-12 row">
				<a href="#" id="usefulResourcesAnchor"></a>
			<?php
			foreach ($resultSet as $row) {
				$url = $row['url'];
				$description = $row['description'];
				?>
				<div class="col-12 col-md-6">
					<h4 class="blue"><a href="https://<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a></h4>
					<pre><?php echo $description; ?></pre>
				</div>
				<?php
			}
			?>
			</div>
		</div>
		<div class="row toggleLine webLinksToggles">
			<div class="col-12">
				<hr class="toggleHr">
				<div class="hrHidden"></div>
				<div class="moreToggle">
					<a href="#/" onclick="toggleSectionAccordion('webLinks')">More <img class="moreAccordionArrow" src="images/arrow.png" alt="arrow"></a>
				</div>
				<div class="lessToggle">
					<a href="#/" onclick="toggleSectionAccordion('webLinks')">Less <img class="lessAccordionArrow" src="images/arrow.png" alt="arrow"></a>
				</div>
			</div>
		</div>
		<?php
	}
} // end of try block
catch (PDOException $e) {
	// create error message
	echo "Error fetching Web Links: " .$e->getMessage();
	exit();
} // end catch block
?>
