<?php
		try {

			$sql = "SELECT tbl_media.id, tbl_media.heading, tbl_media.summary, tbl_media.article, tbl_media.featureOnHome,tbl_mediaImage.img, tbl_mediaImage.mediaId FROM tbl_media, tbl_mediaImage WHERE tbl_media.featureOnHome IS TRUE AND tbl_mediaImage.mediaId = tbl_media.id AND tbl_media.active IS TRUE ORDER BY tbl_media.dateCreated DESC LIMIT 1;";

		$resultSet = $pdo->query($sql);

		} catch (PDOException $e) {

			echo "Error fetching media information: " . $e->getMessage();

			exit();
		}

		foreach ($resultSet as $row) {

			$id = $row['id'];
			$heading = $row['heading'];
			$summary = $row['summary'];
			$article = $row['article'];
			$img = $row['img'];

?>
		<div class="row mediaItems">
			<div class="col-12 col-lg-6 newsCardImg">
				<img class="newsImage img-fluid" src="<?php echo $img; ?>" alt="media image">
			</div>
			<div class="col-12 col-lg-6 featureCard flex">
				<div class="newsCard">
					<h5><?php echo $heading ?></h5>
					<p>
						<?php echo $summary; ?>
					</p>
					<button class="btn btn-outline-info newsCardBtn btnColor" data-toggle="modal" data-target="#modal-<?php echo $id; ?>">
						Find out more
					</button>
				</div>
			</div>
		</div>

		<!--Modal -->
		<div class="modal fade" id="modal-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="Modal-heading" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="Modal-heading"><?php echo $heading; ?></h5>
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
								$sql2 = "SELECT img, name FROM tbl_mediaImage WHERE mediaId = '$id' AND active IS TRUE;";

								//execute statement and store output
								$resultSet2 = $pdo->query($sql2);
							} // end of try code

							catch(PDOException $e) {
								//error message
								echo "Error fetching media images from database: " .$e->getMessage();
								exit();
							}

							foreach ($resultSet2 as $row2) {
								$img = $row2['img'];
								$name = $row2['name'];
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
		}
		?>