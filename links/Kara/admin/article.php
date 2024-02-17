<?php if(session_id() == '') session_start();
/*
Filename: familyViolenceFacts.php
Author: Dahmon Bicheno
Date Created: 2/11/2018
Date Last updated:
Last Updated By: Dahmon Bicheno
Description: Family Violence Facts adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Articles";

// import the head section
include "includes/adminHead.php";

if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
?>
<body>
	<div class="container-fluid cmsContainer">
		<?php include "includes/cmsSidebar.php"; ?>

		<div class="cmsContent offset-2 col-md-10">
		<!-- EDIT WITHIN THIS TAG AND ... -->

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newViolenceFact')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newViolenceFact">
						<form action="includes/article/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>

								<div class="form-group">
									<label>Heading:</label>
									<input maxlength="60" class="form-control" type="text" name="heading" required>
								</div>

								<div class="form-group">
									<label>Summary:</label>
									<input maxlength="255" class="form-control" type="text" name="summary" required>
								</div>

								<label>Article:</label>
								<textarea id="latest-news-article" name="article">
								</textarea>
								<script>
									CKEDITOR.replace("latest-news-article");
								</script>

								<div class="form-group">
									<label>Media Type:</label>
									<select name="mediaType" size="1">

										<?php
										try {
											// write statement to get data from tbl_mediaType table
											$sql = "SELECT * FROM tbl_mediaType WHERE displayType LIKE 'article' AND active IS TRUE ";

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

								<div class="mt-1">
									<label>Feature On Home:</label>
									<input class="formButton" type="checkbox" name="featureOnHome"><br>
								</div>

								<div>
									<label>Active:</label>
									<input class="formButton" type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="latest-news-AddSubmit" type="submit" value="Add"/>
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
							$sql = "SELECT tbl_media.id, tbl_mediaType.mediaType, heading, summary, article, featureOnHome, tbl_media.active FROM tbl_media, tbl_mediaType WHERE tbl_media.mediaType = tbl_mediaType.mediaType AND displayType LIKE 'article';";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching media data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$heading = $row['heading'];
							$mediaType1 = $row['mediaType'];
							$summary = $row['summary'];
							$article = $row['article'];
							$feature = $row['featureOnHome'];
							$active = $row['active'];
							?>

							<article class="col-12 col-lg-6">
								<form action="includes/article/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Heading:</label>
											<input maxlength="60" class="form-control" type="text" name="heading" value="<?php echo $heading; ?>" required>
										</div>

										<div class="form-group">
											<label>Summary:</label>
											<input maxlength="255" class="form-control" type="text" name="summary" value="<?php echo $summary; ?>" required>
										</div>

										<label>Article:</label>
										<textarea id="article<?php echo $id; ?>" name="article">
											<?php echo $article; ?>
										</textarea>
										<script>
											CKEDITOR.replace("article<?php echo $id; ?>");
										</script>

										<div class="form-group">
											<label>Media Type:</label>
											<select name="mediaType" size="1">

												<?php

												try {
													// write statement to get data from tbl_mediaType table
													$sql = "SELECT * FROM tbl_mediaType WHERE displayType LIKE 'article' AND active IS TRUE; ";

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
											<label>Feature On Home:</label>
											<input class="formButton" type="checkbox" name="featureOnHome" <?php if ($feature) echo "checked"; ?>><br>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="Update-news-Submit" type="submit" value="Update"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/article/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="delete-news-Submit" value="Delete"/>
								</form>
								<hr><br>
							</article>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		<!-- AND THIS TAG -->
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
