<?php if(session_id() == '') session_start();
/*
Filename: addingUser.php
Author: Harris salehi
Date Created: 12/10/2018
Date Last updated: 14/09/18
Last Updated By: Dahmon Bicheno
Description: Carousel adding and removing
Version Number: 1.1
*/
$pageTitle = "Documents";

// import the head section
include "includes/adminHead.php";

if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
?>
<body>
	<div class="container-fluid cmsContainer">
		<?php include "includes/cmsSidebar.php"; ?>

		<div class="cmsContent offset-2 col-md-10">
			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newViolenceFact')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newViolenceFact">
						<form action="includes/news-report/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Document:</label>
									<input class="form-control-file" name="docUpload" type="file" required>
								</div>

								<div class="form-group">
									<label>Heading:</label>
									<input class="form-control" type="text" maxlength="60" name="heading" required>
								</div>

								<div class="form-group">
									<label>Media Type:</label>
									<select name="mediaType" size="1">

										<?php
										try {
											// write statement to get data from tbl_mediaType table
											$sql = "SELECT * FROM tbl_mediaType WHERE displayType LIKE 'fileName' AND active IS TRUE ";

											// prepare the statement
											$statement = $pdo->prepare($sql);

											// execute SQL statement
											$resultSet = $pdo->query($sql);

										} // end of try block
										catch (PDOException $e) {

											// create error message
											echo "Error fetching mediaType data: " .$e->getMessage();
											exit();

										} // end catch block

										foreach ($resultSet as $row) {
										 $mediaType = $row['mediaType'];
										 ?>
										 <option value="<?php echo $mediaType ;?>"><?php echo $mediaType; ?></option>
										 <?php
										}
										?>

									</select>
								</div>


								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="sliderAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateViolenceFact')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateViolenceFact row">

							<?php
							try {
								// write statement to get data from tbl_slider table
								$sql = "SELECT id, heading, fileName, tbl_media.mediaType, tbl_media.active FROM tbl_media, tbl_mediaType WHERE tbl_media.mediaType = tbl_mediaType.mediaType AND tbl_mediaType.displayType = 'fileName';";

								// prepare the statement
								$statement = $pdo->prepare($sql);

								// execute SQL statement
								$resultSet = $pdo->query($sql);

							} // end of try block
							catch (PDOException $e) {

								// create error message
								echo "Error fetching newsletter data: " .$e->getMessage();
								exit();

							} // end catch block

							foreach ($resultSet as $row) {
								// store row data in variables
								$id = $row['id'];
								$heading = $row['heading'];
								$fileName = $row['fileName'];
								$mediaType1 = $row['mediaType'];
								$active = $row['active'];
								?>

								<article class="col-12 col-md-6">


									<form action="includes/news-report/update.php" method="POST"  enctype="multipart/form-data">
										<fieldset id="form<?php echo $id; ?>" disabled>
											<input type="hidden" name="id" value="<?php echo $id; ?>">

											<div class="form-group">
												<label>Document:</label>
												<p> <?php echo $fileName; ?></p>
												<input class="form-control-file" name="docUpload" type="file">
											</div>

											<div class="form-group">
												<label>Heading:</label>
												<input class="form-control" type="text" maxlength="60"
												 name="heading" value="<?php echo $heading; ?>" required>
											</div>

											<div class="form-group">
												<label>Media Type:</label>
												<select name="mediaType" size="1">

													<?php
													try {
														// write statement to get data from tbl_mediaType table
														$sql = "SELECT * FROM tbl_mediaType WHERE displayType LIKE 'fileName' AND active IS TRUE ";

														// prepare the statement
														$statement = $pdo->prepare($sql);

														// execute SQL statement
														$resultSet = $pdo->query($sql);

													} // end of try block
													catch (PDOException $e) {

														// create error message
														echo "Error fetching mediaType data: " .$e->getMessage();
														exit();

													} // end catch block

													foreach ($resultSet as $row) {
													 $mediaType = $row['mediaType'];
													 ?>
													 <option value="<?php echo $mediaType ;?>" <?php if ($mediaType == $mediaType1) echo "selected"; ?>><?php echo $mediaType; ?></option>
													 <?php
													}
													?>

												</select>
											</div>




											<div>
												<label>Active:</label>
												<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
											</div>

										</fieldset>
										<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
										<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="news-report-update" type="submit" value="Submit"/>
										<input id="cancel<?php echo $id; ?>" class="formSubmit cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
									</form>

									<form action="includes/news-report/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="hidden" name="img" value="<?php echo $fileName; ?>">
										<input type="submit" class="cancelButton" name="news-report-delete" value="Delete"/>
									</form>
									<hr><br>
								</article>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
<?php
include "includes/adminJsLinks.php";
} else {
	header("Location: index.php");
}

?>
</html>
