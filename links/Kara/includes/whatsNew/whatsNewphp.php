<?php
// connect to database
include "includes/connect.php";

// get each media type and then get corressponding media
try{
	//sql statement
	$sql = "SELECT printOrder, mediaType, displayType FROM tbl_mediaType WHERE active IS TRUE ORDER BY printOrder;";
	//execute statement and store output
	$resultSet = $pdo->query($sql);
} // end of try code

catch(PDOException $e) {
	//error message
	echo "Error fetching mediaType from database: " .$e->getMessage();
	exit();
}

foreach ($resultSet as $row) {
	$mediaType = $row['mediaType'];
	$displayType = $row['displayType'];
	$mediaTypeNoSpace = str_replace(' ', '', $mediaType);

	try{
		//sql statement
		$sql2 = "SELECT * FROM tbl_media WHERE mediaType = '$mediaType' AND active IS TRUE ORDER BY id DESC;";
		//execute statement and store output
		$resultSet2 = $pdo->query($sql2);
	} // end of try code

	catch(PDOException $e) {
		//error message
		echo "Error fetching media from database: " .$e->getMessage();
		exit();
	}

	$rowCount = $resultSet2->rowCount();

	if ($rowCount > 0) {
		?>
		<a href="#/" class="accordionButton" onclick="toggleAccordion('<?php echo $mediaTypeNoSpace; ?>')">
			<div class="accordionHeading">
				<h3><?php echo $mediaType; ?></h3>
				<img class="accordionArrowOpen" src="images/arrow.png" alt="arrow">
			</div>
		</a>

		<div class="accordionContentOpen <?php echo $mediaTypeNoSpace; ?>">
			<?php

			if ($displayType == 'fileName') {
				$count = 0;
				?>

				<div class="row">
					<?php
					foreach ($resultSet2 as $row2) {
						if ($count < 2) {
							$id = $row2['id'];
							$heading = $row2['heading'];
							$fileName = $row2['fileName'];
							?>

							<div class="col-sm-6 downloadCardMarg downloadCardRow flex">
								<div class="row downloadCard">
									<div class="col-md-12 col-lg-6 downloadCardText">
										<?php echo $heading; ?>
									</div>
									<div class="col-md-12 col-lg-6">
										<a class="btn btn-primary downloadBtn btnColor" href="<?php echo $fileName; ?>" download>
											Download
										</a>
									</div>
								</div>
							</div>

							<?php
						} // end of if test for $count

						$count++;
					} // end of foreach $resultSet2
					?>
				</div> <!-- end of row -->

				<br>
				<?php
			} else if ($displayType == 'url') {
				$count = 0;
				?>

				<div class="row">
					<?php
					foreach ($resultSet2 as $row2) {
						if ($count < 2) {
							$id = $row2['id'];
							$heading = $row2['heading'];
							$url = $row2['url'];
							?>

							<div class="col-sm-6 downloadCardMarg downloadCardRow flex">
								<div class="row downloadCard">
									<div class="col-md-12 col-lg-6 downloadCardText">
										<?php echo $heading; ?>
									</div>
									<div class="col-md-12 col-lg-6">
										<a class="btn btn-primary downloadBtn btnColor" href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer">
											View
										</a>
									</div>
								</div>
							</div>

							<?php
						} // end of if test for $count
						$count++;
					} // end of foreach $resultSet2
					?>
				</div> <!-- end of row -->

				<br>
				<?php
			} else if ($displayType == 'article') {
				$count = 0;

				foreach ($resultSet2 as $row2) {
					if ($count < 2) {
						$id = $row2['id'];
						$heading = $row2['heading'];
						$summary = $row2['summary'];
						$article = $row2['article'];

						try{
							//sql statement
							$sql4 = "SELECT img, name FROM tbl_mediaImage WHERE mediaId = '$id' ORDER BY id ASC LIMIT 1;";
							//execute statement and store output
							$resultSet4 = $pdo->query($sql4);
						} // end of try code

						catch(PDOException $e) {
							//error message
							echo "Error fetching media images from database: " .$e->getMessage();
							exit();
						}

						$row = $resultSet4->fetch(PDO::FETCH_ASSOC);
						$image = $row['img'];
						$name = $row['name'];

						?>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 newsCardImg">
								<img class="newsImage" src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
							</div>

							<div class="col-sm-12 col-md-12 col-lg-6 featureCard flex">
								<div class="newsCard">
									<h3><?php echo $heading;?></h3>
									<p><?php echo $summary;?></p>
									<button type="button" class="btn btn-outline-info newsCardBtn btnColor" data-toggle="modal" data-target="#modal-<?php echo $id; ?>">Find out more</button>
								</div>
							</div>
						</div> <!-- end of row -->

						<br>

						<!--Modal -->
						<div class="modal fade" id="modal-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="Modal-heading" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="Modal-heading<?php echo $id; ?>"><?php echo $heading; ?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div> <!-- end of modal-header -->

									<div class="modal-body">
										<div class="row">
											<div class="col-sm-12">
												<?php
												echo $article;
												?>
											</div>

											<?php
											// add the code to read db for images for article
											try{
												//sql statement
												$sql3 = "SELECT img, name FROM tbl_mediaImage WHERE mediaId = '$id' AND active IS TRUE;";

												//execute statement and store output
												$resultSet3 = $pdo->query($sql3);
											} // end of try code

											catch(PDOException $e) {
												//error message
												echo "Error fetching media images from database: " .$e->getMessage();
												exit();
											}

											foreach ($resultSet3 as $row3) {
												$img = $row3['img'];
												$name = $row3['name'];
												?>
												<div class="col-sm-4 modalImage">
													<img class="img-fluid" src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
												</div>
												<?php
											} // end of foreach resultSet3
										?>
										</div>
									</div> <!-- end of modal-body -->

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary btnColor" data-dismiss="modal">Close</button>
									</div> <!-- end of modal-footer -->
								</div> <!-- end of modal content -->
							</div> <!-- end of modal dialog -->
						</div> <!-- end of modal -->
						 <?php
					 } // end of $count test
						$count++;
					} // end of foreach $resultSet2
				} // end of article test
				?>

		<div class="btnFlex">
			<a class="btn btn-outline-info btn-lg btn-block btnColor" href="media.php">More</a>
		</div>
	</div> <!-- end of accordion -->
	<?php
} // end of if test for rowCount
} // end of foreach for $resultSet
?>
