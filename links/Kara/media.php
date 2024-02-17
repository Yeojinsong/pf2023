<?php if(session_id() == '') session_start();
/*
Filename: index.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi
Date Created: 6/08/2018
Date Last updated: 6/08/2018
Description: Home page of the Kara house website
*/

// set the page title
$pageTitle = "Media";

// import the head section
include "includes/head.php";
?>

<body>
	<?php
		include "includes/nav.php";

		// import quick escape button
		include "includes/quickEscape.php";

		// import the scroll to top of page button
		include "includes/topPage.php";

		include "includes/shared/hero.php";
		hero("activeMedia");
	?>

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">HOME</a></li>
				<li class="breadcrumb-item"><a href="whats-new.php">WHAT'S NEW</a></li>
				<li class="breadcrumb-item active" aria-current="page">MEDIA</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-12">
				<h1 class="pageTitle">MEDIA</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">

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
					<div class="<?php echo 'accordionContentOpen ' . $mediaTypeNoSpace;  ?>">

				<?php


				foreach ($resultSet2 as $row2) {
					$id = $row2['id'];
					$heading = $row2['heading'];
					$article = $row2['article'];
					$fileName = $row2['fileName'];
					$url = $row2['url'];


					?>

					<div class="col-sm-12 pastMediaCard">
						<div class="row">
							<div class="col-sm-6 pastMediaText">
								<?php echo $heading;?>
							</div>
							<?php
							// test displayType
							if ($displayType == 'fileName') {
								?>
								<div class="col-sm-6 pastMediaBtn">
									<a class="btn btn-outline-info mediaBtn btnColor" href="<?php echo $fileName;?>" download>
										Download
									</a>
								</div>

								<?php
							}
							elseif ($displayType == 'url') {
								?>
								<div class="col-sm-6 pastMediaBtn">
									<a class="btn btn-outline-info mediaBtn btnColor" href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer">
										View
									</a>
								</div>

								<?php
							}
							elseif ($displayType == 'article') {
								?>
							<div class="col-sm-6 pastMediaBtn">
								<button class="btn btn-outline-info mediaBtn btnColor" data-toggle="modal" data-target="#modal-<?php echo $id; ?>">Find out more</button>
							</div>


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
											<?php echo $article;
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
														<img class="img-fluid" src="<?php echo $img; ?>" alt="<?php echo $name;?>">
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
							} // end of displayType test
							?>
						</div>
					</div>
				<?php
				}
				?>
				</div>
				<?php
				}
				}
				?>
			</div>
		</div>
	</div>
	<?php
	// include the footer
	include "includes/footer.php";
	include "includes/jsLinks.php";
	?>
</body>
</html>
