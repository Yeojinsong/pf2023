<?php
function clientStories($page) {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_slider table
		$sql = "SELECT id, name, story, img  FROM tbl_clientStory WHERE $page IS TRUE;";

		// prepare the statement 
		$statement = $pdo->prepare($sql);

		// execute SQL statement
		$resultSet = $pdo->query($sql);

		$rowCount = $resultSet->rowCount();

		if($rowCount > 0) {
		// Make the client stories section
		$cols = 12 / $rowCount;
		?>
			<div class="row section">
				<div class="col-12">
					<h1>Client stories</h1>
					<p><i>Names and details have been changed to protect client privacy.</i></p>
				</div>
			</div>
			<div class="row clientAccordionWrapper">
				<div class="clientStories clientAccordion col-12 row">
					<?php
					foreach ($resultSet as $row) {
						// store row data in variables
						$id = $row['id'];
						$name = $row['name'];
						$story = $row['story'];
						$img = $row['img'];
						?>
						<div class="clientStory col-lg-<?php echo $cols; ?>">
						<img class="img-fluid" src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
						<div class="clientStoryWrapper">
							<h4><?php echo $name; ?></h4>
							<div class="clientNameUnderline"></div>
							<?php echo $story; ?>
						</div>
					</div>
						<?php
					}
					?>
				</div>
				<div class="clientAccordionFade"></div>
			</div>
			<div class="row toggleLine clientToggles">
				<div class="col-12">
					<hr class="toggleHr">
					<div class="hrHidden"></div>
					<div class="moreToggle">
						<a href="#/" onclick="toggleClientAccordion('clientStories')">More <img class="moreAccordionArrow" src="images/arrow.png" alt="arrow"></a>
					</div>
					<div class="lessToggle">
						<a href="#/" onclick="toggleClientAccordion('clientStories')">Less <img class="lessAccordionArrow" src="images/arrow.png" alt="arrow"></a>
					</div>
				</div>
			</div>
		<?php
		}
	} // end of try block
	catch (PDOException $e) {

		// create error message
		echo "Error fetching Client Story data: " .$e->getMessage();
		exit();

	} // end catch block

}
?>