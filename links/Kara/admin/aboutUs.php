<?php if(session_id() == '') session_start();
/*
Filename: aboutUs.php
Author: Aleksander Tudorin
Date Created: 2/11/2018
Date Last updated: 2/11/18
Last Updated By: Aleksander Tudorin
Description: About Us Informatiom
Version Number: 1.1
*/
$pageTitle = "About Us";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newSlider')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newSlider">
						<form action="includes/aboutUs/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<label>Content:</label>
								<textarea id="newAboutUsDescription" name="content" required>
								</textarea>

								<script>
									CKEDITOR.replace("newAboutUsDescription");
								</script>

								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="aboutUsAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateAboutUs')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateAboutUs row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, content, active FROM tbl_aboutUs;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching about us data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$content = $row['content'];
							$active = $row['active'];
							?>

							<article class="col-12">
								<form action="includes/aboutUs/update.php" method="POST">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Content:</label>
											<textarea id="aboutUsDescription<?php echo $id; ?>" name="content" enctype="multipart/form-data" required>
											<?php echo $content; ?>
											</textarea>
										</div>

										<script>
											CKEDITOR.replace("aboutUsDescription<?php echo $id; ?>");
										</script>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>

									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="aboutUsUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/aboutUs/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="aboutUsDeleteSubmit" value="Delete"/>
								</form>
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
