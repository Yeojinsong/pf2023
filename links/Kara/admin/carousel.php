<?php if(session_id() == '') session_start();
/*
Filename: carousel.php
Author: Dahmon Bicheno
Date Created: 19/10/2018
Date Last updated: 31/10/18
Last Updated By: Dahmon Bicheno
Description: Carousel adding and removing
Version Number: 1.9
*/

// CHANGE PAGE TITLE
$pageTitle = "Slider Images";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newSlider')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newSlider">
						<form action="includes/carousel/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Image:</label>
									<input class="form-control-file" name="imgUpload" type="file" required>
									<p>Required Size: 1920 x 700</p>
								</div>

								<div class="form-group">
									<label>Name:</label>
									<input maxlength="100" class="form-control" type="text" name="name" required>
								</div>

								<div class="form-group">
									<label>Heading:</label>
									<input maxlength="50" class="form-control" type="text" name="heading" required>
								</div>

								<div class="form-group">
									<label>Text:</label>
									<textarea maxlength="100" class="form-control" type="text" name="body" required></textarea>
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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateSlider')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateSlider row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, name, img, heading, body, active FROM tbl_slider;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching carousel data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$name = $row['name'];
							$img = $row['img'];
							$heading = $row['heading'];
							$body = $row['body'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<img class="img-fluid" src="../<?php echo $img; ?>">

								<form action="includes/carousel/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>New Image:</label>
											<input class="form-control-file" name="imgUpload" type="file">
											<p>Required Size: 1920 x 700</p>
										</div>

										<div class="form-group">
											<label>Name:</label>
											<input maxlength="100" class="form-control" type="text" name="name" value="<?php echo $name; ?>" required>
										</div>

										<div class="form-group">
											<label>Heading:</label>
											<input maxlength="50" class="form-control" type="text" name="heading" value="<?php echo $heading; ?>" required>
										</div>

										<div class="form-group">
											<label>Text:</label>
											<textarea maxlength="100" class="form-control" type="textarea" name="body" required><?php echo $body; ?></textarea>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="sliderUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/carousel/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="sliderDeleteSubmit" value="Delete"/>
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
