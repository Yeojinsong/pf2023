<div class="row">

	<?php 
		try {

			$sql = "SELECT mediaType, displayType, printOrder FROM tbl_mediaType WHERE active = 1 ORDER BY printOrder;";

			$resultSet = $pdo->query($sql);
				
		} catch (PDOException $e) {
				
			echo "Error fetching database information: " . $e->getMessage();

			exit();
		}

			foreach ($resultSet as $row) {
				$mediaType = $row['mediaType'];
				$displayType = $row['displayType'];

				try {

					$sql2 = "SELECT id, mediaType, heading, dateCreated FROM tbl_media WHERE mediaType = '$mediaType' AND featureOnHome IS FALSE AND active IS TRUE ORDER BY dateCreated DESC LIMIT 1;";

					$resultSet2 = $pdo->query($sql2);
					
				} catch (PDOException $e) {
					echo "Error fetching database information: " . $e->getMessage();

					exit();
				}

				foreach ($resultSet2 as $row2) {
					$id = $row2['id'];
					$heading = $row2['heading'];
					$id = $row2['id'];

				// if media type is Campaigns, Latest news or Industry news  then the card has an image.
				if ($displayType == "article") {
	
	?>

						<div class="col-12 col-sm-6 mediaCards">
							<div class="card indexCard">
								<?php
								try {
									$sql = "SELECT img, name FROM tbl_mediaImage
											WHERE mediaId = '$id' 
											AND active IS TRUE
											LIMIT 1;";

									$statement = $pdo->prepare($sql);

									$resultSet = $pdo->query($sql);
											
								} catch (PDOException $e) {
									echo "Error fetching database information: " . $e->getMessage();

									exit();
								}

								foreach ($resultSet as $row) {
									$img = $row['img'];
									$name = $row['name'];

								?>

								<img class="cardImg" src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
								<?php
									}
								?>

								<div class="card-body">
									<h5 class="card-title mb-0 fontDefault"><a href="whats-new.php"><?php echo $mediaType; ?></a></h5>

									<p class="card-text"><?php echo $heading; ?></p>
								</div>
							</div>
						</div>
				<?php
				} else {
				?>
					<div class="col-12 col-sm-6 col-lg-3 mediaCards">
						<div class="card indexCard">
							<div class="card-body">
								<h5 class="card-title mb-0 fontDefault">
									<a href="whats-new.php">
										<?php echo $mediaType; ?>
									</a>								
								</h5>
								<p class="card-text"><?php echo $heading; ?></p>
							</div>
						</div>					
					</div>
		
			<?php
					}
				}
			}
			?>
</div>