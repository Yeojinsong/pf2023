<?php if(session_id() == '') session_start();
/*
Filename: mediaType.php
Author: Dahmon Bicheno
Date Created: 14/11/2018
Date Last updated:
Last Updated By: Dahmon Bicheno
Description: mediaType adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Media Types";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newMediaType')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newMediaType">
						<form action="includes/mediaType/insert.php" method="POST">
							<fieldset>
								<div class="form-group">
									<label>Media Type:</label>
									<input maxlength="30" class="form-control" type="text" name="mediaType" required>
								</div>

								<div class="form-group">
									<label>Display Type:</label>
									<select name="displayType">
										<option value='article'>article</option>
										<option value='fileName'>fileName</option>
										<option value='url'>url</option>
									</select>
								</div>

								<div class="form-group">
									<label>Print Order:</label>
									<select name="printOrder">
										<?php getPrintOrder(); ?>
									</select>
								</div>

								<div>
									<label>Active:</label>
									<input class="formButton" type="checkbox" name="active"><br>
								</div>
								<br>

								<input class="formButton" name="mediaTypeAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateMediaType')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateMediaType row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT mediaType, printOrder, displayType, active FROM tbl_mediaType ORDER BY printOrder;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching Statistic data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$mediaType = $row['mediaType'];
							$mediaTypeNoSpace = str_replace(' ', '', $mediaType);
							$printOrder = $row['printOrder'];
							$displayType = $row['displayType'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<form action="includes/mediaType/update.php" method="POST">
									<fieldset id="form<?php echo $mediaTypeNoSpace; ?>" disabled>
										<h2><?php echo $mediaType; ?></h2>
										<input type="hidden" name="mediaType" value="<?php echo $mediaType; ?>">

										<div class="form-group">
											<label>Print Order:</label>
											<select name="printOrder">
												<?php listPrintOrder($printOrder); ?>
											</select>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
										<br>

									</fieldset>
									<input id="edit<?php echo $mediaTypeNoSpace; ?>" class="formButton" type="button" onclick='enableForm("<?php echo $mediaTypeNoSpace; ?>")' value="Edit"/>
									<input id="submit<?php echo $mediaTypeNoSpace; ?>" class="formSubmit formButton" name="mediaTypeUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $mediaTypeNoSpace; ?>" class="formCancel cancelButton" type="button" onclick='disableForm("<?php echo $mediaTypeNoSpace; ?>")' value="Cancel"/>
								</form>

								<form action="includes/mediaType/delete.php" id="deleteForm<?php echo $mediaTypeNoSpace; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="mediaType" value="<?php echo $mediaType; ?>">
									<input type="submit" class="cancelButton" name="mediaTypeDeleteSubmit" value="Delete"/>
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
