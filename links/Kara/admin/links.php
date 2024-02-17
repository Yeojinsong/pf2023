<?php if(session_id() == '') session_start();
/*
Filename: websites.php
Author: Harris salehi
Date Created: 13/11/18
Date Last updated: 14/11/18
Last Updated By: Blair collins
Description: websites adding, updating and removing
Version Number: 1.0
*/
$pageTitle = "URLs";

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
						<form action="includes/websites/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
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
											$sql = "SELECT * FROM tbl_mediaType WHERE displayType LIKE 'url';";

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

								<div class="form-group">
									<label>URL:</label>
									<input class="form-control" type="text" maxlength="255" name="url" required>
									<p>Include https:// or http:// and the full domain name</p>
								</div>

								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="websubmit" type="submit" value="Add"/>
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
								$sql = "SELECT id, heading, url, tbl_media.mediaType, tbl_media.active FROM tbl_media, tbl_mediaType WHERE tbl_media.mediaType = tbl_mediaType.mediaType AND tbl_mediaType.displayType = 'url';";

								// prepare the statement
								$statement = $pdo->prepare($sql);

								// execute SQL statement
								$resultSet = $pdo->query($sql);

							} // end of try block
							catch (PDOException $e) {

								// create error message
								echo "Error fetching annual report data: " .$e->getMessage();
								exit();

							} // end catch block

							foreach ($resultSet as $row) {
								// store row data in variables
								$id = $row['id'];
								$heading = $row['heading'];
								$mediaType1 = $row['mediaType'];
								$url = $row['url'];
								$active = $row['active'];
								?>

								<article class="col-12 col-md-6">
									<form action="includes/websites/update.php" method="POST"  enctype="multipart/form-data">
										<fieldset id="form<?php echo $id; ?>" disabled>
											<input type="hidden" name="id" value="<?php echo $id; ?>">

											<div class="form-group">
												<label>Heading:</label>
												<input maxlength="60" class="form-control" type="text" name="heading" value="<?php echo $heading ?>" required>
											</div>

											<div class="form-group">
												<label>Media Type:</label>
												<select name="mediaType" size="1">

													<?php
													try {
														// write statement to get data from tbl_mediaType table
														$sql = "SELECT * FROM tbl_mediaType WHERE displayType LIKE 'url';";

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

											<div class="form-group">
												<label>URL:</label>
												<input maxlength="255" class="form-control" type="text" name="url" value="<?php echo $url; ?>" required>
												<p>Include https:// or http:// and the full domain name</p>
											</div>

											<div>
												<label>Active:</label>
												<input type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
											</div>
										</fieldset>
										<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
										<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="website-update" type="submit" value="Submit"/>
										<input id="cancel<?php echo $id; ?>" class="formSubmit cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
									</form>

									<form action="includes/websites/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="hidden" name="img" value="<?php echo $fileName; ?>">
										<input type="submit" class="cancelButton" name="website-delete" value="Delete"/>
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
